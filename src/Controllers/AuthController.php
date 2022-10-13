<?php

// contrôleur d'authentification de l'utilisateur (récupération des données pour la connexion/déconnexion de l'utilisateur et redirection vers les templates adéquates)

class AuthController extends AbstractController 
{
    // méthode de connexion de l'utilisateur
    public static function login (): void
    {
        // si les champs ne sont pas vides alors on authentifie l'utilisateur
        if (!empty($_POST['username']) && !empty($_POST['password_submitted']))
        {
            $user = Authenticator::authenticate(new User($_POST['username'], $_POST['password_submitted']));
        }
        
        // si un ou tous les champs sont vides alors on envoit un message d'erreur
        // if (isset($_POST['username']) && empty($_POST['username']) && isset($_POST['password_submitted']) && empty($_POST['password_submitted']))
        // {
        //     $_SESSION['msg'] = 'Veuillez saisir votre nom d\'utilisateur et votre mot de passe';
        // }
        // else if (isset($_POST['username']) && empty($_POST['username']))
        // {
        //     $_SESSION['msg'] = 'Veuillez saisir votre nom d\'utilisateur';
        // }
        // else if (isset($_POST['password_submitted']) && empty($_POST['password_submitted']))
        // {
        //     $_SESSION['msg'] = 'Veuillez saisir votre mot de passe';
        // }
            
        // formulaire de connexion
        if (!Authenticator::isLogged()):
            
        //     header('location: /MonCineClub/src/Templates/login.php');
            
        // else:
            
            self::render('login');
            
        endif;

    }
    
    // méthode de déconnexion de l'utilisateur
    public static function logout (): void
    {
        Authenticator::logout();
        $_SESSION['msg'] = 'Vous êtes déconnecté';
        
        // redirection vers la page messages
        self::render('messages');
    }
    
}