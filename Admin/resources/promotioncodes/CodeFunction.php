<?
class Promotioncode
{
    var $CodeID  = null;
    var $Code = null;
    var $Percentage = null;
    var $ExpiryDate = null;
    var $Description = null;
    var $IsActive  = null;

    function create_code($Code, $Percentage , $ExpiryDate, $Description ,$IsActive)
    {
        $db = new connect();
        $select = "INSERT INTO `promotioncodes` (`CodeID`, `Code`, `Percentage`, `ExpiryDate`, `Description`, `IsActive`, `created_at`, `updated_at`) 
        VALUES (NULL, '$Code', $Percentage, '$ExpiryDate', '$Description', $IsActive, NULL, NULL);";
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
    //khôi phục
    function RestoreCate($cateID)
    {
        $db = new connect();
        $sql = "UPDATE category SET is_deleted = 1 WHERE category_id = $cateID";
        $result = $db->pdo_execute($sql);
        return $result;
    }
    //xóa vĩnh viễn
    function Permanentlydelete($cateID)
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
    function CountProduct($category_id)
    {
        $db = new connect();
        $sql = "SELECT COUNT(*) FROM products WHERE category_id = $category_id AND is_deleted = 1";
        $result   = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['COUNT(*)'];
        }
    }
    function CountType($category_id)
    {
        $db = new connect();
        $sql = "SELECT COUNT(*) FROM type WHERE category_id = $category_id AND is_deleted = 1";
        $result   = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['COUNT(*)'];
        }
    }
    function Countcategory()
    {
        $db = new connect();
        $sql = "SELECT COUNT(category.category_id) FROM category ";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['COUNT(category.category_id)'];
        }
    }
//tổng danh mục không có ẩn
    function Countcategory1()
    {
        $db = new connect();
        $sql = "SELECT COUNT(category.category_id) FROM category WHERE is_deleted = 1";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['COUNT(category.category_id)'];
        }
    }
        //xóa vĩnh viễn danh mục ẩn
        function permanently_deleted_cate($category_id)
        {
            $db = new connect();
            $sql = "DELETE FROM category WHERE category_id = $category_id";
            $result = $db->pdo_execute($sql);
            return $result;
        }
}
