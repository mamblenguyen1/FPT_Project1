
<?php
$category_id=0;
if (isset($_GET['category_id'])) $category_id = $_GET['category_id'];
settype($category_id, "int");
$dburl = "mysql:host=localhost;dbname=project1;charset=utf8";
$username = 'root';
$password = 'mysql';
$conn = new PDO($dburl, $username, $password);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$stmt=$conn->prepare("SELECT * FROM  type WHERE category_id=$category_id AND is_deleted = 1");    
$stmt->execute();    
$data  = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);
?>