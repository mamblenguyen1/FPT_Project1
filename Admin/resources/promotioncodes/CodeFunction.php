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
    function deleteCode($code_id)
    {
        $db = new connect();
        $sql = "UPDATE promotioncodes SET IsActive = 2 WHERE CodeID = $code_id";
        $result = $db->pdo_execute($sql);
        return $result;
    }
    function ExpiryDate($code_id)
    {
        $db = new connect();
        $sql = "UPDATE promotioncodes SET promotioncodes.IsActive = 2 WHERE promotioncodes.CodeID = $code_id
        ";
        $result = $db->pdo_execute($sql);
        return $result;
    }
    

    function updateCode($Code, $Percentage, $ExpiryDate, $Description, $IsActive, $CodeID)
    {
        $db = new connect();
        $select = "UPDATE promotioncodes SET Code = '$Code', Percentage = $Percentage, ExpiryDate = '$ExpiryDate', Description = '$Description', IsActive = $IsActive 
        WHERE CodeID = $CodeID";
        $result = $db->pdo_execute($select);
        return $result;
    }
    
    function getInfoCode($codeID, $column)
    {
        $db = new connect();
        $select = "SELECT * FROM promotioncodes WHERE CodeID = $codeID";
        $result = $db->pdo_query($select);
        foreach ($result as $row) {
            return $row[$column];
        }
    }

    function restoreCode($codeID, $ExpiryDate)
    {
        $db = new connect();
        $sql = "UPDATE `promotioncodes` SET ExpiryDate = '$ExpiryDate', IsActive = 1 WHERE CodeID = $codeID";
        $result = $db->pdo_execute($sql);
        return $result;
    }

    function CountCode()
    {
        $db = new connect();
        $sql = "SELECT COUNT(promotioncodes.CodeID) FROM promotioncodes WHERE IsActive = 1";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['COUNT(promotioncodes.CodeID)'];
        }
    }

    function checkCode($code){
        $db = new connect();
        $sql = "SELECT * FROM promotioncodes WHERE code LIKE '$code'";
        $result = $db->pdo_query_one($sql);
        if ($result != null)
            return true;
        else
            return false;
    }

    function checkExpires($code){
        $db = new connect();
        $sql = "SELECT IsActive FROM promotioncodes WHERE code LIKE '$code'";
        $result = $db ->pdo_query_one($sql);
        extract($result);
        if($IsActive == 1){
            return true;
        }else{
            return false;
        }
    }

    function getCode($code){
        $db = new connect();
        $sql = "SELECT * FROM promotioncodes WHERE `code` LIKE '$code'";
        $result = $db ->pdo_query_one($sql);
        return $result;
    }
//check tồn tại code giảm giá
    public function checkDuplicateCode($Code)
    {
        $db = new connect();
        $select = "SELECT * FROM promotioncodes WHERE LOWER(Code) = '$Code'";
        $result = $db->pdo_query($select);
        return $result;
    }
}
