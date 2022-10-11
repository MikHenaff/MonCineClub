<?php

// classe de connexion à la base de données

// final pour empêcher héritage
final class Database 
{
    // attribut 
    private static $instance = null;
    
    // constructeur vide mais en private pour empêcher l'instanciation
    private function __construct() {}
    
    // méthode statique de connexion à la bdd
    public static function dataConnect(): mixed
    {
        if (!self::$instance):
            try 
            {
                // données récupérées depuis le fichier .ini
                $db = parse_ini_file("./.ini", $process_sections = true);
                $user = $db['user'];
                $pass = $db['pass'];
                $name = $db['name'];
                $host = $db['host'];

                // instanciation de PDO
                self::$instance = new PDO("mysql:host=$host;port=3306;dbname=$name",
                    "$user",
                    "$pass"
                    );
                
            } catch (Exception $e) {
                die('Erreur système - Connexion impossible');
            }
        endif;
        
        return self::$instance;

    }
    
}