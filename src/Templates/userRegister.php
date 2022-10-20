<section class="register-container">
    <form name="register" class="user-register" action="./user-register" method="POST">
        <h2>Créer mon compte</h2>
        <div class="register">
            <label class="label-register" for="username">Nom d'utilisateur:&nbsp;</label>
            <input class="input-register" type="text" name="username" id="username" <?php if(isset($_POST['username'])): ?> value="<?= $_POST['username']; ?>" <?php endif; ?> autocomplete>
        </div>
        <div class="register">
            <label class="label-register" for="password">Mot de passe:&nbsp;</label>
            <input class="input-register" type="password" name="password" id="password">
        </div>
        <div class="register">
            <label class="label-register" for="password2">Vérification du mot de passe:&nbsp;</label>
            <input class="input-register" type="password" name="password2" id="password2">
        </div>
        <div class="register">
            <label class="label-register" for="email">Email:&nbsp;</label>
            <input class="input-register" type="email" name="email" id="email" <?php if(isset($_POST['email'])): ?> value="<?= $_POST['email']; ?>" <?php endif; ?> autocomplete>
        </div>
        <div class="register-btn-container">
            <a class="btn-cancel-register" href="./home">Annuler</a>
            <button id="btn-register" class="btn-register" type="submit">Créer</button>
        </div>
        <?php if (isset($_SESSION['msg'])): ?>
        <p class="msg-register"><?php echo $_SESSION['msg'];
        unset($_SESSION['msg']); ?></p>
        <?php endif; ?>
    </form>
</section>