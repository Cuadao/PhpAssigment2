<?php
session_start();
$title = 'Customers NeptunoBox';
require_once 'header.php';
require_once 'validateauth.php';
?>
<h1>Customers</h1>
<?php
require_once('db/db.php');
$sql = "SELECT * FROM customers";
$cmd = $db->prepare($sql);
$cmd->execute();
$customers = $cmd->fetchAll();

echo '<table class="table"><thead><th>Name</th><th>Last Name</th><th>Address</th><th>Cellphone</th>
                               <th>Email</th><th>City</th><th>Date Birth</th><th>Update</th></thead>';
foreach ($customers as $value) {
    echo '<tr><td>'. $value['cust_name'] . '</td>
              <td>' . $value['cust_lastname'] . '</td>
              <td>' . $value['cust_address'] . '</td>
              <td>' . $value['cust_cellphone'] . '</td>
              <td>' . $value['cust_email'] . '</td>
              <td>' . $value['cust_city'] . '</td>
              <td>' . $value['date_birth'] . '</td>
              <td><a href="customer_details.php?id_cust=' . $value['id_cust'] . '">
        <img src="img/update.png" alt="" aling="center"></img></td>
              </tr>';
}

echo '</table>';

$db = null;
?>
<a href="customer_details.php">Create Customer</a>
<?php
require_once('footer.php')
?>