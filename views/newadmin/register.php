<?php include ROOT . '/views/layouts/auth_header.php'; ?>

<main class="form-signin">
    <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li> - <?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form action="" method="POST">
        <h1 class="h3 mb-3 fw-normal">Please register</h1>
        <input type="text" name="firstName" id="inputEmail" class="form-control mb-3" placeholder="First name"
               value="<?php if (isset($errors) && is_array($errors)) echo $_POST["firstName"]?>">
        <input type="text" name="lastName" id="inputEmail" class="form-control mb-3" placeholder="Last name"
               value="<?php if (isset($errors) && is_array($errors)) echo $_POST["lastName"]?>">
        <input type="email" name="email" id="inputEmail" class="form-control mb-3" placeholder="Email address"
               value="<?php if (isset($errors) && is_array($errors)) echo $_POST["email"]?>">
        <input type="password" name="password" id="inputPassword" class="form-control mb-3" placeholder="Password">
        <select name="admin_role" class="reg-form form-control form-select-lg mb-3 select_role" aria-label="Default select example">
            <option class="form-control" selected value="">Select admin role</option>
            <option value="type_1">type_1</option>
            <option value="type_2">type_2</option>
            <option value="type_3">type_3</option>
        </select>
        <input name="sign-up" class="w-100 btn btn-lg btn-primary" type="submit" value="Register">
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
    </form>
</main>

<?php include ROOT . '/views/layouts/auth_footer.php'; ?>