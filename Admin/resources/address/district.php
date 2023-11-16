<?php
$category_id=0;
if (isset($_GET['province_id'])) $province_id = $_GET['province_id'];
settype($province_id, "int");
$dburl = "mysql:host=localhost;dbname=project1;charset=utf8";
$username = 'root';
$password = 'mysql';
$conn = new PDO($dburl, $username, $password);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$stmt=$conn->prepare("SELECT * FROM  district WHERE province_id =$province_id");    
$stmt->execute();    
$data  = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);
?>