<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
//$dbName = 'codexworld';
$dbName = 'cc_db';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $db->query("SELECT * FROM cc_users WHERE username LIKE '%".$searchTerm."%' ORDER BY username ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['username'];
}
//return json data
echo json_encode($data);
?>