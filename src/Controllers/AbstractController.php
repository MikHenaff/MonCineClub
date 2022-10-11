<?php 

// classe abstraite (prévue pour que les contrôleurs puissent hériter d'elle)

abstract class AbstractController 
{
    // méthode dirigeant vers une template précisée en argument et permettant l'importation de variables si besoin (protected pour les héritiers)
    protected static function render(string $tmpl = 'default', array $args = []): void
    {
        // importation des variables
        extract($args);
        
        $template = $tmpl;
        
        // layout pour déterminer la template nécessaire
        require './src/Templates/layout.php';
    }
    
}