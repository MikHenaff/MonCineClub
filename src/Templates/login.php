<?php if(!Authenticator::isLogged()): ?>
    <div class="form form-login">
        <form action="./login" method="POST">
            <?php if(isset($_SESSION['success-registration'])): ?>
            <p class="msg-success-registration"><?php echo $_SESSION['success-registration'];
            unset($_SESSION['success-registration']) ?></p>
            <?php endif; ?>
            <h2>Me connecter</h2>
            <input class="input-login" type="text" placeholder="nom d'utlilisateur" name="username"/>
            <input class="input-login" type="password" placeholder="mot de passe" name="password_submitted"/>
            <a class="btn-cancel-register" href="./home">Annuler</a>
            <input class="btn-login" type="submit" value="Me connecter">
            <?php if(isset($_SESSION['msg'])): ?>
            <p class="msg-login"><?php echo $_SESSION['msg'];
            unset($_SESSION['msg']) ?></p>
            <?php endif; ?>
        </form>
    </div>
<?php endif; ?>

