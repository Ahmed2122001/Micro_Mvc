<?php

namespace MVC\models;

use MVC\core\model;

class user extends model
{
    public function get_allusers()
    {
        $data = model::db()->rows("select * from user");
        return $data;
    }
    public function Getuser($email, $password)
    {
        $Data = model::db()->row("select * from user where `email`='$email'&& `password` ='$password'");
        return $Data;
    }
    public function adduser($name, $email, $password)
    {
        $Data = model::db()->row("insert into user (`name`,`email`,`password`) values ('$name','$email','$password')");
        return $Data;
    }
}
