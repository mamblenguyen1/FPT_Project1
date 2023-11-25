<?
class Type
{
    var $type_id  = null;
    var $type_name = null;
    var $created_at = null;
    var $is_deleted = null;
    var $category_id = null;
    function create_Type($type_name, $category_id, $user_created)
    {
        $db = new connect();
        $select = "INSERT INTO `type`(type_name, category_id,user_created,is_deleted ) VALUES ('$type_name',$category_id ,$user_created, 1 )";
        $result = $db->pdo_execute($select);
        return $result;
    }
    function update_Type($type_name, $category_id, $user_updated, $type_id)
    {
        $db = new connect();
        $select = "UPDATE `type` SET type_name = '$type_name' , category_id = $category_id, user_updated = $user_updated WHERE type_id = $type_id";
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
        $sql = "UPDATE `type` SET is_deleted = 2 WHERE type_id = $type_id";
        $result = $db->pdo_execute($sql);
        return $result;
    }

    function getInfoType($type_id, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM `type`, category 
        WHERE category.category_id = type.category_id
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
    function CountProduct_type($type_id)
    {
        $db = new connect();
        $sql = "SELECT COUNT(*) FROM products WHERE type_id = $type_id AND is_deleted = 1";
        $result   = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['COUNT(*)'];
        }
    }
    function Counttype()
    {
        $db = new connect();
        $sql = "SELECT COUNT(type.type_id) FROM type WHERE is_deleted = 1";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['COUNT(type.type_id)'];
        }
    }
//khôi phục
    function RestoreType($typeID)
    {
        $db = new connect();
        $sql = "UPDATE type SET is_deleted = 1 WHERE type_id = $typeID";
        $result = $db->pdo_execute($sql);
        return $result;
    }
    //xóa vĩnh viễn tài khoản ẩn
    function permanently_deleted_type($type_id)
    {
        $db = new connect();
        $sql = "DELETE FROM type WHERE type_id = $type_id";
        $result = $db->pdo_execute($sql);
        return $result;
    }
    // check tên tồn tại
    public function checkDuplicateType($Type)
    {
        $db = new connect();
        $select = "SELECT * FROM type WHERE LOWER(type_name) = '$Type'";
        $result = $db->pdo_query($select);
        return $result;
    }
}
