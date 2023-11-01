<?
class ProductFunction
{
//truy van hien toan bo sp
    function product_select_all(){
        $db = new connect();
        $sql = "SELECT * FROM product, category, `type` WHERE product.category_id=category.category_id AND category.category_id=type.category_id";
        return $db->pdo_query($sql);
    }
    
//truy van hien toan bo sp
function category_select_all(){
    $db = new connect();
    $sql = "SELECT * FROM category";
    return $db->pdo_query($sql);
}

















    function add_Prod($nameP,$ImgP,$PriP,$CateP,$giam_gia, $dac_biet, $ma_loai)
    {
        $db = new connect();
        $sql = "INSERT INTO sanpham(ten_hh,hinh,don_gia,mo_ta,giam_gia,dac_biet) VALUES ('$nameP','$ImgP',$PriP,$CateP,$giam_gia, '$dac_biet', $ma_loai)";
        return $db->pdo_execute($sql);
    }

    function create_Prod($nameP,$ImgP,$PriP,$DesP,$CateP,$giam_gia, $dac_biet)
    {
        $db = new connect();
        $sql = "INSERT INTO sanpham(ten_hh,hinh,don_gia,mo_ta,ma_loai,giam_gia,dac_biet) VALUES ('$nameP','$ImgP',$PriP,'$DesP',$CateP,$giam_gia, '$dac_biet')";
        return $db->pdo_execute($sql);
    }

    function update_ProD($nameP,$ImgP,$PriP,$DesP,$CateP,$giam_gia, $dac_biet,$IDProD)
    {
        $db = new connect();
        $select = "UPDATE sanpham SET ten_hh  = '$nameP', hinh = '$ImgP',don_gia = $PriP, mo_ta = '$DesP', ma_loai = $CateP, giam_gia = $giam_gia, dac_biet = '$dac_biet' WHERE ma_hh = $IDProD";
        return $db->pdo_execute($select);
    }
    
    function getInfoSP($IDCate, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM hang_hoa,loai WHERE hang_hoa.ma_loai = loai.ma_loai AND hang_hoa.ma_hh = $IDCate";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }

    function sanpham_select_cate_all($IDcate){
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

    function hang_hoa_select_by_id($ma_hh){
        if($ma_hh>0){

        $db = new connect();
        $sql = "SELECT * FROM sanpham WHERE ma_hh=" . $ma_hh;
        $result =  $db->pdo_query_one($sql);
        return $result;
    }else{
        return "";
    }
    }
    function timkiem_select_by_id($ma_hh){
        $db = new connect();
        $sql = "SELECT * FROM sanpham WHERE ma_hh=" . $ma_hh;
        $result =  $db->pdo_query_one($sql);
        return $result;
    }
}
?>