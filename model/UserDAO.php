<?php
class UserDAO {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function authenticate($username, $passwd) {
        $user=NULL;
        $connection=$this->getConnection();
        $stmt = $connection->prepare("SELECT * FROM users WHERE username = ? AND passwd = ?");
        $stmt->bind_param("ss", $username, $passwd);
        $stmt->execute(); 
        $result=$stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['passwd'])) {
            return $user;
        }
        return null;
    }
}
?>