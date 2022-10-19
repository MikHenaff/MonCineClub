<div class="movie-msg">
    <?php if (isset($_SESSION['msg'])): ?>
    <p><?php echo $_SESSION['msg'];
    unset($_SESSION['msg']); ?></p>
    <form>
        <input id="back2" class="back-btn" type="button" value="Retour">
    </form>
    <?php endif; ?>
</div>