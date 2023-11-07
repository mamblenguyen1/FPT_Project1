<?
class Categories
{
    var $category_id = null;
    var $category_name = null;
    var $created_at = null;
    var $updated_at = null;
    function create_category($category_name)
    {
        $db = new connect();
        $select = "INSERT INTO category(category_name, is_deleted, category_display, urlAdd ) VALUES ('$category_name', 1, '$category_name', 'AccessoryAdd' )";
        $result = $db->pdo_execute($select);
        return $result;
    }
    function update_category($category_name, $userid, $cateid)
    {
        $db = new connect();
        $select = "UPDATE category SET category_name = '$category_name' , user_updated = $userid WHERE category_id = $cateid";
        $result = $db->pdo_execute($select);
        return $result;
    }

    function deleteCate($cateID)
    {
        $db = new connect();
        $sql = "UPDATE category SET is_deleted = 0 WHERE category_id = $cateID";
        $result = $db->pdo_execute($sql);
        return $result;
    }

    function getInfoCate($cateID, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM category WHERE category_id = $cateID";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }
    function getInfoCate2($cateID, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM category
        WHERE 
        category_id = $cateID";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }


    
    function CountProduct($cateId)
    {
        $db = new connect();
        $sql = "SELECT COUNT(product.product_id) FROM category, type , product
        WHERE category.category_id = type.category_id
        AND product.type_id = type.type_id AND category.category_id = $cateId";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['COUNT(product.product_id)'];
        }
    }
    function CountTypeCategories($cateId)
    {
        $db = new connect();
        $sql = "SELECT COUNT(type.type_id) FROM category, type , product
        WHERE category.category_id = type.category_id
        AND product.type_id = type.type_id
        AND category.category_id = $cateId
        ";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['COUNT(type.type_id)'];
        }
    }
    // function getInfoCateAll($column)
    // {
    //     try {
    //         $db = new connect();
    //         $conn = $db->pdo_get_connection();
    //         $stmt = $conn->prepare("SELECT * FROM loaisach");
    //         $stmt->execute();
    //         if($stmt->rowCount()>0){
    //         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //             foreach ($row as $kq){
    //                 echo $kq[$column]; ;
    //             }
    //         }
    //         }
    //     } catch (PDOException $e) {
    //         echo "Connection failed: " . $e->getMessage();
    //     }
    // }





  
}
