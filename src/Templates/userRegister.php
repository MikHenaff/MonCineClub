<section class="user-register">
    <form action="./user-register" method="POST">
        <h2>Créer mon compte</h2>
        <div class="register">
            <label class="label-register" for="username">Nom d'utilisateur:</label>
            <input class="input-register" type="text" name="username" id="username">
        </div>
        <div class="register">
            <label class="label-register" for="password">Mot de passe:</label>
            <input class="input-register" type="password" name="password" id="password">
        </div>
        <div class="register">
            <label class="label-register" for="password2">Vérification du mot de passe:</label>
            <input class="input-register" type="password" name="password2" id="password2">
        </div>
        <div class="register">
            <label class="label-register" for="email">Email:</label>
            <input class="input-register" type="email" name="email" id="email"> 
        </div>
        <a class="btn-cancel-register" href="./home">Annuler</a>
        <button class="btn-register" type="submit">Créer</button>
        <?php if (isset($_SESSION['msg'])): ?>
        <p class="msg-register"><?php echo $_SESSION['msg'];
        unset($_SESSION['msg']); ?></p>
        <?php endif; ?>
    </form>
</section>