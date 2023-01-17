<h1 class="movies">Ma collection</h1>
<?php if (Authenticator::isLogged()) : ?>
    <?php if ($movies) : ?>
        <div class="container-collection">
            <?php foreach ($movies as $movie) : ?>
                <div class="show-movie">
                    <div class="show-img">
                        <img src="https://image.tmdb.org/t/p/w185<?= $movie['poster_path']; ?>" alt="<?= $movie['title']; ?>-poster">
                    </div>
                    <div class="infos">
                        <div class="show-infos">
                            <h2 class="title-movie"><?= $movie['title']; ?></h2>
                        </div>
                        <div class="btn">
                            <div class="more-details">
                                <form action="more-details" method="POST">
                                    <input type="hidden" name="more-details" value="<?= $movie['id_api']; ?>" />
                                    <input class="btn-more-details" id="<?= $movie['id_api']; ?>" type="submit" name="more-details-submit" value="Voir plus d'infos">
                                </form>
                            </div>
                            <div class="add">
                                <form action="delete-movie" method="POST">
                                    <input type="hidden" name="id-movie-del" value="<?= $movie['id']; ?>" />
                                    <input class="btn-delete-movie" id="<?= $movie['id']; ?>" type="submit" name="id-movie-deletion" value="Supprimer de ma collection">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>