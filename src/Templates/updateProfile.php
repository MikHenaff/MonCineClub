<section class="register-container">
    <?php if(isset($_SESSION['success-update'])): ?>
    <p class="msg-success-update"><?php echo $_SESSION['success-update'];
    unset($_SESSION['success-update']) ?></p>
    <?php elseif(Authenticator::isLogged()): ?>
        <form name="update" class="user-register" action="./update-profile" method="POST">
            <h2>Modifier mon profil</h2>
            <div class="register">
                <label class="label-register" for="updated_username">Nom d'utilisateur:</label>
                <input class="input-register" type="text" name="updated_username" id="updated_username" <?php if(isset($_POST['updated_username'])): ?> value="<?= $_POST['updated_username']; ?>" <?php endif; ?> autocomplete>
            </div>
            <div class="register">
                <label class="label-register" for="updated_password">Mot de passe:</label>
                <input class="input-register" type="password" name="updated_password" id="updated_password">
            </div>
            <div class="register">
                <label class="label-register" for="updated_password2">Vérification du mot de passe:</label>
                <input class="input-register" type="password" name="updated_password2" id="updated_password2">
            </div>
            <div class="register">
                <label class="label-register" for="updated_email">Email:</label>
                <input class="input-register" type="email" name="updated_email" id="updated_email" <?php if(isset($_POST['updated_email'])): ?> value="<?= $_POST['updated_email']; ?>" <?php endif; ?> autocomplete>
            </div>
            <div class="register-btn-container">
                <a class="btn-cancel-register" href="./home">Annuler</a>
                <button id="btn-update" class="btn-register" type="submit">Modifier</button>
            </div>
            <?php if(isset($_SESSION['msg'])): ?>
            <p class="msg-error-update"><?php echo $_SESSION['msg'];
            unset($_SESSION['msg']) ?></p>
            <?php endif; ?>
        </form>
    <?php endif; ?>
</section>