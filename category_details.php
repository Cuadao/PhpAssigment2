<?php
$title = 'Category Details NeptunoBox';
require_once('header.php');

$id_categ = null;
$categ_name = null;
$categ_desc = null;

if (!empty($_GET['id_categ'])){
    $id_categ = $_GET['id_categ'];


//require_once('db/db.php');

$db = new PDO('mysql:host=localhost; dbname=alceneptunobox', 'root', '');


$sql = "SELECT * FROM categories WHERE id_categ = $id_categ";
$cmd = $db->prepare($sql);
$cmd->bindParam(':id_categ', $id_categ, PDO::PARAM_INT);

//execute
$cmd->execute();
$category = $cmd->fetch();
//$product = $cmd->fetch();

$categ_name = $category['categ_name'];
$categ_desc = $category['categ_desc'];

$db = null;

}
?>

<form method="POST" action="create_category.php">
    <fieldset>
        <label for="categ_name" cclass="col-md-2">Category Name:</label>
        <input name="categ_name" id="categ_name" value="<?php echo $categ_name; ?>"/>
    </fieldset>
    <fieldset>
        <label for="categ_desc" class="col-md-2">Category Description:</label>
        <input name="categ_desc" id="categ_desc" value="<?php echo $categ_desc; ?>"/>
    </fieldset>
    <input type="hidden" name="id_categ" id="id_categ" value="<?php echo $id_categ; ?>">
    <button class="offset-md-2 btn btn-primary">Save</button>
</form>

<?php
require_once('footer.php')
?>