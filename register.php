<?php
$title = 'Register NeptunoBox';
require_once('header2.php');
?>

<main class="container">
    <h1>User Registration</h1>
    <form method="post" action="create_user.php">
        <fieldset class="form-group">
            <label for="username" class="col-md-2">Username:</label>
            <input name="username" id="username" required type="email" placeholder="email@email.com" />
        </fieldset>
        <fieldset class="form-group">
            <label for="password" class="col-md-2">Password:</label>
            <input type="password" name="password" id="password" required
                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
        </fieldset>
        <fieldset class="form-group">
            <label for="confirm" class="col-md-2">Confirm Password:</label>
            <input type="password" name="confirm" id="confirm" required
                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
        </fieldset>
        <fieldset class="form-group">
            <label for="name_usr" class="col-md-2">Name:</label>
            <input name="name_usr" id="name_usr" required/>
        </fieldset>
        <div class="offset-md-2">
            <input type="submit" value="Register" class="btn btn-info" />
        </div>
    </form>
</main>

<?php
require_once('footer.php')
?>