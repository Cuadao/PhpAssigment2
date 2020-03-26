<?php
$title = 'Products NeptunoBox';
require_once('header.php');
?>

<?php
require_once('db/db.php');


$sql = "SELECT * FROM categories";
$cmd = $db->prepare($sql);
$cmd->execute();
$categories = $cmd->fetchAll();

echo '<table border="1"><thead><th>Name</th><th>Description</th></thead>';
foreach ($categories as $value) {
    echo '<tr><td>'. $value['categ_name'] . '</td>
                <td>' . $value['categ_desc'] . '</td></tr>';
}

echo '</table>';

$sql = "SELECT distinct * FROM products, categories 
        where id_categ = id_category";
$cmd = $db->prepare($sql);
$cmd->execute();
$products = $cmd->fetchAll();

echo '<table border="1"><thead><th>Name</th><th>Description</th><th>Store Price</th>
        <th>wholesale Price</th><th>Category</th><th>Update</th><th>Delete</th></thead>';
foreach ($products as $value) {
    echo '<tr><td>'. $value['prod_name'] . '</td>
        <td>' . $value['prod_descr'] . '</td>
        <td>' . $value['prod_price1'] . '</td>
        <td>' . $value['prod_price2'] . '</td>
        <td>' . $value['categ_name'] . '</td>
        <td><a class="text-danger" href="update-product.php?id_prod=' . $value['id_prod'] .'"
        onclick=return confirmDelete();"><img src="img/update.png" alt="" aling="center"></img></td>
        <td><a class="text-danger" href="delete-product.php?id_prod=' . $value['id_prod'] .'"
        onclick=return confirmDelete();"><img src="img/delete.png" alt="" aling="center"></img></td>
        </tr>';
}

echo '</table>';

$db = null;

?>

<?php
require_once('footer.php')
?>