<?
class Type
{
    var $type_id  = null;
    var $type_name = null;
    var $created_at = null;
    var $is_deleted = null;
    var $is_show = null;
    var $category_id = null;
    function create_Type($type_name, $category_id,$user_created, $is_show)
    {
        $db = new connect();
        $select = "INSERT INTO `type`(type_name, category_id , is_show ,user_created,is_deleted ) VALUES ('$type_name',$category_id ,$is_show ,$user_created, 1 )";
        $result = $db->pdo_execute($select);
        return $result;
    }
    function update_Type($type_name,$category_id, $is_show, $user_updated, $type_id)
    {
        $db = new connect();
        $select = "UPDATE `type` SET type_name = '$type_name' , category_id = $category_id, is_show = $is_show , user_updated = $user_updated WHERE type_id = $type_id";
        $result = $db->pdo_execute($select);
        return $result;
    }
    function type_select_all()
    {
        $db = new connect();
        $sql = "SELECT * FROM category, `type` WHERE category.category_id=type.category_id AND category.category_id NOT IN (1,2)";
        return $db->pdo_query($sql);
    }
    function deleteCate($type_id)
    {
        $db = new connect();
        $sql = "UPDATE `type` SET is_deleted = 0 WHERE type_id = $type_id";
        $result = $db->pdo_execute($sql);
        return $result;
    }

    function getInfoType($type_id, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM `type`, isshow, category WHERE isshow.show_id= type.is_show 
        AND category.category_id = type.category_id
        AND type_id = $type_id";
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