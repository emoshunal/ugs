<?php

include $_SERVER['DOCUMENT_ROOT'] . '/ugs/config.php';

require_once ROOT_PATH . '/ugs/Database.php';


class selectDepartment
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function getDepartment()
    {
        $sql = "SELECT * FROM departments";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
