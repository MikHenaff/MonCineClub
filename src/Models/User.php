<?php

class User 
{
    // attributs
    private ?int $id = null;
    private ?string $username = null;
    private ?string $password_submitted = null;
    private ?string $password = null;
    private ?string $email = null;
    
    // constructeur
    public function __construct(string $username = '', string $password_submitted = '', string $email = '') 
    {
        if (!empty($username))
            $this->username = $username;
            
        if (!empty($password_submitted))
            $this->password_submitted = $password_submitted;
            
        if (!empty($email))
            $this->email = $email;
    }
    
    // getters
    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getUsername(): ?string
    {
        return $this->username;
    }
    
    public function getPasswordSubmitted(): ?string
    {
        return $this->password_submitted;
    }
    
    public function getPassword(): ?string
    {
        return $this->password;
    }
    
    public function getEmail(): ?string
    {
        return $this->email;
    }
    
}