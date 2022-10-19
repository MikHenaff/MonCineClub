<?php

// service de modification des données de l'utilisateur

class UserUpdate 
{
    public static function update(User $user)
    {
        // récupération de l'identifiant de l'utilisateur
        if ($_SESSION['userId'])
            $userId = $_SESSION['userId'];
            
        // connexion à la bdd
        $db = Database::dataConnect();
        
        // récupération des données de l'utilisateur avant changement
        $request = $db->prepare(
            'SELECT username, email 
            FROM user 
            WHERE id = :id'
        );
        $request->bindParam(':id', $userId, PDO::PARAM_INT);
        $request->execute();
        $request->setFetchMode(PDO::FETCH_CLASS, get_class($user));
        
        $response = $request->fetch();
        
        // récupération des variables de session
        $_SESSION['username'] = $response->getUsername();
        $_SESSION['email'] = $response->getEmail();

        // vérification de l'existence du pseudo dans la db
        $requestUsername = $db->prepare(
            'SELECT username
            FROM user 
            WHERE username = :username'
        );
        $requestUsername->execute([
            'username' => $user->getUsername(),
            ]);
        $requestUsername->setFetchMode(PDO::FETCH_CLASS, get_class($user));
        $responseUsername = $requestUsername->fetch();
        
        // si le pseudo existe dans la bdd et qu'il est différent de celui de l'utilisateur, message d'erreur
        if ($responseUsername && $_POST['updated_username'] !== $_SESSION['username'])
        {
            $_SESSION['msg'] = 'Ce nom d\'utilisateur existe déjà';
            return false;
        }
        
        // vérification de la correspondance du mot de passe
        if ($_POST['updated_password'] !== $_POST['updated_password2'])
        {
            $_SESSION['msg'] = 'Le mot de passe ne correspond pas';
            return false;
        }
        
        // vérification de l'existence de l'email
        $requestEmail = $db->prepare(
            'SELECT email 
            FROM user 
            WHERE email = :email'
        );
        $requestEmail->execute([
            'email' => $user->getEmail(),
            ]);
        $requestEmail->setFetchMode(PDO::FETCH_CLASS, get_class($user));
        $responseEmail = $requestEmail->fetch();

        if ($responseEmail && $_POST['updated_email'] !== $_SESSION['email'])
        {
            $_SESSION['msg'] = 'Cet email existe déjà';
            return false;
        }
        
        // si aucun n'existe et que le mot de passe correspond alors on peut enregistrer les nouvellles données de l'utilisateur
        if (!$responseUsername || $_POST['updated_username'] === $_SESSION['username'] && !$responseEmail || $_POST['updated_email'] === $_SESSION['email'])
        {
            // récupération des données utilisateur (sécurisation des données et hashage du mot de passe)
            $updated_username = htmlspecialchars($_POST['updated_username'], ENT_QUOTES);
            $updated_password = password_hash($_POST['updated_password'], PASSWORD_DEFAULT);
            $updated_email = htmlspecialchars($_POST['updated_email'], ENT_QUOTES);
            
            // requête SQL de mise à jour des données de l'utilisateur dans la bdd
            $request = $db->prepare(
                'UPDATE user
                SET username = :username,
                    password = :password,
                       email = :email
                WHERE id = :id'
            );
            
            // bindParam() pour protéger contre les injections SQL
            $request->bindParam(':id', $userId, PDO::PARAM_INT);
            $request->bindParam(':username', $updated_username, PDO::PARAM_STR);
            $request->bindParam(':password', $updated_password, PDO::PARAM_STR);
            $request->bindParam(':email', $updated_email, PDO::PARAM_STR);
            $request->execute();
            
        }
        
    }
    
}