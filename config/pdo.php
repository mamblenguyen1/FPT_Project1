<? 
    class connect{
        function pdo_get_connection(){
            $dburl = "mysql:host=localhost;dbname=project1;charset=utf8";
            $username = 'mamblenguyen';
            $password = 'Nguoihung123';
            $conn = new PDO($dburl, $username, $password);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $conn;
        }    
        // thêm $this-> trước pdo nếu bị lỗi
        // hàm update , delete , insert
        function pdo_execute($sql){
            $sql_args = array_slice(func_get_args(), 1);
            try{
            $conn = $this->pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
        }
            catch(PDOException $e){
            throw $e;
        }
            finally{
            unset($conn);
        }
        }
        // truy vấn nhiều bảng ghi
        function pdo_query($sql){
            $sql_args = array_slice(func_get_args(), 1);
            try{
            $conn = $this->pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
            $rows = $stmt->fetchAll();
            return $rows;
        }
            catch(PDOException $e){
            throw $e;
        }
            finally{
            unset($conn);
        }
        }   
        // truy vấn 1 bảng ghi
        function pdo_query_one($sql){
            $sql_args = array_slice(func_get_args(), 1);
            try{
            $conn = $this->pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
            }
            catch(PDOException $e){
            throw $e;
            }
            finally{
            unset($conn);
            }
            }
        
        function pdo_query_value($sql){
            $sql_args = array_slice(func_get_args(), 1);
            try{
            $conn = $this->pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return array_values($row)[0];
            }
            catch(PDOException $e){
            throw $e;
            }
            finally{
            unset($conn);
        }
        }    
    }
?>