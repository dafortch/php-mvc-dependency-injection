<form action="" method="post">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(getCsrfToken()) ?>">
    <label for="username">Username:</label>
    <br>
    <input type="text" name="username" id="username">
    <br>
    <br>
    <label for="email">Email:</label>
    <br>
    <input type="text" name="email" id="email">
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

<?php if (isset($_SESSION['validation_errors']) && isset($_SESSION['validation_errors']['register'])): ?>
    <ul>
        <?php foreach ($_SESSION['validation_errors']['register'] as $field => $errors): ?>
            <li><b><?= $field ?></b> <?= join(', ', $errors) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>