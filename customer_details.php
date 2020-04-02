<?php
$title = 'Customer Details NeptunoBox';
require_once('header.php');
?>

<form method="POST" action="create_customer.php">
    <fieldset>
        <label for="cust_name" cclass="col-md-2">Customer Name</label>
        <input name="cust_name" id="name" />
    </fieldset>
    <fieldset>
        <label for="cust_lastname" class="col-md-2">Customer lastname</label>
        <input name="cust_lastname" id="cust_lastname" />
    </fieldset>
    <fieldset>
        <label for="cust_address" class="col-md-2">Address</label>
        <input name="cust_address" id="cust_address" />
    </fieldset>
    <fieldset>
        <label for="cust_cellphone" class="col-md-2">Cellphone</label>
        <input name="cust_cellphone" id="cust_cellphone" />
    </fieldset>
    <fieldset>
        <label for="cust_email" class="col-md-2">Email</label>
        <input name="cust_email" id="cust_email" />
    </fieldset>
    <fieldset>
        <label for="cust_city" class="col-md-2">City</label>
        <input name="cust_city" id="cust_city" />
    </fieldset>
    <fieldset>
        <label for="date_birth" class="col-md-2">Date Birth</label>
        <input name="date_birth" id="date_birth" />
    </fieldset>
    <input type="hidden" name="id_cust" id="id_cust" value=>
    <button class="offset-md-2 btn btn-primary">Save</button>
</form>
<?php
require_once('footer.php')
?>
