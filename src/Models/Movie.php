<?php

class Movie 
{
    // attributs
    private ?int $id = null;
    private ?int $id_api = null;
    private ?string $title = null;
    private ?string $poster_path = null;
    private ?string $tagline = null;
    private ?string $overview = null;
    private ?string $genres = null;
    private ?string $runtime = null;
    private ?string $actors = null;
    private ?string $director = null;
    private ?string $release_date = null;
    private ?int $vote_average = null;
    
    // constructeur
    public function __construct(?int $id = 0, ?int $id_api = 0, ?string $title = '', ?string $poster_path = '', ?string $tagline = '', ?string $overview = '', ?string $genres = '', ?string $runtime = '', ?string $actors = '', ?string $director = '', ?string $release_date = '', ?int $vote_average = 0)
    {
        if (!empty($id))
            $this->id = $id;
            
        if (!empty($id_api))
            $this->id_api = $id_api;
        
        if (!empty($title))
            $this->title = $title;
            
        if (!empty($poster_path))
            $this->poster_path = $poster_path;
            
        if (!empty($tagline))
            $this->tagline = $tagline;
            
        if (!empty($overview))
            $this->overview = $overview;
            
        if (!empty($genres))
            $this->genres = $genres;
            
        if (!empty($runtime))
            $this->runtime = $runtime;
            
        if (!empty($actors))
            $this->actors = $actors;
            
        if (!empty($director))
            $this->director = $director;
            
        if (!empty($release_date))
            $this->release_date = $release_date;
            
        if (!empty($vote_average))
            $this->vote_average = $vote_average;
    }
    
    //getters
    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getId_api(): ?int
    {
        return $this->id_api;
    }
    
    public function getTitle(): ?string
    {
        return $this->title;
    }
    
    public function getPoster_path(): ?string
    {
        return $this->poster_path;
    }
    
    public function getTagline(): ?string
    {
        return $this->tagline;
    }
    
    public function getOverview(): ?string
    {
        return $this->overview;
    }
    
    public function getGenres(): ?string
    {
        return $this->genres;
    }
    
    public function getRuntime(): ?string
    {
        return $this->runtime;
    }
    
    public function getActors(): ?string
    {
        return $this->actors;
    }
    
    public function getDirector(): ?string
    {
        return $this->director;
    }
    
    public function getRelease_date(): ?string
    {
        return $this->release_date;
    }
    
    public function getVote_average(): ?int
    {
        return $this->vote_average;
    }
    
    
    //setters
    public function setId_api(int $id_api): void
    {
        $this->id_api = $id_api;
    }
    
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
    
    public function setPoster_path(string $poster_path): void
    {
        $this->poster_path = $poster_path;
    }
    
    public function setTagline(string $tagline): void
    {
        $this->tagline = $tagline;
    }
    
    public function setOverview(string $overview): void
    {
        $this->overview = $overview;
    }
    
    public function setGenres(string $genres): void
    {
        $this->genres = $genres;
    }
    
    public function setRuntime(string $runtime): void
    {
        $this->runtime = $runtime;
    }
    
    public function setActors(string $actors): void
    {
        $this->actors = $actors;
    }
    
    public function setDirector(string $director): void
    {
        $this->director = $director;
    }
    
    public function setRelease_date(string $release_date): void
    {
        $this->release_date = $release_date;
    }
    
    public function setVote_average(string $vote_average): void
    {
        $this->vote_average = $vote_average;
    }

}