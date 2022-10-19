<?php

// service d'enregistrement d'un nouvel utilisateur

class UserRegistration 
{
    public static function registration(User $user)
    {
        // connexion à la bdd
        $db = Database::dataConnect();
        
        // vérification de l'existence du pseudo
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
        
        if ($responseUsername)
        {
            $_SESSION['msg'] = 'Ce nom d\'utilisateur existe déjà';
            return false;
        }
        
        // vérification de la correspondance du mot de passe
        if ($_POST['password'] !== $_POST['password2'])
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

        if ($responseEmail)
        {
            $_SESSION['msg'] = 'Cet email existe déjà';
            return false;
        }
        
        // si aucun n'existe et que le mot de passe correspond alors on peut enregistrer le nouvel utilisateur
        if (!$responseUsername && !$responseEmail)
        {
            // récupération des données utilisateur (et hashage du mot de passe)
            $username = htmlspecialchars($_POST['username'], ENT_QUOTES);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
            
            // requête SQL d'insertion des données du nouvel utilisateur dans la bdd
            $request = $db->prepare(
                'INSERT INTO user (username, password, email) 
                VALUES (:username, :password, :email)'
            );
            
            // bindParam() pour protéger contre les injections SQL
            $request->bindParam(':username', $username, PDO::PARAM_STR);
            $request->bindParam(':password', $password, PDO::PARAM_STR);
            $request->bindParam(':email', $email, PDO::PARAM_STR);
            $request->execute();

        }
        
    }
    
    
}