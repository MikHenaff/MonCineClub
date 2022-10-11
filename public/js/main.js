window.addEventListener('DOMContentLoaded', function () {

    // menu burger
    const burger = document.getElementById('burger');
    const menu = document.getElementById('menu');
    if (burger && menu)
    {
        burger.addEventListener('click', () => {
            burger.classList.toggle('active');
            menu.classList.toggle('active');
        });
    }
    
    //bouton retour more-details
    const back = document.getElementById('back');
    if (back) {
        back.addEventListener('click', () => {
            history.go(-1);
        });
    }
    
    // bouton retour messages-movie
    const back2 = document.getElementById('back2');
    if (back2)
    {
        back2.addEventListener('click', () => {
            history.go(-1);
        });
    }
    
   
// ****************************************mediaqueries****************************
    
        const homepageDiv = document.getElementById('homepage-div');
        const grid = document.getElementById('grid');
        

        // fonctions de changement d'image quand carrousel en homepage
        const imgHome = document.getElementById('imgHome');
        const homepageTab = 
        ['u0Ct3708zXaoJCkF65bLfenQmhM', '4K3yec5EWavUkAtcfH7Rupp7YSG', 'dhZ0xWMvv4TU2QEpAJKL7XLU2se', 'dCp0auHcFum1g6N1YSMLQmyVCT6', 'pIFZCbL2t6J4cAWQuFiiHkJJs1z', '8fCn7TwTe0Z4fTugIiLssX6UcHe', '97WSXRs5TSCQPup6t9gxB1xkD47', 'qelTNHrBSYjPvwdzsDBPVsqnNzc', 'dLHqguwt8WmgQVMIjSw3wVWirvV', 'xyY7hTEjHf0kPXWaSOggkGHc7DB', 'rcLG3jDid6si0OiDrzABe4WuwCy', 'wnDNKCeBQzioXYQrXcSyrmRHVxf', 'dmO5x4STbulw9BlZaVRQF3tHg3t', '6DNWp9tGjx9FNjQrf59kqOsGfE4', 'wE0j7sqbpOJwGviVjETfixJSS2s', 'xtAFddnDZD7E5tKHo99u4Ca1rdi', '5ARFGQmFGAE2eCjgLWESnfXCgDE', 'wuRf6gkX0JUJsu1MeECPubhMRdd', '5OPg6M0yHr21Ovs1fni2H1xpKuF', 'z3gIuT4e4tjCKYEYJChcBI44U21', 'd5gefer4mHnL5kOmlOP5rGumdM7', '4TBdF7nFw2aKNM0gPOlDNq3v3se','scaiAT7I2KZ2GAeMvoU6Ro1515J'
        ];
        let i = 0;
        let intervId;
        
        function loadImg () {

            imgHome.src = 'https://image.tmdb.org/t/p/w342/' + homepageTab[i] + '.jpg';
    
            if (i < homepageTab.length - 1) {
                
                i++;
                
            } else {
                
                i = 0;
                
            }
            
        }
        
        function changeImg () {
            
            if (!intervId) {
                intervId = setInterval(loadImg, 1300);
            }
        }
        
        function stopChangeImg () {
            
            clearInterval(intervId);
            intervId = null;
        }
    
    // mode téléphone
    const mediaPhone = window.matchMedia("(max-width: 499px)");
    if (mediaPhone.matches) {
        
        homepageDiv.style.display = 'block';
        grid.style.display = 'none';

        
        if (homepageDiv) {
            window.onload = changeImg;
            homepageDiv.addEventListener('mouseover', stopChangeImg);
        }
            
    } else {
        
        const logoBar = document.getElementById('logo-bar');
        const searchNav = document.getElementById('search-nav');
        const burger = document.getElementById('burger');
        logoBar.replaceChild(searchNav, burger);
        
    }
    
    // modes tablette et bureau
    const mediaTabDesk = window.matchMedia("(min-width: 500px)");
    const mediaLandscape = window.matchMedia("(orientation: landscape)");
    
    if (mediaTabDesk.matches) {
        
        grid.style.display = 'none';
        
        if (mediaLandscape.matches) {
            homepageDiv.style.display = 'none';
            grid.style.display = 'grid';
        }
        
        mediaLandscape.addEventListener('change', function() {
            
	        if (!mediaLandscape.matches) {
                
                grid.style.display = 'none';
                homepageDiv.style.display = 'block';
                
            } else {
                
                homepageDiv.style.display = 'none';
                grid.style.display = 'grid';
            }
            
        });
        
        if (homepageDiv) {
                    
            window.onload = changeImg;
            homepageDiv.addEventListener('mouseover', stopChangeImg);
        }
            
    }
    
});
    
        
