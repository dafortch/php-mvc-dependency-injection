<?php $user = getUser() ?>

<?php foreach (getFlashMessages('success') as $message): ?>
    <p><b>Success: </b> <?= $message ?></p>
<?php endforeach; ?>

<h2>Welcome <?= $user->username ?></h2>

<h4>User Data</h4>
<p><b>Username:</b> <?= htmlspecialchars($user->username) ?></p>
<p><b>Email:</b> <?= htmlspecialchars($user->email) ?></p>
<p><b>Created At:</b> <?= htmlspecialchars($user->createdAt->format('Y-m-d H:i:s')) ?></p>
<p><b>Updated At:</b> <?= htmlspecialchars($user->updatedAt->format('Y-m-d H:i:s')) ?></p>

<a href="<?= route('/logout') ?>">Logout</a>