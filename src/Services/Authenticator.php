<?php 

// service d'authentification d'un utilisateur enregistré souhaitant se connecter, extends pour le render login

class Authenticator extends AbstractController
{
    // méthode d'authentification de l'utilisateur
    public static function authenticate(User $user): mixed
    {
        // connexion à la bdd
        $db = Database::dataConnect();
        
        // requête SQL pour lire les données de la bdd
        $request = $db->prepare(
            'SELECT id, username, password 
            FROM user 
            WHERE username = :username'
        );
        $request->execute([
            'username' => $user->getUsername(),
            ]);
        $request->setFetchMode(PDO::FETCH_CLASS, get_class($user));
        
        $response = $request->fetch();
        
        
        // vérification de l'existence de l'utilisateur
        if (!$response):
            $_SESSION['msg'] = 'Le nom d\'utilisateur est incorrect';
            return false;
        endif;
            
        // vérification de la correspondance du mot de passe non hashé et du mot de passe hashé
        if (!password_verify($user->getPasswordSubmitted(), $response->getPassword()))
            $_SESSION['msg'] = 'Le mot de passe est incorrect';
        
        // Fin prématurée si erreur
        if (isset($_SESSION['msg']))
            return false;
        
        // message si succès et récupération des variables de session
        if ($response && password_verify($user->getPasswordSubmitted(), $response->getPassword()))
        {
            $_SESSION['msg'] = 'Vous êtes connecté';
            
            // création de variables de session   
            $_SESSION['username'] = $response->getUsername();
            $_SESSION['userId'] = $response->getId();
            $_SESSION['password_submitted'] = $user->getPasswordSubmitted();
            
            self::render('messages');
            
            return $response;
        }
     
    }

    // méthode statique de vérification de connexion de l'utilisateur
    public static function isLogged(): bool
    {
        return !empty($_SESSION['userId']);
    }
    
    // méthode statique de déconnexion de l'utilisateur (nettoyage des variables session)
    public static function logout(): void
    {
        $_SESSION['username'] = null;
        $_SESSION['userId'] = null;
        $_SESSION['password_submitted'] = null;
    }

}