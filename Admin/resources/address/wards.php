<?php
$category_id=0;
if (isset($_GET['district_id'])) $district_id = $_GET['district_id'];
settype($district_id, "int");
$dburl = "mysql:host=localhost;dbname=project1;charset=utf8";
$username = 'root';
$password = 'mysql';
$conn = new PDO($dburl, $username, $password);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$stmt=$conn->prepare("SELECT * FROM  wards WHERE district_id  =$district_id ");    
$stmt->execute();    
$data  = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);
?>