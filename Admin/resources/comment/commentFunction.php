<?
class comment
{
    var $cmtId   = null;
    var $sachma  = null;
    var $detailCommentId = null;
    var $userid  = null;
    var $content = null;
    var $created_at  = null;

    function addComment($sachma, $userid, $content)
    {
        $db = new connect();
        $select = " INSERT INTO comment(sachma) 
        VALUES ($sachma);
        SET @product_id = LAST_INSERT_ID();
        INSERT INTO detailcomments (cmtId, userid, content) 
        VALUES (@product_id, $userid, '$content')
        ";
        $result = $db->pdo_execute($select);
        return $result;
    }

    function addCommentDetails($productId, $userid, $content)
    {
        $db = new connect();
        $id = $this->DuplicateColumnCmt($productId);
        $newid = intval($id);
        $select = " INSERT INTO detailcomments(cmtId, userid, content) 
        VALUES ($newid ,$userid, '$content')
        ";
        $result = $db->pdo_execute($select);
        return $result;
    }

    function getInfoComment()
    {
        $db = new connect();
        $sql = "SELECT * FROM comment";
        $result = $db->pdo_query($sql);
        return $result;
    }

    public function DuplicateColumn($productid)
    {
        $db = new connect();
        $select = "SELECT * FROM comment";
        $result = $db->pdo_query($select);
        foreach ($result as $row) {
            $nw = $row['sachma'];
            if ($productid == $nw) {
                return true;
            }
        }
    }

    public function DuplicateColumnCmt($productId)
    {
        $db = new connect();
        $select = "SELECT * FROM comment WHERE sachma = $productId";
        $result = $db->pdo_query($select);
        foreach ($result as $row) {
            return $row['cmtId'];
        }
    }

    function CountDetails($productId)
    {
        $db = new connect();
        $sql = "SELECT COUNT(detailcomments.cmtId) FROM comment , detailcomments
        WHERE comment.cmtId = detailcomments.cmtId
        AND comment.sachma = $productId";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['COUNT(detailcomments.cmtId)'];
        }
    }

    function LastestCmt($productId)
    {
        $db = new connect();
        $sql = "SELECT MIN(detailcomments.created_at) AS 'lasted' FROM detailcomments
        WHERE detailcomments.cmtId = $productId
        ";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['lasted'];
        }
    }


    function NewestCmt($productId)
    {
        $db = new connect();
        $sql = "SELECT MAX(detailcomments.created_at) AS 'newest' FROM detailcomments
        WHERE detailcomments.cmtId = $productId
        ";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['newest'];
        }
    }

    function getInfoUserCmtAll($productId, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM comment cmt , detailcomments dt WHERE dt.cmtId = cmt.cmtId AND sachma = '$productId'";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }
    function getInfoUserCmt($productId)
    {
        $db = new connect();
        $sql = "SELECT cmtId FROM comment WHERE sachma = '$productId'";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['cmtId'];
        }
    }

    function existTable($productId){
        $db = new connect();
        $select = "SELECT count(comment.cmtId) FROM comment, detailcomments
        WHERE comment.cmtId = detailcomments.cmtId
        AND comment.sachma = $productId";
        $result = $db->pdo_query($select);
        foreach ($result as $row) {
            return $row['count(comment.cmtId)'];
        }
      
    }
    function deleteComment($productID)
    {
        $db = new connect();
        $sql = "DELETE FROM comment WHERE comment.sachma = $productID";
        $result = $db->pdo_execute($sql);
        return $result;
    }
    function deleteCommentDetail($productID)
    {
        $db = new connect();
        $sql = "DELETE FROM detailcomments WHERE detailcomments.detailCommentId = $productID";
        $result = $db->pdo_execute($sql);
        return $result;
    }
    function update_cmt($detailCommentId, $content)
    {
        $db = new connect();
        $select = "UPDATE detailcomments SET content = '$content'  WHERE detailCommentId  = $detailCommentId";
        $result = $db->pdo_execute($select);
        return $result;
    }
    function CountAllCmtDetails()
    {
        $db = new connect();
        $sql = "SELECT COUNT(detailcommentId) FROM detailcomments";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['COUNT(detailcommentId)'];
        }
    }
    function CountAllBook()
    {
        $db = new connect();
        $sql = "SELECT COUNT(sachma) FROM sach";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['COUNT(sachma)'];
        }
    }
    function CountAllCate()
    {
        $db = new connect();
        $sql = "SELECT COUNT(lsma) FROM loaisach";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['COUNT(lsma)'];
        }
    }
    function CountAllCart()
    {
        $db = new connect();
        $sql = "SELECT COUNT(cartId) FROM cart";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['COUNT(cartId)'];
        }
    }
}
// include('../../database/pdo.php');

// $cmt = new comment();
// echo $cmt->DuplicateColumnCmt(26);
// if($cmt->DuplicateColumn(23)){
//     echo 'đúng';
// }else{
//     echo 'sai';

// }


?>

<?
// INSERT INTO comment (sachma) 
// VALUES (24);
// SET @product_id = LAST_INSERT_ID();
// INSERT INTO detailcomments (cmtId, userid, content) 
// VALUES (@product_id, 6, 'Giá trị 1'),
//        (@product_id, 1, 'Giá trị 2');
?>


