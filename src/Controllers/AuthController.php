<?php

// contrôleur d'authentification de l'utilisateur (récupération des données pour la connexion/déconnexion de l'utilisateur et redirection vers les templates adéquates)

class AuthController extends AbstractController
{
    // méthode de connexion de l'utilisateur
    public static function login(): void
    {
        // si les champs ne sont pas vides alors on authentifie l'utilisateur
        if (!empty($_POST['username']) && !empty($_POST['password_submitted']))
            $user = Authenticator::authenticate(new User(htmlspecialchars($_POST['username'], ENT_QUOTES), $_POST['password_submitted']));

        // formulaire de connexion
        if (!Authenticator::isLogged())
            self::render('login');
    }

    // méthode de déconnexion de l'utilisateur
    public static function logout(): void
    {
        Authenticator::logout();
        $_SESSION['msg'] = 'Vous êtes déconnecté';

        // redirection vers la page messages
        self::render('messages');
    }
}
