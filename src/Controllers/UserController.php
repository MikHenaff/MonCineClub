<?php

// contrôleur des utilisateurs (récupération des données des utilisateurs pour création de compte/modification de profil/suppression de compte, et redirection vers les templates concernées)

class UserController extends AbstractController 
{
    // méthode statique d'enregistrement de l'utilisateur
    public static function register(): void
    {
        // si un ou des champs ne sont pas remplis, on envoit un message d'erreur
        // if (isset($_POST['username']) && empty($_POST['username']) && isset($_POST['password']) && empty($_POST['password']) && isset($_POST['password2']) && empty($_POST['password2']) && isset($_POST['email']) && empty($_POST['email']))
        // {
        //     $_SESSION['msg'] = 'Veuillez remplir tous les champs';
        // }
        // else if (isset($_POST['username']) && empty($_POST['username']))
        // {
        //     $_SESSION['msg'] = 'Veuillez saisir un nom d\'utilisateur';
        // }
        // else if (isset($_POST['password']) && empty($_POST['password']))
        // {
        //     $_SESSION['msg'] = 'Veuillez saisir un mot de passe';
        // }
        // else if (isset($_POST['password2']) && empty($_POST['password2']))
        // {
        //     $_SESSION['msg'] = 'Veuillez saisir un mot de passe de confirmation';
        // }
        // else if (isset($_POST['email']) && empty($_POST['email']))
        // {
        //     $_SESSION['msg'] = 'Veuillez saisir un email';
        // }
        
        // si les champs sont remplis...
        if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['password2']) && !empty($_POST['email']))
        {
            // et qu'ils sont valides, on enregistre le nouvel utilisateur
            $user = UserRegistration::registration(new User($_POST['username'], $_POST['password'], $_POST['email']));
            
            // $user est false si registration() renvoit une erreur, null sinon
            if ($user === null):
                $_SESSION['success-registration'] = 'Votre compte a été créé avec succès, connectez-vous pour pouvoir ajouter des films à votre collection';
                
                // redirection vers la connexion en cas de succès
                self::render('login');
                die;
            endif;
        }
        
        // l'utilisateur reste sur le même formulaire en cas d'échec
        self::render('user-register');
        
    }
    
    //méthode de modification de profil utilisateur
    public static function update(): void
    {
        // si l'utilisateur est connecté
        if ($_SESSION['userId'])
        {
            // si un ou des champs ne sont pas remplis, on envoit un message d'erreur
            // if (isset($_POST['updated_username']) && empty($_POST['updated_username']) && isset($_POST['updated_password']) && empty($_POST['updated_password']) && isset($_POST['updated_password2']) && empty($_POST['updated_password2']) && isset($_POST['updated_email']) && empty($_POST['updated_email']))
            // {
            //     $_SESSION['msg'] = 'Veuillez remplir tous les champs';
            // }
            // else if (isset($_POST['updated_username']) && empty($_POST['updated_username']))
            // {
            //     $_SESSION['msg'] = 'Veuillez saisir un nom d\'utilisateur';
            // }
            // else if (isset($_POST['updated_password']) && empty($_POST['updated_password']))
            // {
            //     $_SESSION['msg'] = 'Veuillez saisir un mot de passe';
            // }
            // else if (isset($_POST['updated_password2']) && empty($_POST['updated_password2']))
            // {
            //     $_SESSION['msg'] = 'Veuillez saisir un mot de passe de confirmation';
            // }
            // else if (isset($_POST['updated_email']) && empty($_POST['updated_email']))
            // {
            //     $_SESSION['msg'] = 'Veuillez saisir un email';
            // }
            
            // si les champs sont remplis...
            if (!empty($_POST['updated_username']) && !empty($_POST['updated_password']) && !empty($_POST['updated_password2']) && !empty($_POST['updated_email']))
            {
                // et qu'ils sont valides, on modifie les nouvelles données de l'utilisateur
                $user = UserUpdate::update(new User($_POST['updated_username'], $_POST['updated_password'], $_POST['updated_email']));
                
                // $user est false si update() renvoit une erreur, null sinon
                if ($user === null):
                    $_SESSION['success-update'] = 'Votre nouveau profil a été enregistré';
                    
                    // message en cas de succès
                    self::render('update-profile');
                    die;
                endif;
            }
            
            // l'utilisateur reste sur le même formulaire en cas d'échec
            self::render('update-profile');

        }
  
    }
    
    // méthode de suppression de compte utilisateur
    public static function delete(): void
    {
        // si l'utilisateur confirme vouloir supprimer son compte, suppression, déconnexion et envoit d'un message
        if(isset($_POST['delete']))
        {
            UserDeletion::deleteUser();
            $_SESSION['userId'] = null;
            $_SESSION['msg'] = 'Votre compte a bien été supprimé';
            
        }
        // // redirection vers le formulaire de confirmation
        self::render('delete-profile');
    }
    
}