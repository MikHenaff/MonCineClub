<?php

use \Classes\User;

// service d'enregistrement d'un film dans la bdd et/ou la collection d'un utilisateur

class MovieRegistration
{
    public static function registration(): void
    {
        // récupération des données principales de l'utilisateur et du film (identifiant API-> au clic)
        if (Authenticator::isLogged())
            $userId = $_SESSION['userId'];
            
        $idApi = $_POST['id-api'];
        
        // récupération d'un objet film précis via la connexion à l'API par l'identifiant du film
        $dataObj = APIConnection::apiSearch($idApi);

        // récupération des données du film
        $movie = LoadFromJson::loadDetailsFromJson($dataObj);

        $id_api = $movie->getId_api();
        $title = $movie->getTitle();
        $poster_path = $movie->getPoster_path();
        $tagline = $movie->getTagline();
        $overview = $movie->getOverview();
        $genres = $movie->getGenres();
        $runtime = $movie->getRuntime();
        $actors = $movie->getActors();
        $director = $movie->getDirector();
        $release_date = $movie->getRelease_date();
        $vote_average = $movie->getVote_average();
        
        // connexion à la bdd
        $db = Database::dataConnect();
        
        // vérification de l'existence du film dans la bdd
        $requestDb = $db->prepare(
            'SELECT title, id_api, id
            FROM movie 
            WHERE id_api = :id_api'
        );
        $requestDb->bindParam(':id_api', $id_api, PDO::PARAM_INT);
        $requestDb->execute();
        $requestDb->setFetchMode(PDO::FETCH_CLASS, get_class($movie));
        $responseDb = $requestDb->fetch();
        
        // si le film existe dans la db...
        if ($responseDb)
        {
            // récupération de l'identifiant bdd du film
            $id = $responseDb->getId();
            
            // vérification de l'existence du film dans la collection de l'utilisateur
            $requestColl = $db->prepare(
                'SELECT movie_id, user_id
                FROM user_movie 
                INNER JOIN movie ON user_movie.movie_id = movie.id
                WHERE user_movie.user_id = :user_id
                AND user_movie.movie_id = :id'
            );
            
            $requestColl->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $requestColl->bindParam(':id', $id, PDO::PARAM_INT);
            $requestColl->execute();
            $responseColl = $requestColl->fetchAll();
            
            // si le film est dans la collection, alors message à l'utilisateur
            if ($responseColl)
            {
                $_SESSION['msg'] = "Le film \"$title\" a déjà été ajouté à votre collection";
            }
            else
            {
                // si le film existe dans la bdd mais pas dans la collection de l'utilisateur, ajout bdd
                $reqColl = $db->prepare(
                    'INSERT INTO user_movie (user_id, movie_id) 
                    VALUES (:user_id, :movie_id)'
                );
                
                $reqColl->bindParam(':user_id', $userId, PDO::PARAM_INT);
                $reqColl->bindParam(':movie_id', $id, PDO::PARAM_INT);
                $reqColl->execute();
                
                $_SESSION['msg'] = "Le film \"$title\" a été ajouté à votre collection avec succès";
            }
        }
        // si le film n'est pas dans la bdd (ni, de fait, dans la collection de l'utilisateur), enregistrement dans les deux
        if (!$responseDb)
        {
           // requête SQL d'insertion des données du film dans la bdd
            $request = $db->prepare(
                'INSERT INTO movie (id_api, title, poster_path, tagline, overview, genres, runtime, actors, director, release_date, vote_average) 
                VALUES (:id_api, :title, :poster_path, :tagline, :overview, :genres, :runtime, :actors, :director, :release_date, :vote_average)'
            );
            
            // bindParam() pour protéger contre les injections SQL
            $request->bindParam(':id_api', $id_api, PDO::PARAM_INT);
            $request->bindParam(':title', $title, PDO::PARAM_STR);
            $request->bindParam(':poster_path', $poster_path, PDO::PARAM_STR);
            $request->bindParam(':tagline', $tagline, PDO::PARAM_STR);
            $request->bindParam(':overview', $overview, PDO::PARAM_STR);
            $request->bindParam(':genres', $genres, PDO::PARAM_STR);
            $request->bindParam(':runtime', $runtime, PDO::PARAM_STR);
            $request->bindParam(':actors', $actors, PDO::PARAM_STR);
            $request->bindParam(':director', $director, PDO::PARAM_STR);
            $request->bindParam(':release_date', $release_date, PDO::PARAM_STR);
            $request->bindParam(':vote_average', $vote_average, PDO::PARAM_INT);
            $request->execute();
            
            
            // requête SQL d'insertion des données du film dans la collection
            $lastIdMovie = $db->lastInsertId();
            $reqJoin = $db->prepare(
                'INSERT INTO user_movie (user_id, movie_id) 
                VALUES (:user_id, :movie_id)'
                );
            
            $reqJoin->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $reqJoin->bindParam(':movie_id', $lastIdMovie, PDO::PARAM_INT);

            $reqJoin->execute();
            
            $_SESSION['msg'] = "Le film \"$title\" a été ajouté à votre collection avec succès";
        }
    } 
}