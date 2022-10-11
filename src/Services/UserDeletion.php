<?php

// service de suppression de compte de l'utilisateur

class UserDeletion
{
    public static function deleteUser(): void
    {
        // récupération de l'identifiant de l'utilisateur
        if (Authenticator::isLogged())
            $userId = $_SESSION['userId'];
        
        // connexion à la bdd
        $db = Database::dataConnect();
        
        // requête SQL de suppression des films de l'utilisateur de sa collection (contrainte)
        $requestColl = $db->prepare(
            'DELETE
            FROM user_movie
            WHERE user_movie.user_id = :userId'
        );
        $requestColl->bindParam(':userId', $userId, PDO::PARAM_INT);
        $requestColl->execute();
        
        // requête SQL de suppression des données de l'utilisateur
        $requestDb = $db->prepare(
            'DELETE
            FROM user
            WHERE user.id = :userId'
        );
        $requestDb->bindParam(':userId', $userId, PDO::PARAM_INT);
        $requestDb->execute();
    }
    
}