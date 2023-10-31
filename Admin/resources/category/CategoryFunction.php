<?
class Categories
{
    var $category_id = null;
    var $category_name = null;
    var $created_at = null;
    var $updated_at = null;
    var $is_show = null;
    function create_category($category_name, $is_show )
    {
        $db = new connect();
        $select = "INSERT INTO category(category_name, is_show,is_deleted ) VALUES ('$category_name' ,$is_show , 1 )";
        $result = $db->pdo_execute($select);
        return $result;
    }
    function update_category($category_name, $categories_cnt, $cateID)
    {
        $db = new connect();
        $select = "UPDATE loaisach SET lsten = '$category_name' , lsthongtin = '$categories_cnt' WHERE lsma  = $cateID";
        $result = $db->pdo_execute($select);
        return $result;
    }
    function getInfoCate($cateID, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM loaisach WHERE lsma = $cateID";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }
    function getInfoCate2($cateID, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM sach s, loaisach ls 
        WHERE s.sachmaloai =ls.lsma AND
        s.sachma = $cateID";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }


    function deleteCate($cateID)
    {
        $db = new connect();
        $sql = "DELETE FROM loaisach WHERE lsma = $cateID";
        $result = $db->pdo_execute($sql);
        return $result;
    }
    function CountCategories()
    {
        $db = new connect();
        $sql = "SELECT COUNT(lsma) FROM loaisach";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['COUNT(lsma)'];
        }
    }
    function getInfoCateAll($column)
    {
        try {
            $db = new connect();
            $conn = $db->pdo_get_connection();
            $stmt = $conn->prepare("SELECT * FROM loaisach");
            $stmt->execute();
            if($stmt->rowCount()>0){
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                foreach ($row as $kq){
                    echo $kq[$column]; ;
                }
            }
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }





  
}

?>