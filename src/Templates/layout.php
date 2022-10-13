<?php require_once './src/Templates/head.php'; ?>
<body>
    <?php require_once './src/Templates/header.php'; ?>
    <?php 
        
        // template page d'accueil
        if ($template === 'home')
            require './src/Templates/home.php';
            
        // templates utilisateur
        if ($template === 'user-register')
            require './src/Templates/userRegister.php';
            
        if ($template === 'update-profile')
            require './src/Templates/updateProfile.php';
            
        if ($template === 'delete-profile')
            require './src/Templates/deleteProfile.php';
    
        if ($template === 'login')
            require './src/Templates/login.php';
            
        // templates films
        if ($template === 'my-movies')
            require './src/Templates/myMovies.php';
            
        if ($template === 'recent-movies')
            require './src/Templates/recentMovies.php';
            
        if ($template === 'popular-movies')
            require './src/Templates/popularMovies.php';
            
        if ($template === 'upcoming-movies')
            require './src/Templates/upcomingMovies.php';   
            
        if ($template === 'search-movie')
            require './src/Templates/searchMovie.php';
            
        if ($template === 'more-details')
            require './src/Templates/moreDetails.php';
            
        //templates messages
        if ($template === 'messages')
            require './src/Templates/messages.php';
        
        if ($template === 'messages-movie')
            require './src/Templates/messagesMovie.php';
            
    ?>
    <?php require_once './src/Templates/footer.php'; ?>
    
    <script src='/MonCineClub/public/js/main.js'></script>
</body>

</html>