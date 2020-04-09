<?php
session_start();
$title = 'Customer Details NeptunoBox';
require_once 'header.php';
require_once 'validateauth.php';

$id_cust = null;
$cust_name = null;
$cust_lastname = null;
$cust_address = null;
$cust_cellphone = null;
$cust_email = null;
$cust_city = null;
$date_birth = null;

if (!empty($_GET['id_cust'])){
    $id_cust = $_GET['id_cust'];

require_once('db/db.php');

$sql = "SELECT * FROM customers WHERE id_cust = $id_cust";
$cmd = $db->prepare($sql);
$cmd->bindParam(':id_cust', $id_cust, PDO::PARAM_INT);

//execute
$cmd->execute();
$customer = $cmd->fetch();
//$customer = $cmd->fetch();

$cust_name = $customer['cust_name'];
$cust_lastname = $customer['cust_lastname'];
$cust_address = $customer['cust_address'];
$cust_cellphone = $customer['cust_cellphone'];
$cust_email = $customer['cust_email'];
$cust_city = $customer['cust_city'];
$date_birth = $customer['date_birth'];

//disconnect
$db = null;

}
?>

<form method="POST" action="create_customer.php">
    <fieldset>
        <label for="cust_name" cclass="col-md-2">Customer Name</label>
        <input name="cust_name" id="cust_name" value="<?php echo $cust_name; ?>"/>
    </fieldset>
    <fieldset>
        <label for="cust_lastname" class="col-md-2">Customer lastname</label>
        <input name="cust_lastname" id="cust_lastname" value="<?php echo $cust_lastname; ?>"/>
    </fieldset>
    <fieldset>
        <label for="cust_address" class="col-md-2">Address</label>
        <input name="cust_address" id="cust_address" value="<?php echo $cust_address; ?>"/>
    </fieldset>
    <fieldset>
        <label for="cust_cellphone" class="col-md-2">Cellphone</label>
        <input name="cust_cellphone" id="cust_cellphone" value="<?php echo $cust_cellphone; ?>"/>
    </fieldset>
    <fieldset>
        <label for="cust_email" class="col-md-2">Email</label>
        <input name="cust_email" id="cust_email" value="<?php echo $cust_email; ?>"/>
    </fieldset>
    <fieldset>
        <label for="cust_city" class="col-md-2">City</label>
        <input name="cust_city" id="cust_city" value="<?php echo $cust_city; ?>"/>
    </fieldset>
    <fieldset>
        <label for="date_birth" class="col-md-2">Date Birth</label>
        <input name="date_birth" id="date_birth" value="<?php echo $date_birth; ?>"/>
    </fieldset>
    <input type="hidden" name="id_cust" id="id_cust" value=>
    <button class="offset-md-2 btn btn-primary">Save</button>
</form>
<?php
require_once('footer.php')
?>
