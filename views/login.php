<form action="" method="post">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(getCsrfToken()) ?>">
    <label for="usernameOrEmail">Username or Email:</label>
    <br>
    <input type="text" name="usernameOrEmail" id="usernameOrEmail">
    <br>
    <br>
    <label for="password">Password:</label>
    <br>
    <input type="password" name="password" id="password">
    <br>
    <br>
    <button type="submit">Submit</button>
</form>

<?php foreach (getFlashMessages('error') as $message): ?>
    <p><b>Error: </b> <?= $message ?></p>
<?php endforeach; ?>

<?php if (isset($_SESSION['validation_errors']) && isset($_SESSION['validation_errors']['login'])): ?>
    <ul>
        <?php foreach ($_SESSION['validation_errors']['login'] as $field => $errors): ?>
            <li><b><?= $field ?></b> <?= join(', ', $errors) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>