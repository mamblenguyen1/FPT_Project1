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
    
}
