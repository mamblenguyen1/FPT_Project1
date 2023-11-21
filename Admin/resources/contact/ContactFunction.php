<?
class ContactFunction{
    function send_contact($name, $email, $subject, $content)
    {
        $db = new connect();
        $select = "INSERT INTO contact(name, email, subject, content) VALUES ('$name', '$email','$subject', '$content' )";
        $result = $db->pdo_execute($select);
        return $result;
    }

    function show_all_contact(){
        $db = new connect();
        $select = "SELECT * FROM contact WHERE is_deleted=1 Order by date desc";
        $result = $db->pdo_query($select);
        return $result;
    }

    function show_all_spam_contact(){
        $db = new connect();
        $select = "SELECT * FROM contact WHERE is_deleted=0 Order by date desc";
        $result = $db->pdo_query($select);
        return $result;
    }

    function show_contact_detail($contact_id){
        $db = new connect();
        $select = "SELECT * FROM contact WHERE contact_id = $contact_id";
        $result = $db->pdo_query_one($select);
        return $result;
    }

    function restore_contact($contact_id){
        $db = new connect();
        $select = "UPDATE contact SET is_deleted = 1 WHERE contact_id = $contact_id";
        $result = $db->pdo_execute($select);
        return $result;
    }

    function hide_contact($contact_id){
        $db = new connect();
        $select = "UPDATE contact SET is_deleted = 0 WHERE contact_id = $contact_id";
        $result = $db->pdo_execute($select);
        return $result;
    }

    function delete_contact($contact_id){
        $db = new connect();
        $select = "DELETE FROM contact WHERE contact_id = $contact_id";
        $result = $db->pdo_execute($select);
        return $result;
    }
}

?>