<?php
/**
 * Created by PhpStorm.
 * User: DEVOP
 * Date: 6/24/2018
 * Time: 8:07 PM
 */

class DbConn
{
    private $_host = 'localhost';
    private $_username = 'root';
    private $_password = '';
    private $_database = 'users_db';

    protected $connection;

    public function __construct()
    {
        if (!isset($this->connection)) {
            $this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }
        }

        return $this->connection;
    }
}