<?php

// contrôleur des films (récupération des données des films pour enregistrement, suppression et affichage, et redirection vers les templates concernées)

// use src\Model\Movie;

class MovieController extends AbstractController 
{
    // méthode d'enregistrement du film
    public static function movieRegister(): void
    {
        // si le bouton du film est cliqué, que l'utilisateur est connecté et que les données sont validées, on enregistre le film dans la collection
        if (isset($_POST['id-api-submit']) && Authenticator::isLogged())
            $movie = MovieRegistration::registration();

        // si l'utilisateur n'est pas connecté, on lui envoit un message
        if (isset($_POST['id-api-submit']) && !Authenticator::isLogged())
            $_SESSION['msg'] = 'Vous devez être connecté pour pouvoir ajouter ce film à votre collection';
   
        // redirection vers la page messages
        self::render('messages-movie');
    }
    
    // méthode de suppression d'un film de la collection
    public static function deleteMovie ()
    {
        // si le bouton de suppression est cliqué, suppression du film et envoit d'un message
        if (isset($_POST['id-movie-deletion'])):
            
            // suppression du film
            MovieDeletion::delete();
            
            // message
            $_SESSION['msg'] = "Le film a bien été supprimé de votre collection";
            
            // affichage du message
            self::render('messages-movie');
            
            return true;
            
        endif;
        
    }
    
    // méthode de récupération de données détaillées du film
    public static function moreDetails(): void
    {
        // si le bouton du film est cliqué et que l'utilisateur est connecté, récupération de données plus détaillées sur le film
        if (isset($_POST['more-details-submit']) && Authenticator::isLogged()):
            
            $idMovie = $_POST['more-details'];
            
            // récupération d'un objet film précis via la connexion à l'API par l'identifiant du film
            $dataObj = APIConnection::apiDetailsSearchById($idMovie);

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
            
            // redirection vers la page d'affichage détaillé du film et importation de $movie
            self::render('more-details', ['movie' => $movie]);
            
        endif;
        
        // si l'utilisateur n'est pas connecté, on lui envoit un message
        if (isset($_POST['more-details-submit']) && !Authenticator::isLogged()):
            $_SESSION['msg'] = 'Vous devez être connecté pour avoir plus d\'infos sur le film';
            
            self::render('messages-movie');
        endif;

    }
    
    // méthode d'affichage des films de la collection
    public static function displayCollection ()
    {
        
        // si l'utilisateur est connecté
        if (Authenticator::isLogged()):
            
            // récupération des films depuis la bdd
            $movies = MovieGetter::getMovies();
            
            // affichage de la collection
            self::render('my-movies', ['movies' => $movies]);
            return true;
            
        // sinon, envoi d'un message
        else:
            $_SESSION['msg'] = 'Vous devez être connecté pour pouvoir accéder à votre collection';
            self::render('messages-movie');
            
        endif;
        
    }
    
    // méthode d'affichage de films recherchés depuis la barre de recherche
    public static function displaySearchMovie(): void
    {
        // quand le bouton 'rechercher' est cliqué
        if (isset($_POST['search'])):
            
            // connexion à l'API
            $dataObj = APIConnection::apiSearchInput();
            
            
            // récupération des données des film
            $movies = LoadFromJson::loadAllFromJson($dataObj);
            
            // affichage
            self::render('search-movie', ['movies' => $movies]);
            
        endif;
            
    }
    
    // méthode d'affichage des films récents
    public static function displayRecentMovies($args = null): void
    {
        // possibilité d'accéder aux pages suivantes et précédentes
        $page = isset($args['page']) ? $args['page'] : 1;
        
        if(isset($_POST['next']))
        {
            $page++;
            // On change de page
            header('Location: /MonCineClub/recent-movies/'.$page);
            die;
        }
        
        if(isset($_POST['previous']) && $page > 1)
        {
            $page--;
            // On change de page
            header('Location: /MonCineClub/recent-movies/'.$page);
            die;
        }
        
        // connexion à l'API
        $dataObj = APIConnection::apiSearchRecent($page);

        // récupération des données du film
        $movies = LoadFromJson::loadAllFromJson($dataObj);
        
        // affichage
        self::render('recent-movies', ['movies' => $movies]);
        
    }
    
    public static function displayPopularMovies($args = null): void
    {
        // possibilité d'accéder aux pages suivantes et précédentes
        $page = isset($args['page']) ? $args['page'] : 1;
        
        if(isset($_POST['next']))
        {
            $page++;
            // On change de page
            header('Location: /MonCineClub/popular-movies/'.$page);
            die;
        }
        
        if(isset($_POST['previous']) && $page > 1)
        {
            $page--;
            // On change de page
            header('Location: /MonCineClub/popular-movies/'.$page);
            die;
        }
        
        // connexion à l'API
        $dataObj = APIConnection::apiSearchByPopularity($page);

        // récupération des données du film
        $movies = LoadFromJson::loadAllFromJson($dataObj);
        
        // affichage
        self::render('popular-movies', ['movies' => $movies]);
        
    }
    
    // méthode d'affichage des films bientôt en salle
    public static function displayUpcomingMovies($args = null): void
    {
        // possibilité d'accéder aux pages suivantes et précédentes
        $page = isset($args['page']) ? $args['page'] : 1;
        
        if(isset($_POST['next']))
        {
            $page++;
            // changement de page
            header('Location: /MonCineClub/upcoming-movies/'. $page);
            die;
        }
        
        if(isset($_POST['previous']) && $page > 1)
        {
            $page--;
            // changement de page
            header('Location: /MonCineClub/upcoming-movies/'. $page);
            die;
        }

        // connexion à l'API
        $dataObj = APIConnection::apiSearchUpcoming($page);

        // récupération des données du film
        $movies = LoadFromJson::loadAllFromJson($dataObj);
        
        // affichage
        self::render('upcoming-movies', ['movies' => $movies]);
        
    }
  
}