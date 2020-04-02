<?php
$title = 'Create Products NeptunoBox';
require_once('header.php');
?>

<?php
//$musicianId = $_POST['musicianId'];  // we need the id if we are updating an existing record
$prod_name = $_POST['prod_name'];
$prod_descr = $_POST['prod_descr'];
$prod_price1 = $_POST['prod_price1'];
$prod_price2 = $_POST['prod_price2'];
$id_category = $_POST['id_category'];

// validate inputs
$ok = true; // variable to determine if we should save or not

if (empty($prod_name)) {
    echo 'Name is required<br />';
    $ok = false;
}

// strlen is a PHP function that shows the length of a string value
elseif (strlen($prod_name) > 100) {
    echo 'Name must be 100 characters or less<br />';
    $ok = false;
}

// ! means NOT / false.  is_numeric is a PHP function that checks if a value is an integer or not
/* if (!empty($ranking)) {
    if (!is_numeric($ranking)) {
        echo 'Ranking must be a number 0 or higher<br />';
        $ok = false;
    }

    if ($ranking < 0) {
        echo 'Ranking must be a number 0 or higher<br />';
        $ok = false;
    }
}
 */
// photo upload check
/* if (!empty($photo['name'])) {
    $tmp_name = $photo['tmp_name'];
    $type = mime_content_type($tmp_name);

    if ($type != 'image/jpeg' && $type != 'image/png') {
        echo 'Please upload a .jpg or .png file<br />';
        $ok = false;
    }
    else {
        // use the session to uniquely name the uploaded file & save to the img/musicians
        session_start();
        $photo = session_id() . '-' . $photo['name'];
        move_uploaded_file($tmp_name, "img/musicians/$photo");
    }
}
 */
// is the form ok?

$db = new PDO('mysql:host=localhost; dbname=alceneptunobox', 'root', '');

$sql = "INSERT INTO products (prod_name, prod_descr, prod_price1, prod_price2, id_category) VALUES 
        (:prod_name, :prod_descr, :prod_price1, :prod_price2, :id_category)";

$cmd = $db->prepare($sql);

    // bind the variables into the INSERT command
$cmd->bindParam(':prod_name', $prod_name, PDO::PARAM_STR, 60);
$cmd->bindParam(':prod_descr', $prod_descr, PDO::PARAM_STR, 100);
$cmd->bindParam(':prod_price1', $prod_price1, PDO::PARAM_INT);
$cmd->bindParam(':prod_price2', $prod_price2, PDO::PARAM_INT);
$cmd->bindParam(':id_category', $id_category, PDO::PARAM_INT);
    
$cmd->execute();

    // disconnect
$db = null;

/* if ($ok == true) {
    // connect
    $db = new PDO('mysql:host=172.31.22.43;dbname=Rich100', 'Rich100', 'Vda787-KJ_');

    // set up insert or update
    if (empty($musicianId)) {
        $sql = "INSERT INTO musicians (name, recordLabel, ranking, solo, photo, city) VALUES 
        (:name, :recordLabel, :ranking, :solo, :photo, :city)";
    }
    else {
        $sql = "UPDATE musicians SET name = :name, recordLabel = :recordLabel, ranking = :ranking, solo = :solo,
            photo = :photo, city = :city WHERE musicianId = :musicianId";
    }

    $cmd = $db->prepare($sql);

    // bind the variables into the INSERT command
    $cmd->bindParam(':name', $name, PDO::PARAM_STR, 100);
    $cmd->bindParam(':recordLabel', $recordLabel, PDO::PARAM_STR, 50);
    $cmd->bindParam(':ranking', $ranking, PDO::PARAM_INT);
    $cmd->bindParam(':solo', $solo, PDO::PARAM_BOOL);
    $cmd->bindParam(':photo', $photo, PDO::PARAM_STR, 100);
    $cmd->bindParam(':city', $city, PDO::PARAM_STR, 50);

    if (!empty($musicianId)) {
        $cmd->bindParam(':musicianId', $musicianId, PDO::PARAM_INT);
    }

    // save to db
    $cmd->execute();

    // disconnect
    $db = null;

    //echo 'Musician Saved';
    header('location:musicians.php');
} */
echo 'Product Created Correctly';

?>

<?php
require_once('footer.php')
?>
