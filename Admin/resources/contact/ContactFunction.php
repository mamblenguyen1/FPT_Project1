<?
class ContactFunction{
    function send_contact($name, $email, $content)
    {
        $db = new connect();
        $select = "INSERT INTO contact(name, email, content) VALUES ('$name', '$email', '$content' )";
        $result = $db->pdo_execute($select);
        return $result;
    }
}

?>