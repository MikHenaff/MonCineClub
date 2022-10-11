<?php

// classe de connexion à l'API et de récupération des données des films

// final pour empêcher héritage
final class APIConnection 
{
    // constructeur vide mais en private pour empêcher l'instanciation
    private function __construct() {}
    
    // méthode statique de récupération des données des films les plus récents
    public static function apiSearchRecent($page = 1): mixed
    {
        // accès à la clef API
        require_once './config/config.php';

        // définition de l'année en cours (et de l'année précédente pour avoir des films à présenter en début d'année) - (format AAAA)
        $year = date('Y');
        $yearBefore = $year - 1;

        // connexion à l'API et récupération des données
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/discover/movie?api_key=$api_key&include_adulte=false&primary_release_year=$year,$yearBefore&language=fr-FR&page=$page");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        
        $data = curl_exec($ch);
        
        // si aucune donnée n'est reçue, message d'erreur
        if(!$data)
            $_SESSION['error'] = 'Erreur système - Données inaccessibles';
        
        // récupération des données transmises par l'API et objets transformés en tableaux associatifs (->true)
        $dataObj = json_decode($data, true);

        return $dataObj;
        
    }
    
    // méthode statique de récupération des données des films les plus populaires
    public static function apiSearchByPopularity($page = 1): mixed
    {
        // accès à la clef API
        require_once './config/config.php';
        
        // connexion à l'API et récupération des données
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/discover/movie?api_key=$api_key&include_adult=false&sort_by=vote_average.desc,vote_count.desc&language=fr-FR&page=$page");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        
        $data = curl_exec($ch);
        
        // si aucune donnée n'est reçue, message d'erreur
        if(!$data)
            $_SESSION['error'] = 'Erreur système - Données inaccessibles';
        
        // récupération des données transmises par l'API et objets transformés en tableaux associatifs (->true)
        $dataObj = json_decode($data, true);

        return $dataObj;
    
    }
    
    // méthode statique de récupération des données des films bientôt en salle
    public static function apiSearchUpcoming($page = 1): mixed
    {
        // accès à la clef API
        require_once './config/config.php';
        
        // connexion à l'API et récupération des données
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/movie/upcoming?api_key=$api_key&include_adult=false&language=fr-FR&region=FR&page=$page");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        
        $data = curl_exec($ch);
        
        // si aucune donnée n'est reçue, message d'erreur
        if(!$data)
            $_SESSION['error'] = 'Erreur système - Données inaccessibles';
        
        // récupération des données transmises par l'API et objets transformés en tableaux associatifs (->true)
        $dataObj = json_decode($data, true);

        return $dataObj;
    
    }
    
    // méthode de récupération des données des films depuis la barre de recherche
    public static function apiSearchInput(): mixed
    {
        // accès à la clef API
        require_once './config/config.php';
        
        // si des données sont saisies dans le champs dédié
        if(isset($_POST['search']))
        {
            // modification des données saisies ('fight club' devient 'fight+club') pour correspondre à l'API
            $value = $_POST['search'];
            $value = implode('+', explode(' ', $value));
            
            // connexion à l'API et récupération des données
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/search/movie?api_key=$api_key&query=$value&language=fr-FR");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            
            $data = curl_exec($ch);
            
            // si aucune donnée n'est reçue, message d'erreur
            if(!$data)
                $_SESSION['error'] = 'Erreur système - Données inaccessibles';
        
            // récupération des données transmises par l'API et objets transformés en tableaux associatifs (->true)
            $dataObj = json_decode($data, true);
            
            return $dataObj;
            
        }
        
    }
    
    // méthode de recherche selon l'identifiant du film pour l'ajout à la collection de l'utilisateur
    public static function apiSearch(int $idApi): mixed
    {
        // accès à la clef API
        require_once './config/config.php';
        
        // si le bouton est cliqué
        if (isset($_POST['id-api-submit']))
        {
            // et que l'identifiant du film existe, récupération de celui-ci
            if (isset($_POST['id-api']))
                $idApi = $_POST['id-api'];
            
            // connexion à l'API pour récupérer les données du film concerné    
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/movie/$idApi?api_key=$api_key&append_to_response=credits&language=fr-FR");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            
            $data = curl_exec($ch);
            
            // si aucune donnée n'est reçue, message d'erreur
            if(!$data)
                $_SESSION['error'] = 'Erreur système - Données inaccessibles';
        
            // récupération des données transmises par l'API et objets transformés en tableaux associatifs (->true)
            $dataObj = json_decode($data, true);

            return $dataObj;
        }
    
    }
    
    // méthode statique de connexion à l'API selon l'identifiant du film liée au bouton 'plus de détails'
    public static function apiDetailsSearchById(int $idApi): mixed
    {
        // accès à la clef API
        require_once './config/config.php';
        
        // si le bouton est cliqué
        if (isset($_POST['more-details-submit']))
        {
            // et que l'identifiant du film existe, récupération de celui-ci
            if (isset($_POST['more-details']))
                $idApi = $_POST['more-details'];
                
            // connexion à l'API et récupération des données
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/movie/$idApi?api_key=$api_key&append_to_response=credits&language=fr-FR");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            
            $data = curl_exec($ch);
            
            // si aucune donnée n'est reçue, message d'erreur
            if(!$data)
                $_SESSION['error'] = 'Erreur système - Données inaccessibles';
        
            // récupération des données transmises par l'API et objets transformés en tableaux associatifs (->true)
            $dataObj = json_decode($data, true);

            return $dataObj;
            
        }
        
    }
    
}