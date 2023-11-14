<?php
class UserFunction
{
    //thêm
    function user_insert($user_name, $email, $user_phone_number, $province , $district , $wards, $Stress ,$user_password, $role_id)
    {
        $db = new connect();
        $sql = "INSERT INTO user(user_name, email, user_phone_number, province_id, district_id , wards_id, user_stress,user_password, role_id, is_deleted) VALUES ('$user_name','$email' , '$user_phone_number', $province , $district, $wards, '$Stress', '$user_password', $role_id, 1)";
        $result = $db->pdo_execute($sql);
        return $result;
    }

    function user_create($user_name, $email, $user_phone_number, $user_password)
    {
        $db = new connect();
        $sql = "INSERT INTO user(user_name, email, user_phone_number, user_password, role_id, is_deleted) VALUES ('$user_name','$email' , '$user_phone_number', '$user_password', 2, 1)";
        $result = $db->pdo_execute($sql);
        return $result;
    }
    //
    function update_user($user_name, $user_password, $user_phone_number, $province, $district,  $wards,  $Stress, $role_id, $user_id)
    {
        $db = new connect();
        $select = "UPDATE `user` SET user_name = '$user_name' , user_password = '$user_password', user_phone_number = '$user_phone_number', province_id = $province, district_id = $district, wards_id = $wards, user_stress = '$Stress', role_id = $role_id  WHERE user_id = $user_id";
        $result = $db->pdo_execute($select);
        return $result;
    }
    //cập nhật tài khoản bên user
    function update_user1($user_name, $user_phone_number, $user_address, $user_id)
    {
        $db = new connect();
        $select = "UPDATE `user` SET user_name = '$user_name' , user_phone_number = '$user_phone_number', user_address = '$user_address'  WHERE user_id = $user_id";
        $result = $db->pdo_execute($select);
        return $result;
    }
    //đổi mật khẩu bên user
    function getInfouser2($user_id, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM `user` WHERE user_id = $user_id";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }

    function getInfoProvince($userID, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM `user`, province WHERE province.province_id = user.province_id AND user_id = $userID";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }
    
    function getInfoDistrict($userID, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM `user`, district WHERE district.district_id  = user.district_id  AND user_id = $userID";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }

    function getInfoWards($userID, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM `user`, wards WHERE wards.wards_id = user.wards_id AND user_id = $userID";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }

    function getInfo($userID, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM `user` WHERE user_id = $userID";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }


    function update_Pass_user($user_password, $user_id)
    {
        $db = new connect();
        $select = "UPDATE `user` SET user_password = '$user_password' WHERE user_id = $user_id ";
        return $db->pdo_execute($select);
    }
    //
    function deleteuser($user_id)
    {
        $db = new connect();
        $sql = "UPDATE `user` SET is_deleted = 2 WHERE user_id = $user_id";
        $result = $db->pdo_execute($sql);
        return $result;
    }
    //
    function getInfouser($user_id, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM user, status WHERE status.status_id= user.is_deleted AND user_id = $user_id";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }
    function update_NewPass($userPass , $userEmail)
    {
        $db = new connect();
        $select = "UPDATE user SET  user_password = '$userPass' WHERE email = '$userEmail'";
        $result = $db->pdo_execute($select);
        return $result;
    }
    //hiện thông tin tài khoản bên user
    function getInfo_user($user_id, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM user WHERE user_id = $user_id";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }
    //hiển thị ra hết
    function user_select_all()
    {
        $db = new connect();
        $sql = "SELECT * FROM user WHERE is_deleted = 1";
        return $db->pdo_query($sql);
    }

    public function checkUser($Email, $password)
    {
        $db = new connect();
        $select = "SELECT * FROM user WHERE email = '$Email' AND user_password = '$password'";
        $result = $db->pdo_query_one($select);
        if ($result != null)
            return true;
        else
            return false;
    }
    public function checkRole($Email, $password)
    {
        $db = new connect();
        $select = "SELECT user.role_id FROM user, `role` 
        WHERE user.role_id = role.role_id AND email = '$Email' AND user_password ='$password'";
        $result = $db->pdo_query_one($select);
        return $result;
    }

    function getInfoUserEmail($Email, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM user WHERE email ='$Email'";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }

    public function checkDuplicateEmail($userEmail)
    {
        $db = new connect();
        $select = "SELECT * FROM user";
        $result = $db->pdo_query($select);
        foreach ($result as $row) {
            $nw = $row['email'];
            if ($userEmail == $nw) {
                return true;
            }
        }
    }



    // CSDL cu~
    function khach_hang_exist($user_id)
    {
        $db = new connect();
        $sql = "SELECT count(*) FROM khachhang WHERE $user_id=?";
        return $db->pdo_query_value($sql, $user_id) > 0;
    }

    function khach_hang_select_by_role($vai_tro)
    {
        $db = new connect();
        $sql = "SELECT * FROM khachhang WHERE vai_tro=?";
        return $db->pdo_query($sql, $vai_tro);
    }

    function khach_hang_change_password($user_id, $mat_khau_moi)
    {
        $db = new connect();
        $sql = "UPDATE khachhang SET mat_khau=? WHERE user_id=?";
        return $db->pdo_execute($sql, $mat_khau_moi, $user_id);
    }

    //lay ID
    public function userid($userAccount, $password)
    {
        $db = new connect();
        $select = "SELECT user_id FROM khachhang WHERE ho_ten='$userAccount' AND mat_khau='$password'";
        $result = $db->pdo_query_one($select);
        return $result;
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

    //suapass
    function update_Pass($userPass, $userID)
    {
        $db = new connect();
        $select = "UPDATE khachhang SET mat_khau = '$userPass' WHERE user_id = $userID";
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
