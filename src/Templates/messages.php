<div class="success">
    <?php if (isset($_SESSION['msg'])): ?>
    <p class="msg-success"><?php echo $_SESSION['msg'];
    unset($_SESSION['msg']); ?></p>
    <?php endif; ?>
</div>