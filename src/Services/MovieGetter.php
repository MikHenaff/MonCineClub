<?php

// service de récupération des données des films contenus dans la collection d'un utilisateur

class MovieGetter
{
    public static function getMovies(): mixed
    {
        // récupération de l'identifiant de l'utilisateur
        if (Authenticator::isLogged())
            $userId = $_SESSION['userId'];
        
        // connexion à la bdd
        $db = Database::dataConnect();
        
        // vérification de l'existence du film dans la bdd
        $requestDb = $db->prepare(
            'SELECT movie.id, id_api, title, tagline, poster_path, overview, genres, runtime, actors, director, release_date, vote_average
            FROM movie
            INNER JOIN user_movie ON movie.id = user_movie.movie_id
            WHERE user_id = :userId'
        );
        $requestDb->bindParam(':userId', $userId, PDO::PARAM_INT);
        $requestDb->execute();
        $responseDb = $requestDb->fetchAll();

        return $responseDb;
    }
}