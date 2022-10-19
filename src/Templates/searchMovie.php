<h1 class="movies">Résultat(s) de votre recherche :</h1>
<?php if($movies): ?>
<div class="container-collection">
    <?php foreach($movies as $movie): ?>
        <div class="show-movie">
            <div class="show-img">
                <img src="https://image.tmdb.org/t/p/w185<?= $movie->getPoster_path(); ?>" alt="<?= $movie->getTitle(); ?>-poster">
            </div>
            <div class="infos">
                <div class="show-infos">
                    <h2><?= $movie->getTitle(); ?></h2>
                </div>
                <div class="more-details">
                    <form action="./more-details" method="POST">
                        <input type="hidden" name="more-details" value="<?= $movie->getId_api(); ?>" />
                        <input class="btn-more-details" id="<?= $movie->getId_api(); ?>" type="submit" name="more-details-submit" value="Voir plus d'infos">
                    </form>
                </div>
                <div class="add">
                    <form action="./movie-register" method="POST">
                        <input type="hidden" name="id-api" value="<?= $movie->getId_api(); ?>" />
                        <input class="btn-add" id="<?= $movie->getId_api(); ?>" type="submit" name="id-api-submit" value="Ajouter à ma collection">
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>