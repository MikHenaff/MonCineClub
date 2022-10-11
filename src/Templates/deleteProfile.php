<section class="user-register">
    <?php if (isset($_SESSION['msg'])): ?>
    <p class="msg-deletion"><?php echo $_SESSION['msg'];
    unset($_SESSION['msg']); ?></p>
    <?php elseif(Authenticator::isLogged()): ?>
    <form action="./delete-profile" method="POST">
        <h2>Supprimer mon compte</h2>
        <p class="label-register">&Ecirc;tes-vous sûr de vouloir supprimer votre compte ?<p>
        <a class="btn-no-deletion" href="./home">Annuler</a>
        <input class="btn-deletion" type="submit" name="delete" value="Supprimer">
    </form>
    <?php endif; ?>
</section>