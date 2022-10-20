window.addEventListener('DOMContentLoaded', function () {

    // menu burger
    const burger = document.getElementById('burger');
    const menu = document.getElementById('menu');
    
    if (burger && menu) {
        
        burger.addEventListener('click', () => {
            burger.classList.toggle('active');
            menu.classList.toggle('active');
        });
    }
    
    //bouton retour more-details
    const back = document.getElementById('back');
    if (back) {
        back.addEventListener('click', () => {
            window.history.go(-1);
        });
    }
    
    // bouton retour messages-movie
    const back2 = document.getElementById('back2');
    if (back2) {
        back2.addEventListener('click', () => {
            window.history.go(-1);
        });
    }
    
    // ***************** validation des formulaires (caractères spéciaux et champs vides) ************************
    
    // ************* barre de recherche ***********************
    
    const formSearch = document.forms['search-nav'];
    const btnSearch = document.getElementById('btn-search');
    
    // contrôle des données saisies
    function validateFormSearch() {
        
        const search = formSearch['search'].value;
        
        if (search.length === 0) {
            
            alert('veuillez entrer un titre de film');
            formSearch['search'].focus();
            return false;
        }
        
        return true;
    }
    
    // soumission du formulaire si les données ont passé le contrôle
    function submitFormSearch() {
        
        const valid = validateFormSearch();
        
        if (!valid) {
            
            return false;
        }
        
        formSearch.submit();
    }
    
    // lancement du processus de vérification au clic
    if (btnSearch) {
        
        btnSearch.addEventListener('click', (e) => {
            
            e.preventDefault();
            submitFormSearch();
        });
    }
    
    // ************* inscription *******************
    
    const formRegister = document.forms['register'];
    const btnRegister = document.getElementById('btn-register');
    
    // contrôle des données saisies
    function validateFormRegister() {
        
        const usernameRegister = formRegister['username'].value;
        const passwordRegister = formRegister['password'].value;
        const password2Register = formRegister['password2'].value;
        const emailRegister = formRegister['email'].value;
        
        if (usernameRegister.length === 0 && passwordRegister.length === 0 && password2Register.length === 0 && emailRegister.length === 0) {
            
            alert('veuillez remplir tous les champs');
            return false;
        }
        
        if (usernameRegister.length === 0) {
            
            alert('veuillez saisir un nom d\'utilisateur');
            formRegister['username'].focus();
            return false;
        }
        
        if (passwordRegister.length === 0) {
            
            alert('veuillez saisir un mot de passe');
            formRegister['password'].focus();
            return false;
        }
        
        if (password2Register.length === 0) {
            
            alert('veuillez confirmer votre mot de passe');
            formRegister['password2'].focus();
            return false;
        }
        
        if (emailRegister.length === 0) {
            
            alert('veuillez saisir un email');
            formRegister['email'].focus();
            return false;
        }
        
        return true;
    }
    
    // soumission du formulaire si les données ont passé le contrôle
    function submitFormRegister() {
        
        const valid = validateFormRegister();
        
        if (!valid) {
            
            return false;
        }
        
        formRegister.submit();
    }
    
    // lancement du processus de vérification au clic
    if (btnRegister) {
        
        btnRegister.addEventListener('click', (e) => {
            
            e.preventDefault();
            submitFormRegister();
        });
    }
    
    // ************* mise à jour des données utilisateur *****************
    
    const formUpdate = document.forms['update'];
    const btnUpdate = document.getElementById('btn-update');
    
    // contrôle des données saisies
    function validateFormUpdate() {
        
        const usernameUpdate = formUpdate['updated_username'].value;
        const passwordUpdate = formUpdate['updated_password'].value;
        const password2Update = formUpdate['updated_password2'].value;
        const emailUpdate = formUpdate['updated_email'].value;
        
        if (usernameUpdate.length === 0 && passwordUpdate.length === 0 && password2Update.length === 0 && emailUpdate.length === 0) {
            
            alert('veuillez remplir tous les champs');
            return false;
        }
        
        if (usernameUpdate.length === 0) {
            
            alert('veuillez saisir un nom d\'utilisateur');
            formUpdate['updated_username'].focus();
            return false;
        }
        
        if (passwordUpdate.length === 0) {
            
            alert('veuillez saisir un mot de passe');
            formUpdate['updated_password'].focus();
            return false;
        }
        
        if (password2Update.length === 0) {
            
            alert('veuillez confirmer votre mot de passe');
            formUpdate['updated_password2'].focus();
            return false;
        }
        
        if (emailUpdate.length === 0) {
            
            alert('veuillez saisir un email');
            formUpdate['updated_email'].focus();
            return false;
        }
        
        return true;
    }
    
    // soumission du formulaire si les données ont passé le contrôle
    function submitFormUpdate() {
        
        const valid = validateFormUpdate();
        
        if (!valid) {
            
            return false;
        }
        
        formUpdate.submit();
    }
    
    // lancement du processus de vérification au clic
    if (btnUpdate) {
        
        btnUpdate.addEventListener('click', (e) => {
            
            e.preventDefault();
            submitFormUpdate();
        });
    }
    
    // ****************** connexion **********************
    
    const formLogin = document.forms['login'];
    const btnLogin = document.getElementById('btn-login');
    
    // contrôle des données saisies
    function validateFormLogin() {
        
        const usernameLogin = formLogin['username'].value;
        const passwordLogin = formLogin['password_submitted'].value;
        
        if (usernameLogin.length === 0 && passwordLogin.length === 0) {
            
            alert('veuillez remplir tous les champs');
            return false;
        }
        
        if (usernameLogin.length === 0) {
            
            alert('veuillez saisir un nom d\'utilisateur');
            formLogin['username'].focus();
            return false;
        }
        
        if (passwordLogin.length === 0) {
            
            alert('veuillez saisir un mot de passe');
            formLogin['password_submitted'].focus();
            return false;
        }
        
        return true;
    }
    
    // soumission du formulaire si les données ont passé le contrôle
    function submitFormLogin() {
        
        const valid = validateFormLogin();
        
        if (!valid) {
            
            return false;
        }
        
        formLogin.submit();
    }
    
    // lancement du processus de vérification au clic
    if (btnLogin) {
        
        btnLogin.addEventListener('click', (e) => {
            
            e.preventDefault();
            submitFormLogin();
        });
    }
    
   
// **************************************** media queries ****************************
    
        const homepageDiv = document.getElementById('homepage-div');
        const grid = document.getElementById('grid');
        
        const logoBar = document.getElementById('logo-bar');
        const searchNav = document.getElementById('search-nav');
        
        const mediaPhone = window.matchMedia("(max-width: 499px)");
        const mediaTabDesk = window.matchMedia("(min-width: 780px)");
        const mediaLandscape = window.matchMedia("(orientation: landscape)");
        

        // fonctions de changement d'image quand carousel automatisé en homepage
        const imgHome = document.getElementById('img-home');
        const homepageTab = 
        ['u0Ct3708zXaoJCkF65bLfenQmhM', '4K3yec5EWavUkAtcfH7Rupp7YSG', 'dhZ0xWMvv4TU2QEpAJKL7XLU2se', 'dCp0auHcFum1g6N1YSMLQmyVCT6', 'pIFZCbL2t6J4cAWQuFiiHkJJs1z', '8fCn7TwTe0Z4fTugIiLssX6UcHe', '97WSXRs5TSCQPup6t9gxB1xkD47', 'qelTNHrBSYjPvwdzsDBPVsqnNzc', 'dLHqguwt8WmgQVMIjSw3wVWirvV', 'xyY7hTEjHf0kPXWaSOggkGHc7DB', 'rcLG3jDid6si0OiDrzABe4WuwCy', 'wnDNKCeBQzioXYQrXcSyrmRHVxf', 'dmO5x4STbulw9BlZaVRQF3tHg3t', '6DNWp9tGjx9FNjQrf59kqOsGfE4', 'wE0j7sqbpOJwGviVjETfixJSS2s', 'xtAFddnDZD7E5tKHo99u4Ca1rdi', '5ARFGQmFGAE2eCjgLWESnfXCgDE', 'wuRf6gkX0JUJsu1MeECPubhMRdd', '5OPg6M0yHr21Ovs1fni2H1xpKuF', 'z3gIuT4e4tjCKYEYJChcBI44U21', 'd5gefer4mHnL5kOmlOP5rGumdM7', '4TBdF7nFw2aKNM0gPOlDNq3v3se','scaiAT7I2KZ2GAeMvoU6Ro1515J'
        ];
        let i = 0;
        let intervId;
        
        // "boucle" sur le tableau des identifiants des images et changement de src
        function loadImg () {

            imgHome.src = 'https://image.tmdb.org/t/p/w342/' + homepageTab[i] + '.jpg';
    
            if (i < homepageTab.length - 1) {
                
                i++;
                
            } else {
                
                i = 0;
                
            }
            
        }
        
        // récupération de l'identifiant du setInterval et changement d'image après 1,3 seconde d'affichage
        function changeImg () {
            
            if (!intervId) {
                
                intervId = setInterval(loadImg, 1300);
            }
        }
        
        // arrêt du carousel automatisé
        function stopChangeImg () {
            
            clearInterval(intervId);
            intervId = null;
        }
        
        
    
    // ************************************** téléphone *****************************
    if (mediaPhone.matches) {

        if (grid)    
            grid.style.display = 'none';   
        
        // détection du changement d'orientation
        mediaLandscape.addEventListener('change', () => {
            
            // si mode portrait
	        if (!mediaLandscape.matches) {
	            
                if (grid)
                    grid.style.display = 'none';
                
                if (homepageDiv)
                    homepageDiv.style.display = 'block';
                
                // déplacement de la barre de recherche par titre dans le menu et ajout du burger dans la logoBar
                menu.insertBefore(searchNav, menu.children[2]);
                logoBar.appendChild(burger);
            
            // si mode paysage    
            } else {

                if (homepageDiv)
                    homepageDiv.style.display = 'none';
                
                if (grid) {
                    grid.style.display = 'grid';
                    grid.style.maxWidth = '700px';
                    grid.style.overflow ='hidden';
                }
                
                // remplacement du burger par la barre de recherche par titre    
                logoBar.replaceChild(searchNav, burger);
            }
            
        });

        // lancement du carousel automatisé
        if (homepageDiv) {
            
            homepageDiv.style.display = 'block';
            
            window.onload = changeImg;
            homepageDiv.addEventListener('mouseover', stopChangeImg);
        }
    
    // gestion du retour en mode téléphone (sortie du mode téléphone paysage quand le change n'est plus détecté)
    } else {

        if (!mediaTabDesk.matches) {

            if (homepageDiv)
                homepageDiv.style.display = 'none';
            
            if (grid) {
                
                grid.style.display = 'grid';
                grid.style.maxWidth = '700px';
                grid.style.overflow ='hidden';
            }
            
            // remplacement du burger par la barre de recherche par titre
            logoBar.replaceChild(searchNav, burger);
            
            // détection du retour en téléphone portrait (max 499px)
            mediaPhone.addEventListener('change', () => {
                 
                 // si mode téléphone portrait
                 if (mediaPhone.matches) {

                    if (grid)
                        grid.style.display = 'none';
                    
                    if (homepageDiv)
                        homepageDiv.style.display = 'block';
                    
                    // déplacement de la barre de recherche par titre dans le menu et ajout du burger dans la logoBar
                    menu.insertBefore(searchNav, menu.children[2]);
                    logoBar.appendChild(burger);
                    
                    // écoute du changement d'orientation
                    mediaLandscape.addEventListener('change', () => {
            
                        // si mode portrait
            	        if (!mediaLandscape.matches) {

                            if (grid)
                                grid.style.display = 'none';
                            
                            if (homepageDiv)
                                homepageDiv.style.display = 'block';
                                
                            menu.insertBefore(searchNav, menu.children[2]);
                            logoBar.appendChild(burger);
                        
                        // si mode paysage    
                        } else {

                            if (homepageDiv)
                                homepageDiv.style.display = 'none';
                            
                            if (grid) {
                                grid.style.display = 'grid';
                                grid.style.maxWidth = '700px';
                                grid.style.overflow ='hidden';
                            }
                            
                            // remplacement du burger par la barre de recherche par titre
                            logoBar.replaceChild(searchNav, burger);
                        }
                    });
                }
            });
        }
    }
    
    // **************************************** tablette, laptop et bureau *********************************************
    
    if (mediaTabDesk.matches) {

        // remplacement du burger par la barre de recherche par titre
        logoBar.replaceChild(searchNav, burger);
        
        if (grid)
            grid.style.display = 'none';
        
        // si mode paysage
        if (mediaLandscape.matches) {

            if (homepageDiv)
                homepageDiv.style.display = 'none';
                
            if (grid)
                grid.style.display = 'grid';
        }
        
        // détection du changement d'orientation
        mediaLandscape.addEventListener('change', function() {
            
            // si mode portrait
	        if (!mediaLandscape.matches) {

                if (grid)
                    grid.style.display = 'none';
                    
                if (homepageDiv)
                    homepageDiv.style.display = 'block';
            
            // si mode paysage   
            } else {

                if (homepageDiv)
                    homepageDiv.style.display = 'none';
                
                if (grid)
                    grid.style.display = 'grid';
            }
            
        });
        
        // lancement du carousel automatisé
        if (homepageDiv) {
                    
            window.onload = changeImg;
            homepageDiv.addEventListener('mouseover', stopChangeImg);
        }
            
    }
    
});