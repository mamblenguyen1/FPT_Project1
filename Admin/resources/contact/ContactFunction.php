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
        $select = "SELECT * FROM contact WHERE is_deleted=1";
        $result = $db->pdo_query($select);
        return $result;
    }

    function show_contact_detail($contact_id){
        $db = new connect();
        $select = "SELECT * FROM contact WHERE contact_id = $contact_id";
        $result = $db->pdo_query_one($select);
        return $result;
    }
}

?>