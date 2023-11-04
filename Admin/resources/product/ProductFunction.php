<?
class ProductFunction
{
    //truy van hien toan bo sp
    function product_select_all()
    {
        $db = new connect();
        $sql = "SELECT * FROM product, category, `type` WHERE product.category_id=category.category_id AND category.category_id=type.category_id";
        return $db->pdo_query($sql);
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
        $sql = "SELECT * FROM  type WHERE category_id=$typecon";
        return $db->pdo_query($sql);
    }

    function add_phone($product_name, $product_title, $product_price, $product_sale, $product_img, $product_quantily, $category_id, $type_id, $phone_ram, $phone_screen, $phone_backcam, $phone_frontcam, $phone_chip, $phone_storge, $user_created)
    {
        $db = new connect();
        $sql = "INSERT INTO 
        phone(product_name , product_title,product_img, product_price, product_sale,product_quantily, category_id, type_id , product_ram, product_screen, product_backcam, product_frontcam, product_chip, product_storge, user_created, is_deleted, is_wireless, product_url )
        VALUES
        ('$product_name', '$product_title','$product_img' , $product_price, $product_sale, $product_quantily, $category_id , $type_id, '$phone_ram', '$phone_screen', '$phone_backcam', '$phone_frontcam', '$phone_chip', '$phone_storge', $user_created,1 , 3 , 'PhoneDetail' )";
        return $db->pdo_execute($sql);
    }

    function add_laptop($product_name, $product_title, $product_price, $product_sale, $product_img, $product_quantily, $category_id, $type_id, $product_screen, $product_graphic, $product_CPU, $product_storge, $product_ram, $user_created)
    {
        $db = new connect();
        $sql = "INSERT INTO 
        laptop(product_name , product_title,product_img, product_price, product_sale,product_quantily, category_id, type_id , product_screen, product_graphic, product_CPU, product_storge, product_ram, user_created, is_deleted ,is_wireless,product_url)
        VALUES
        ('$product_name', '$product_title','$product_img' , $product_price, $product_sale, $product_quantily, $category_id , $type_id, '$product_screen', '$product_graphic', '$product_CPU', '$product_storge', '$product_ram', $user_created,1 , 3 , 'LaptopDetail')";
        return $db->pdo_execute($sql);
    }

    function add_Wired($product_name, $product_title, $product_price, $product_sale, $product_img, $product_quantily,  $type_id, $product_length, $product_port, $product_weight, $product_included,  $user_created)
    {
        $db = new connect();
        $sql = "INSERT INTO  wired(product_name , product_title,product_img, product_price, product_sale,product_quantity, category_id, type_id , product_length, product_port, product_weight, product_included, user_created, is_deleted ,is_wireless,product_url)
        VALUES
        ('$product_name', '$product_title','$product_img' , $product_price, $product_sale, $product_quantily, 3 , $type_id, '$product_length', '$product_port', '$product_weight', '$product_included',  $user_created,1 , 1 , 'WiredDetail')";
        return $db->pdo_execute($sql);
    }
    function add_Wireless($product_name, $product_title, $product_price, $product_sale, $product_img, $product_quantily,  $type_id, $product_range, $product_port, $product_weight, $product_included,  $product_capacity  , $product_charge_time, $product_use_time ,$user_created)
    {
        $db = new connect();
        $sql = "INSERT INTO  wired(product_name , product_title,product_img, product_price, product_sale,product_quantity, category_id, type_id , product_range, product_port, product_weight, product_included, product_capacity  ,product_charge_time,product_use_time ,user_created, is_deleted ,is_wireless,product_url)
        VALUES
        ('$product_name', '$product_title','$product_img' , $product_price, $product_sale, $product_quantily, 3 , $type_id, '$product_range', '$product_port', '$product_weight', '$product_included', $product_capacity  ,$product_charge_time,$product_use_time , $user_created,1 , 2 , 'WirelessDetail')";
        return $db->pdo_execute($sql);
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
    function getInfoSP1($category_id, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM category WHERE
        category.category_id = $category_id
        ";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }
    function getInfoWireless($category_id, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM category , product WHERE category.category_id = product.category_id AND
        category.category_id = $category_id";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }

    function getIsWired($product_id, $column)
    {
        $db = new connect();
        $sql = "SELECT is_wireless, type.type_name as 'typename' , category.category_name as 'catename' , wired.product_url as 'url' FROM wired , `type` , category
        WHERE category.category_id = wired.category_id
        AND type.type_id = wired.type_id
        AND wired.product_id = $product_id
        ";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }
    function getIsWireLess($product_id, $column)
    {
        $db = new connect();
        $sql = "SELECT is_wireless, type.type_name as 'typename', category.category_name as 'catename' , wireless.product_url as 'url' FROM wireless , `type` , category
        WHERE category.category_id = wireless.category_id
        AND type.type_id = wireless.type_id
        AND wireless.product_id = $product_id";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }


    function getTypeNamePhone($product_id, $column)
    {
        $db = new connect();
        $sql = "SELECT type.type_name , category.category_name , phone.product_url as 'url'
        FROM type, category, phone
        WHERE type.type_id = phone.type_id
        AND category.category_id = phone.category_id
        AND phone.product_id = $product_id
        ";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }
    function getTypeNameLaptop($product_id, $column)
    {
        $db = new connect();
        $sql = "SELECT type.type_name , category.category_name , product_url as 'url'
        FROM type, category, laptop
        WHERE type.type_id = laptop.type_id
        AND category.category_id = laptop.category_id
        AND laptop.product_id = $product_id
        ";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }
    function getTypeNameWired($product_id, $column)
    {
        $db = new connect();
        $sql = "SELECT type.type_name , category.category_name 
        FROM type, category, wired
        WHERE type.type_id = wired.type_id
        AND category.category_id = wired.category_id
        AND wired.product_id = $product_id
        ";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }
    function getTypeNameWireless($product_id, $column)
    {
        $db = new connect();
        $sql = "SELECT type.type_name , category.category_name 
        FROM type, category, wireless
        WHERE type.type_id = wireless.type_id
        AND category.category_id = wireless.category_id
        AND wireless.product_id = $product_id
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
    function deletePhone($product_id)
    {
        $db = new connect();
        $sql = "UPDATE phone SET is_deleted = 0 WHERE product_id = $product_id";
        $result = $db->pdo_execute($sql);
        return $result;
    }
    function deleteLaptop($product_id)
    {
        $db = new connect();
        $sql = "UPDATE laptop SET is_deleted = 0 WHERE product_id = $product_id";
        $result = $db->pdo_execute($sql);
        return $result;
    }
    function deleteWired($product_id)
    {
        $db = new connect();
        $sql = "UPDATE wired SET is_deleted = 0 WHERE product_id = $product_id";
        $result = $db->pdo_execute($sql);
        return $result;
    }
    function deleteWireless($product_id)
    {
        $db = new connect();
        $sql = "UPDATE wireless SET is_deleted = 0 WHERE product_id = $product_id";
        $result = $db->pdo_execute($sql);
        return $result;
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
}
