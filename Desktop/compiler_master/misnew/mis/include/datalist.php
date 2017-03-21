<html>
<body>
<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
//$dbName = 'codexworld';
$dbName = 'cc_db';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
//$searchTerm = $_GET['term'];
//get matched data from skills table
//$query = $db->query("SELECT * FROM cc_users WHERE username LIKE '%".$searchTerm."%' ORDER BY username ASC");
$query = $db->query("SELECT username from cc_users");

?>
<input list="browsers">

<datalist id="browsers">
<?php while ($row = $query->fetch_assoc()) {
    $data = $row['username'];
?>
  <option value="<?php echo $data?>"/>
  <?php } ?>
</datalist>
</body>
</html>