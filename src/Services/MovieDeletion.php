<?php

// service de suppression d'un film de la collection d'un utilisateur

class MovieDeletion
{
    // méthode de suppression du film
    public static function delete(): void
    {
        // l'utilisateur doit être connecté pour pouvoir récupérer son identifiant
        if (Authenticator::isLogged())
            $userId = $_SESSION['userId'];
        
        // récupération de l'identifiant du film au clic
        $idMovie = $_POST['id-movie-del'];

        // connexion à la bdd
        $db = Database::dataConnect();
        
        // requête SQL de suppression du film sélectionné de la collection de l'utilisateur
        $requestDb = $db->prepare(
            'DELETE
            FROM user_movie
            WHERE user_id = :userId
            AND movie_id = :id_movie'
        );
        $requestDb->bindParam(':id_movie', $idMovie, PDO::PARAM_INT);
        $requestDb->bindParam(':userId', $userId, PDO::PARAM_INT);
        $requestDb->execute();
    }
    
}