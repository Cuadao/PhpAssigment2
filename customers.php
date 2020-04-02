<?php
$title = 'Customers NeptunoBox';
require_once('header.php');
?>

<?php
require_once('db/db.php');


$sql = "SELECT * FROM customers";
$cmd = $db->prepare($sql);
$cmd->execute();
$customers = $cmd->fetchAll();

echo '<table border="1"><thead><th>Name</th><th>Last Name</th><th>Address</th><th>Cellphone</th>
                               <th>Email</th><th>City</th><th>Date Birth</th></thead>';
foreach ($customers as $value) {
    echo '<tr><td>'. $value['cust_name'] . '</td>
              <td>' . $value['cust_lastname'] . '</td>
              <td>' . $value['cust_address'] . '</td>
              <td>' . $value['cust_cellphone'] . '</td>
              <td>' . $value['cust_email'] . '</td>
              <td>' . $value['cust_city'] . '</td>
              <td>' . $value['date_birth'] . '</td>

              </tr>';
}

echo '</table>';

$db = null;
?>
<a href="customer_details.php">Create Customer</a>
<?php
require_once('footer.php')
?>