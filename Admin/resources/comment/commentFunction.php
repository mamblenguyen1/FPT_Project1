<?
class comment
{
    var $cmtId   = null;
    var $sachma  = null;
    var $detailCommentId = null;
    var $userid  = null;
    var $content = null;
    var $created_at  = null;

    function addComment($product_id , $user_id, $content)
    {
        $db = new connect();
        $select = " INSERT INTO comment(product_id , is_deleted) 
        VALUES ($product_id, 1);
        SET @product_id = LAST_INSERT_ID();
        INSERT INTO comment_detail (comment_id, user_id, comment_content, is_deleted) 
        VALUES (@product_id, $user_id, '$content' , 1)
        ";
        $result = $db->pdo_execute($select);
        return $result;
    }

    function addCommentDetails($productId, $userid, $content)
    {
        $db = new connect();
        $id = $this->DuplicateColumnCmt($productId);
        $newid = intval($id);
        $select = " INSERT INTO comment_detail(comment_id , user_id , comment_content ,is_deleted) 
        VALUES ($newid ,$userid, '$content' ,1)
        ";
        $result = $db->pdo_execute($select);
        return $result;
    }


    public function DuplicateColumnCmt($product_id)
    {
        $db = new connect();
        $select = "SELECT * FROM comment WHERE product_id  = $product_id ";
        $result = $db->pdo_query($select);
        foreach ($result as $row) {
            return $row['comment_id'];
        }
    }

    function update_cmt($detailCommentId, $content)
    {
        $db = new connect();
        $select = "UPDATE comment_detail SET comment_content = '$content'  WHERE comment_detail_id   = $detailCommentId";
        $result = $db->pdo_execute($select);
        return $result;
    }
    public function DuplicateColumn($product_id)
    {
        $db = new connect();
        $select = "SELECT * FROM comment";
        $result = $db->pdo_query($select);
        foreach ($result as $row) {
            $nw = $row['product_id'];
            if ($product_id == $nw) {
                return true;
            }
        }
    }






    function getInfoComment()
    {
        $db = new connect();
        $sql = "SELECT * FROM comment";
        $result = $db->pdo_query($sql);
        return $result;
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
        $sql = "SELECT MIN(comment_detail.comment_date) AS 'lasted' FROM comment_detail
        WHERE comment_detail.comment_id = $productId
        ";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['lasted'];
        }
    }


    function NewestCmt($productId)
    {
        $db = new connect();
        $sql = "SELECT MAX(comment_detail.comment_date) AS 'newest' FROM comment_detail
        WHERE comment_detail.comment_id = $productId
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

    function existTable($productId)
    {
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

    function CountComment($comment_id)
    {
        $db = new connect();
        $sql = "SELECT COUNT(*) FROM comment, comment_detail where
        comment.comment_id = comment_detail.comment_id
        AND
        comment_detail.comment_id = $comment_id";
        $result   = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['COUNT(*)'];
        }
    }
    function show_comment()
    {
        $db = new connect();
        $sql = "SELECT * FROM products INNER JOIN comment WHERE products.product_id=comment.product_id;";
        $result   = $db->pdo_query($sql);
        return $result;
    }

    function show_Comment_Detail($comment_id)
    {
        $db = new connect();
        $sql = "SELECT * FROM comment_detail, products, comment, user
        WHERE comment_detail.comment_id = comment.comment_id AND
        products.product_id = comment.product_id AND
        user.user_id = comment_detail.user_id AND 
        comment_detail.comment_id = $comment_id";
        $result = $db->pdo_query($sql);
        return $result;
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


