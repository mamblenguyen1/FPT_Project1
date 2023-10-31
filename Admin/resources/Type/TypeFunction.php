<?
class Type
{
    var $type_id  = null;
    var $type_name = null;
    var $created_at = null;
    var $is_deleted = null;
    var $is_show = null;
    var $category_id = null;
    function create_Type($type_name, $is_show )
    {
        $db = new connect();
        $select = "INSERT INTO `type`(type_name, is_show,is_deleted ) VALUES ('$type_name' ,$is_show , 1 )";
        $result = $db->pdo_execute($select);
        return $result;
    }
    function update_category($category_name, $is_show, $userid, $cateid)
    {
        $db = new connect();
        $select = "UPDATE category SET category_name = '$category_name' , is_show = $is_show , user_updated = $userid WHERE category_id = $cateid";
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
        $sql = "SELECT * FROM category, isshow WHERE isshow.show_id= category.is_show AND category_id = $cateID";
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


    
    function CountProduct($cateId)
    {
        $db = new connect();
        $sql = "SELECT COUNT(product.product_id) FROM category, type , product
        WHERE category.category_id = type.category_id
        AND product.type_id = type.type_id 
        AND type.type_id = $cateId";
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




  
}

?>