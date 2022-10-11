<div class="movie-msg">
    <?php if (isset($_SESSION['msg'])): ?>
    <p class=""><?php echo $_SESSION['msg'];
    unset($_SESSION['msg']); ?></p>
    <form>
        <input class="back-btn" id="back2" type="button" value="Retour">
    </form>
    <?php endif; ?>
</div>