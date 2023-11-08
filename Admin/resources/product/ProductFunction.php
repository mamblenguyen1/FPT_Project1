<?
class ProductFunction
{
    //truy van hien toan bo sp
    // function product_select_all()
    // {
    //     $db = new connect();
    //     $sql = "SELECT * FROM product, category, `type` WHERE product.category_id=category.category_id AND category.category_id=type.category_id";
    //     return $db->pdo_query($sql);
    // }

    function all_product_category($category_id, $product_id, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM products, type, category WHERE
        type.type_id = products.type_id
        AND 
        category.category_id = products.category_id
        AND
        products.is_deleted = 1 
        AND
        products.category_id = $category_id
        AND
        products.product_id = $product_id
        ";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }
    //truy van hien toan bo sp
    function category_select_all()
    {
        $db = new connect();
        $sql = "SELECT * FROM category";
        return $db->pdo_query($sql);
    }
    function wireless_select_all()
    {
        $db = new connect();
        $sql = "SELECT * FROM iswireless";
        return $db->pdo_query($sql);
    }

    function category_type_select_all()
    {
        $db = new connect();
        $sql = "SELECT * FROM category";
        return $db->pdo_query($sql);
    }

    function category_type_con_select_all($typecon)
    {
        $db = new connect();
        $sql = "SELECT * FROM  type WHERE category_id=$typecon AND is_deleted = 1";
        return $db->pdo_query($sql);
    }

    function add_product($product_name, $product_price, $product_sale, $product_img, $product_quantily, $category_id, $type_id,$product_short_description ,$product_description, $user_created)
    {
        $db = new connect();
        $sql = "INSERT INTO 
        products(product_name,product_img, product_price, product_sale,product_quantily, category_id, type_id ,product_short_description ,product_description, user_created, is_deleted )
        VALUES
        ('$product_name','$product_img' , $product_price, $product_sale, $product_quantily, $category_id , $type_id,'$product_short_description' ,'$product_description', $user_created,1  )";
        return $db->pdo_execute($sql);
    }







    function Edit_Product($product_name, $product_price, $product_sale, $product_img, $product_quantily, $category_id, $type_id,$product_short_description ,$product_description, $user_updated, $Product_ID)
    {
        $db = new connect();
        $select = "UPDATE products SET product_name  = '$product_name', product_price = $product_price, product_sale = $product_sale, product_img = '$product_img',  product_short_description = '$product_short_description', product_description = '$product_description', product_quantily = '$product_quantily', category_id = $category_id, type_id = $type_id, user_updated = $user_updated , updated_at = CURRENT_TIMESTAMP 
        WHERE product_id = $Product_ID";
        return $db->pdo_execute($select);
    }



    function deleteProduct($product_id)
    {
        $db = new connect();
        $sql = "UPDATE products SET is_deleted = 0 WHERE product_id = $product_id";
        $result = $db->pdo_execute($sql);
        return $result;
    }





    function getInfoSP($category_id, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM category , product WHERE category.category_id = product.category_id AND
        category.category_id = $category_id";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }
    function getInfoSP1($product_id, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM category, products , type
        WHERE
        category.category_id = products.category_id
        AND
        products.type_id = type.type_id
        AND products.product_id = $product_id
        ";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }



    function getCateName($product_id, $column)
    {
        $db = new connect();
        $sql = "SELECT  * FROM product , category
        WHERE product.category_id = category.category_id
        AND product.product_id = $product_id       
        ";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }
  



  

    function create_Prod($nameP, $ImgP, $PriP, $DesP, $CateP, $giam_gia, $dac_biet)
    {
        $db = new connect();
        $sql = "INSERT INTO sanpham(ten_hh,hinh,don_gia,mo_ta,ma_loai,giam_gia,dac_biet) VALUES ('$nameP','$ImgP',$PriP,'$DesP',$CateP,$giam_gia, '$dac_biet')";
        return $db->pdo_execute($sql);
    }

    function update_ProD($nameP, $ImgP, $PriP, $DesP, $CateP, $giam_gia, $dac_biet, $IDProD)
    {
        $db = new connect();
        $select = "UPDATE sanpham SET ten_hh  = '$nameP', hinh = '$ImgP',don_gia = $PriP, mo_ta = '$DesP', ma_loai = $CateP, giam_gia = $giam_gia, dac_biet = '$dac_biet' WHERE ma_hh = $IDProD";
        return $db->pdo_execute($select);
    }


    function sanpham_select_cate_all($IDcate)
    {
        $db = new connect();
        $sql = "SELECT * FROM sanpham INNER JOIN danhmuc ON danhmuc.ma_loai=sanpham.ma_loai WHERE sanpham.ma_loai = $IDcate";
        return $db->pdo_query($sql);
    }
    function get_dssp_new($limi)
    {
        $db = new connect();
        $sql = "SELECT * FROM sanpham ORDER BY ma_hh DESC limit " . $limi;
        return $db->pdo_query($sql);
    }
    function get_dssp_best($limi)
    {
        $db = new connect();
        $sql = "SELECT * FROM sanpham WHERE bestseller=1 ORDER BY ma_hh DESC limit " . $limi;
        return $db->pdo_query($sql);
    }
    function get_dssp_view($limi)
    {
        $db = new connect();
        $sql = "SELECT * FROM sanpham ORDER BY view DESC limit " . $limi;
        return $db->pdo_query($sql);
    }

    function get_dssp($ma_loai, $limi)
    {
        $db = new connect();
        $sql = "SELECT * FROM sanpham WHERE 1";
        if ($ma_loai > 0) {
            $sql .= " AND ma_loai=" . $ma_loai;
        }
        $sql .= " ORDER BY id DESC limit " . $limi;
        return $db->pdo_query($sql);
    }

    function hang_hoa_select_by_id($ma_hh)
    {
        if ($ma_hh > 0) {

            $db = new connect();
            $sql = "SELECT * FROM sanpham WHERE ma_hh=" . $ma_hh;
            $result =  $db->pdo_query_one($sql);
            return $result;
        } else {
            return "";
        }
    }
    function timkiem_select_by_id($ma_hh)
    {
        $db = new connect();
        $sql = "SELECT * FROM sanpham WHERE ma_hh=" . $ma_hh;
        $result =  $db->pdo_query_one($sql);
        return $result;
    }

    function substringtext($text, $maxLength)
    {
        if (strlen($text) > $maxLength) {
            $shortenedText = substr($text, 0, $maxLength) . '...';
        } else {
            $shortenedText = $text;
        }

        return $shortenedText;
    }
}
