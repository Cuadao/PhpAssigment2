<?php
session_start();
$title = 'Home Page NeptunoBox';
require_once 'header.php';
require_once 'validateauth.php';
/* if (!empty($_SESSION['id_user'])) {
    echo '<a href="register.php">Add a New User</a>';
} */
/* if($_SESSION["name_usr"]) {
    ?>
    Welcome <?php echo $_SESSION["name_usr"]; ?> 
    <?php
    }else echo "<h1>Please login first .</h1>";
    ?>*/
?> 
<body>
    <h1>Welcome to Alce Neptuno Box - <?php echo $_SESSION["name_usr"]; ?></h1>
    <h2>This site is created to take customer orders in a bussiness manufacture</h2>
    <section class="head1">
    <h1>NeptunoBox</h1>
    </section>
   
<?php
require_once('footer.php')
?>
