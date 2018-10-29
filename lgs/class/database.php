<?php
class database
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $Database = "00167501_ashishshrestha";

    private $connect;

    public function __construct()
    {
        $this->connect = new mysqli($this->host, $this->user, $this->password, $this->Database);
        if ($this->connect->connect_error) {
            die("database not found:" . $this->connect->connect_error);
        }
    }

    public function CUD($sql)
    {
        $this->connect->query($sql);
    }


    public function checkRows($sql)
    {
        $resultSet = $this->connect->query($sql);
        $rows = $resultSet->num_rows;
        if ($rows > 0) {
            return $rows;

        } else {
            return false;
        }
    }

    public function select($sql)
    {
        $data = [];
        $fetchData = $this->connect->query($sql);
        if ($fetchData->num_rows > 0) {
            while ($rows = $fetchData->fetch_assoc())
                $data[] = $rows;
        } else {
            return false;
        }
        return $data;
    }


    public function update($sql)
    {
        $this->connect->query($sql);
    }

    public function fetchVisit($countVisit){
        $sum=0;
        $selectData = $this->connect->query($countVisit);
        while ($row = $selectData->fetch_assoc()){
            $value = $row['count'];
            $sum += $value;
        }
        return $sum;
    }


}