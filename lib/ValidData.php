<?php
/**
 * Created by PhpStorm.
 * User: DEVOP
 * Date: 6/24/2018
 * Time: 8:11 PM
 */

class ValidData
{
    public function check_empty_filed($data, $fields)
    {
        $msg = null;
        foreach ($fields as $value) {

            if (empty($data[$value])) {
                $msg .= "$value field empty <br />";
            }

        }
        return $msg;
    }

    public function is_valid_ip($ip)
    {
        //if (is_numeric($age)) {
        if (filter_var($ip, FILTER_VALIDATE_IP)) {
            return true;
        }
        return false;
    }

    public function is_valid_email($email)
    {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
}