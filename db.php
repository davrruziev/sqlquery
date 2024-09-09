<?php

class Data
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "test";
    private $db;
    private $tablePrefix;
    private $data = [];

    public function connect()
    {
        $this->db = new mysqli($this->host, $this->user, $this->password, $this->dbname);

        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }

        return true;
    }

    public function getSelect($tableName)
    {
        $this->connect();

        $this->tablePrefix = $tableName;
        $sql = $this->db->query(
            "SELECT id, client_id, date, reg_id, partner_id,
          COUNT(CASE WHEN partner_id = 300 THEN 1 ELSE NULL END) as count_300,
          COUNT(CASE WHEN partner_id = 301 THEN 1 ELSE NULL END) as count_301,
          COUNT(CASE WHEN partner_id = 302 THEN 1 ELSE NULL END) as count_302,
          COUNT(CASE WHEN partner_id = 303 THEN 1 ELSE NULL END) as count_303,
          COUNT(CASE WHEN partner_id = 304 THEN 1 ELSE NULL END) as count_304,
          COUNT(CASE WHEN partner_id = 306 THEN 1 ELSE NULL END) as count_306,
            SUM(price) as total_price, COUNT(*) as total_count 
            FROM $this->tablePrefix
            WHERE partner_id IN (300, 301, 302, 303, 304, 306)
            GROUP BY reg_id"
        );

        return $this->getArray($sql);
    }

    public function getArray($result)
    {
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
}

