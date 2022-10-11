<?php

// service de récupération des données json des films

class LoadFromJson
{
    // méthode de récupération des données pour un film
    public static function loadDetailsFromJson($json): object
    {
        // instanciation de Movie
        $movie = new Movie();
        
        // définition des données
        $movie->setId_api($json['id']);
        $movie->setTitle($json['title']);
        $movie->setPoster_path($json['poster_path']);
        $movie->setTagline($json['tagline']);
        $movie->setOverview($json['overview']);
        
        if($json['genres'])
        {
            $tabGenres = [];
            
            foreach ($json['genres'] as $genre)
            {
                array_push($tabGenres, $genre['name']);
            }
            $tabGenres = implode(', ', $tabGenres);

            $movie->setGenres($tabGenres);
        }
        
        if($json['runtime'])
        {
            $hour = floor($json['runtime'] / 60);
            $minutes = $json['runtime'] % 60;
            
            $movie->setRuntime($hour . 'h ' . $minutes . 'min');
        }
        
        if ($json['credits'])
        {
            $tab = [];
            for($i = 0; $i < 3; $i++)
                {
                    array_push($tab, $json['credits']['cast'][$i]['name']);
                }
            $tab = implode(', ', $tab);

            $movie->setActors($tab);
        }
        
        if ($json['credits'])
        {
            $dir = '';
            for($i = 0; $i < count($json['credits']['crew']); $i++)
            {
                    if($json['credits']['crew'][$i]['job'] === 'Director')
                        $dir = $json['credits']['crew'][$i]['name'];
            }
            $movie->setDirector($dir);
        }
        
        if($json['release_date'])
        {
             $reldate = trim( implode('/', array_reverse(explode('-', $json['release_date']))));
             $movie->setRelease_date($reldate);
        }
            
        $movie->setVote_average($json['vote_average']);

        return $movie;
    }
    
    // méthode de récupération d'une liste de films
    public static function loadAllFromJson($json): array
    {
        // tableau de la liste à récupérer
        $allMovies = [];
        
        for( $i = 0; $i < count($json['results']); $i++):
            
            // instanciation de Movie
            $movie = new Movie();
            
            // sin les données existent, définition de celles-ci
            if($json['results'][$i]['id'] && $json['results'][$i]['title'] && $json['results'][$i]['poster_path'] && $json['results'][$i]['overview'] && $json['results'][$i]['release_date'] && $json['results'][$i]['vote_average']):
                
                $movie->setId_api($json['results'][$i]['id']);
                $movie->setTitle($json['results'][$i]['title']);
                $movie->setPoster_path($json['results'][$i]['poster_path']);
                $movie->setOverview($json['results'][$i]['overview']);
                
                if($json['results'][$i]['release_date'])
                {
                     $reldate = trim( implode('/', array_reverse(explode('-', $json['results'][$i]['release_date']))));
                     $movie->setRelease_date($reldate);
                }
                    
                $movie->setVote_average($json['results'][$i]['vote_average']);
                
                array_push($allMovies, $movie);
                
            endif;
            
        endfor;
                
        return $allMovies;
    }
}