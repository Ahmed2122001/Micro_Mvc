<?php

namespace MVC\controllers;

use MVC\core\controller;
use MVC\models\user;
use GUMP;
use MVC\core\session;

class usercontroller extends controller
{
    public function __construct()
    {
        session::start();
        $user_data = session::Get('user');
        if (empty($user_data)) {
            echo "class not access";
        }
    }
    public function index()
    {
        echo "user";
    }
}
