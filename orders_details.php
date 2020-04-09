<?php
session_start();
$title = 'Order Details NeptunoBox';
require_once 'header.php';
require_once 'validateauth.php';

$id_order = null;
$order_date = null;
$cust_name = null;
$cust_lastname = null;
$state_name = null;
$name_usr = null;
$quatity = null;
$prod_name = null;
$total = null;
$observations = null;

if (!empty($_GET['id_order'])){
    $id_order = $_GET['id_order'];

require_once('db/db.php');

$sql = "SELECT distinct * FROM orders o, products p , order_state s, users u, customers c
where o.id_product = p.id_prod 
and s.id_state = o.state_order
and o.create_by = u.id_user
and c.id_cust = o.id_customer;";
$cmd = $db->prepare($sql);
$cmd->bindParam(':id_order', $id_order, PDO::PARAM_INT);

//execute
$cmd->execute();
$order = $cmd->fetch();
//$product = $cmd->fetch();

$order_date = $order['order_date'];
$cust_name = $order['cust_name'];
$cust_lastname = $order['cust_lastname'];
$state_name = $order['state_name'];
$name_usr = $order['name_usr'];
$quatity = $order['quatity'];
$prod_name = $order['prod_name'];
$total = $order['total'];
$observations = $order['observations'];
//disconnect
$db = null;

}
?>

<form method="POST" action="create_order.php">
    <fieldset>
        <label for="order_date" cclass="col-md-2">Order Date:</label>
        <input name="order_date" id="order_date" value="<?php echo $order_date; ?>"/>
    </fieldset>
    <fieldset>
        <label for="cust_name" class="col-md-2">Customer Name:</label>
        <input name="cust_name" id="cust_name" value="<?php echo $cust_name; ?>"/>
    </fieldset>
    <fieldset>
        <label for="cust_lastname" class="col-md-2">Customer Last Name:</label>
        <input name="cust_lastname" id="cust_lastname" value="<?php echo $cust_lastname; ?>"/>
    </fieldset>
    <fieldset>
        <label for="state_name" class="col-md-2">Order State:</label>
        <input name="state_name" id="state_name" value="<?php echo $state_name; ?>"/>
    </fieldset>
    <fieldset>
        <label for="name_usr" class="col-md-2">Created By:</label>
        <input name="name_usr" id="name_usr" value="<?php echo $name_usr; ?>"/>
    </fieldset>
    <fieldset>
        <label for="quatity" class="col-md-2">Quantity:</label>
        <input name="quatity" id="quatity" value="<?php echo $quatity; ?>"/>
    </fieldset>
    <fieldset>
        <label for="prod_name" class="col-md-2">Product Name:</label>
        <input name="prod_name" id="prod_name" value="<?php echo $prod_name; ?>"/>
    </fieldset>
    <fieldset>
        <label for="total" class="col-md-2">Total:</label>
        <input name="total" id="total" value="<?php echo $total; ?>"/>
    </fieldset>
    <fieldset>
        <label for="observations" class="col-md-2">Observations:</label>
        <input name="observations" id="observations" value="<?php echo $observations; ?>"/>
    </fieldset>
    <input type="hidden" name="id_order" id="id_order" value="<?php echo $id_order; ?>">
    <button class="offset-md-2 btn btn-primary">Save</button>
</form>
<?php
require_once('footer.php')
?>


