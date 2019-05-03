<?php

require_once(dirname(__FILE__).'..\mysql_connection.php');

class UserRepository
{
    public function getPasswordHash(string $username)
    {
        $connection = MySqlConnection::getConnection();

        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        if ($stmt = $connection->prepare($sql)) {
            $stmt->bind_param("s", $param_username);

            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = $username;
            
            $stmt->execute();

            $result = $stmt->get_result();
            $stmt->close();
            
            if($result->num_rows==0){
                return NULL;
            }

            return $result->fetch_object()->password;;
        }
    }
}
?>
