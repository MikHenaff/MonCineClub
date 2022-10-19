<?php if (Authenticator::isLogged()): ?>
    <?php if($movie): ?>
        <div class="details">
            <h1 class="movies"><?= $movie->getTitle(); ?></h1>
            <div class="details-img">
                <img src="https://image.tmdb.org/t/p/w300<?= $movie->getPoster_path(); ?>" alt="<?= $movie->getTitle(); ?>-poster">
            </div>
            <div class="details-infos">
                <p class="tagline"><?= $movie->getTagline(); ?></p>
                <p><span class="infos-bold">Genre(s): </span><?= $movie->getGenres(); ?></p>
                <p><span class="infos-bold">Durée: </span><?= $movie->getRuntime(); ?></p>
                <p><span class="infos-bold">Réalisateur: </span><?= $movie->getDirector(); ?></p>
                <p><span class="infos-bold">Acteurs: </span><?= $movie->getActors(); ?></p>
                <p><span class="infos-bold">Note: </span><?= $movie->getVote_average(); ?>/10</p>
                <p><span class="infos-bold">Sortie le: </span><?= $movie->getRelease_date(); ?></p>
            </div>
            <div class="details-overview">
                <h2>Synopsis:</h2>
                <p><?= $movie->getOverview(); ?></p>
            </div>
            <form class="details-btn">
                <input id="back" class="back-btn back-details-btn" type="button" value="Retour">
            </form>
        </div>
    <?php endif; ?>
<?php endif; ?>