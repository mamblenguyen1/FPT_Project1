<?php
// Load the database configuration file 
require_once 'dbConfig.php';
require_once './Admin/resources/user/UserFunction.php';
$user = new UserFunction();
// Retrieve JSON from POST body 
$jsonStr = file_get_contents('php://input');
$jsonObj = json_decode($jsonStr);

if (!empty($jsonObj->request_type) && $jsonObj->request_type == 'user_auth') {
    $credential = !empty($jsonObj->credential) ? $jsonObj->credential : '';
    // Decode response payload from JWT token 
    list($header, $payload, $signature) = explode(".", $credential);
    $responsePayload = json_decode(base64_decode($payload));
    // $role = $user->getInfoUserByOauth_uid('role_id', $oauth_uid);
    // $user_id = $user->getInfoUserByOauth_uid('user_id', $oauth_uid);
    if (!empty($responsePayload)) {
        // The user's profile info 
        $oauth_provider = 'google';
        $oauth_uid  = !empty($responsePayload->sub) ? $responsePayload->sub : '';
        $first_name = !empty($responsePayload->given_name) ? $responsePayload->given_name : '';
        $last_name  = !empty($responsePayload->family_name) ? $responsePayload->family_name : '';
        $email      = !empty($responsePayload->email) ? $responsePayload->email : '';
        $picture    = !empty($responsePayload->picture) ? $responsePayload->picture : '';


        // Check whether the user data already exist in the database 
        $query = "SELECT * FROM user WHERE  oauth_uid = '" . $oauth_uid . "'";
        $result = $db->query($query);
        foreach ($result as $ketqua) {
            extract($ketqua);
        }

        if ($result->num_rows > 0) {
            // Update user data if already exists 
            $query = "UPDATE user SET user_name = '$first_name $last_name', email = '" . $email . "' WHERE  oauth_uid = '" . $oauth_uid . "'";
            $update = $db->query($query);
            setcookie("role", $role_id, time() + 3600, "/");
            setcookie("userID", $user_id, time() + 3600, "/");
        } else {
            // Insert user data 
            $query = "INSERT INTO user(user_name, email, oauth_uid, role_id) VALUES ('$user_name','$email',  $oauth_uid, 2)";
            $insert = $db->query($query);
            if ($insert) {
                // Lấy ra user_id vừa được tạo
                $user_id = $db->insert_id;
                echo "User inserted successfully. User ID: $user_id";
            } else {
                echo "Error: " . $db->error;
            }
            setcookie("role", $role_id, time() + 3600, "/");
            setcookie("userID", $user_id, time() + 3600, "/");
        }

        $output = [
            'status' => 1,
            'msg' => 'Account data inserted successfully!',
            'pdata' => $responsePayload
        ];
        echo json_encode($output);
    } else {

        echo json_encode(['error' => 'Account data is not available!']);
    }
}
