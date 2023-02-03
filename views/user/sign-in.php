<?= \utils\Template::render('views/common/header.php') ?>
    <div class="medium-container">
        <div class="blocks-container">
            <div>
                <form action="/register-user" method="post" class="user-form">
                    <input type="text" name="name" placeholder="Name">
                    <input type="text" name="email" placeholder="Email">
                    <input type="password" name="password" placeholder="Password">
                    <input type="submit" value="Register">
                </form>
            </div>
<?= \utils\Template::render('views/common/footer.php') ?>