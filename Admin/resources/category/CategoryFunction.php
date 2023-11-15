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
}
