<?php
class UserFunction
{
//thêm
    function user_insert($user_name, $email, $user_phone_number, $user_address, $user_password, $role_id)
    {
        $db = new connect();
        $sql = "INSERT INTO user(user_name, email, user_phone_number, user_address, user_password, role_id) VALUES ('$user_name','$email' , '$user_phone_number', '$user_address', '$user_password', $role_id)";
        $result = $db->pdo_execute($sql);
        return $result;
    }
//sửa
    function user_update($mat_khau, $ho_ten, $mail, $ma_kh)
    {
        $db = new connect();
        $sql = "UPDATE khachhang SET mat_khau='$mat_khau',ho_ten='$ho_ten', mail='$mail' WHERE ma_kh= $ma_kh";
        return $db->pdo_execute($sql);
    }
//xóa
    function user_delete($ma_kh)
    {
        $db = new connect();
        $sql = "DELETE FROM khachhang  WHERE ma_kh=?";
        if (is_array($ma_kh)) {
            foreach ($ma_kh as $ma) {
                return $db->pdo_execute($sql, $ma);
            }
        } else {
            return $db->pdo_execute($sql, $ma_kh);
        }
    }
//hiển thị ra hết
    function user_select_all()
    {
        $db = new connect();
        $sql = "SELECT * FROM user";
        return $db->pdo_query($sql);
    }


    function khach_hang_select_by_id($ma_kh)
    {
        $db = new connect();
        $sql = "SELECT * FROM khachhang WHERE ma_kh=" . $ma_kh;
        $result =  $db->pdo_query_one($sql);
        return $result;
    }

    function khach_hang_exist($ma_kh)
    {
        $db = new connect();
        $sql = "SELECT count(*) FROM khachhang WHERE $ma_kh=?";
        return $db->pdo_query_value($sql, $ma_kh) > 0;
    }

    function khach_hang_select_by_role($vai_tro)
    {
        $db = new connect();
        $sql = "SELECT * FROM khachhang WHERE vai_tro=?";
        return $db->pdo_query($sql, $vai_tro);
    }

    function khach_hang_change_password($ma_kh, $mat_khau_moi)
    {
        $db = new connect();
        $sql = "UPDATE khachhang SET mat_khau=? WHERE ma_kh=?";
        return $db->pdo_execute($sql, $mat_khau_moi, $ma_kh);
    }

    public function checkUser($userAccount, $password)
    {
        $db = new connect();
        $select = "SELECT * FROM khachhang WHERE ho_ten='$userAccount' AND mat_khau='$password'";
        $result = $db->pdo_query_one($select);
        if ($result != null)
            return true;
        else
            return false;
    }
    public function checkRole($userAccount, $password)
    {
        $db = new connect();
        $select = "SELECT khachhang.vai_tro FROM khachhang, vaitro 
        WHERE khachhang.vai_tro = vaitro.vai_tro_id AND ho_ten= '$userAccount' AND mat_khau ='$password'";
        $result = $db->pdo_query_one($select);
        return $result;
    }
    //lay ID
    public function userid($userAccount, $password)
    {
        $db = new connect();
        $select = "SELECT ma_kh FROM khachhang WHERE ho_ten='$userAccount' AND mat_khau='$password'";
        $result = $db->pdo_query_one($select);
        return $result;
    }

    function getInfoUserName($userAccount, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM khachhang WHERE ho_ten ='$userAccount'";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }

    function getInfoUser($userID, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM khachhang WHERE ma_kh = $userID";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }
    //tk trung
    public function checkDuplicateUser($userAccount)
    {
        $db = new connect();
        $select = "SELECT * FROM khachhang";
        $result = $db->pdo_query($select);
        foreach ($result as $row) {
            $nw = $row['ho_ten'];
            if ($userAccount == $nw) {
                return true;
            }
        }
    }

    //dk
    function create_User($userAccount, $userPass, $userEmail)
    {
        $db = new connect();
        $select = "INSERT INTO khachhang(ho_ten ,mat_khau, vai_tro , mail ) VALUES ('$userAccount', '$userPass', 2 , '$userEmail')";
        $result = $db->pdo_execute($select);
        return $result;
    }
    //doimk = sét email
    public function checkDuplicateEmail($userEmail)
    {
        $db = new connect();
        $select = "SELECT * FROM khachhang";
        $result = $db->pdo_query($select);
        foreach ($result as $row) {
            $nw = $row['mail'];
            if ($userEmail == $nw) {
                return true;
            }
        }
    }
//suapass
function update_Pass($userPass , $userID)
    {
        $db = new connect();
        $select = "UPDATE khachhang SET mat_khau = '$userPass' WHERE ma_kh = $userID";
        return $db->pdo_execute($select);
    }

    function getInfoEmail($column)
    {
        $db = new connect();
        $sql = "SELECT * FROM khachhang";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }
    function getIdEmail($Email, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM khachhang WHERE mail like '$Email'";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }
}
// $user = new User();
// echo  $user->create_UserADa(2);
