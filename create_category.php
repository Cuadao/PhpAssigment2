<?php
$title = 'Create Category NeptunoBox';
require_once('header.php');
?>

<?php
//$musicianId = $_POST['musicianId'];  // we need the id if we are updating an existing record
$categ_name = $_POST['categ_name'];
$categ_desc = $_POST['categ_desc'];

// validate inputs
$ok = true; // variable to determine if we should save or not

if (empty($categ_name)) {
    echo 'Name is required<br />';
    $ok = false;
}

// strlen is a PHP function that shows the length of a string value
elseif (strlen($categ_name) > 100) {
    echo 'Name must be 100 characters or less<br />';
    $ok = false;
}

//$db = new PDO('mysql:host=localhost; dbname=alceneptunobox', 'root', '');
require_once('db/db.php');

$sql = "INSERT INTO categories (categ_name, categ_desc) VALUES 
        (:categ_name, :categ_desc)";

$cmd = $db->prepare($sql);

    // bind the variables into the INSERT command
$cmd->bindParam(':categ_name', $categ_name, PDO::PARAM_STR, 45);
$cmd->bindParam(':categ_desc', $categ_desc, PDO::PARAM_STR, 100);

$cmd->execute();

    // disconnect
$db = null;

echo 'Category Created Correctly';

?>

<?php
require_once('footer.php')
?>