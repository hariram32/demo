<?php
/**
 * Created by PhpStorm.
 * User: DEVOP
 * Date: 6/24/2018
 * Time: 8:06 PM
 */
include_once 'DbConn.php';
class ApiCRUD extends DbConn
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getData($query)
    {
        $result = $this->connection->query($query);
        if ($result == false) {
            return false;
        }

        $rows = [];

        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function execute($query)
    {
        $result = $this->connection->query($query);

        if ($result == false) {
            echo 'Error: cannot execute the command';
            return false;
        } else {
            return true;
        }
    }

    public function delete($id, $table)
    {
        $query = "DELETE FROM $table WHERE id = {$id}";
        $result = $this->connection->query($query);

        if ($result == false) {
            echo 'Error: cannot delete id ' . $id . ' from table ' . $table;
            return false;
        } else {
            return true;
        }
    }

    public function escape_string($value)
    {
        return $this->connection->real_escape_string($value);
    }
}