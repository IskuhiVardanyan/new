<?php include ROOT . '/views/layouts/auth_header.php'; ?>

<main class="form-signin">
    <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li> - <?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
  <form action="" method="post">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    <input type="email" name="email" id="inputEmail" class="form-control mb-3" placeholder="Email address" autofocus>
    <input type="password" name="password" id="inputPassword" class="form-control mb-3" placeholder="Password">
    <input name="sign-in" class="w-100 btn btn-lg btn-primary" type="submit" value="Sign in">
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>
<!--some comment-->
<?php include ROOT . '/views/layouts/auth_footer.php'; ?>