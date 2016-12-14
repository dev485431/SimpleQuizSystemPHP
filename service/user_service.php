<?php

class UserService
{
    const SQL_SELECT_USER_BY_USERNAME = "SELECT * FROM users WHERE username=?";
    const SQL_INSERT_USER = 'INSERT INTO users (userId, username, password, role) VALUES (null,?,?,?)';
    private $mysqli;

    public function __construct()
    {
        $this->mysqli = Db::getConnection();
    }

    function __destruct()
    {
        $this->mysqli->close();
    }

    public function addUser(User $user)
    {
        $affectedRows = 0;
        if ($stmt = $this->mysqli->prepare(self::SQL_INSERT_USER)) {
            $stmt->bind_param("sss", $user->getUsername(), $user->getPassword(), $user->getRole());
            $stmt->execute();
            $affectedRows = $this->mysqli->affected_rows;
            $stmt->close();
        }
        return ($affectedRows === 0) ? false : true;
    }

    public function usernameExists($username)
    {
        $numRows = 0;
        if ($stmt = $this->mysqli->prepare(self::SQL_SELECT_USER_BY_USERNAME)) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $numRows = $stmt->num_rows;
            $stmt->close();
        }
        return ($numRows === 0) ? false : true;
    }
}