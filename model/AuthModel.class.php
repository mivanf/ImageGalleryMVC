<?php
class AuthModel extends Model
{
    public function getUserByUsername($username)
    {
        $sql = "SELECT * FROM `users` WHERE username = '$username'";
        $result = $this->mysqli->query($sql);
        return $result->fetch_object();
    }

    public function registerUser($username, $password)
    {
        $sql = "INSERT INTO `users` (username, password) VALUES ('$username', '$password')";
        return $this->mysqli->query($sql);
    }
}