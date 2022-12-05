<?php

namespace MVC\controllers;

use MVC\core\controller;
use MVC\models\user;
use GUMP;
use MVC\core\session;
use MVC\core\helper;
use MVC\core\helpers;

// use  Rakit\validation\validator;

class homeController extends controller
{
    public function __construct()
    {
        session::start();
    }

    public function index()
    {
        // echo "hello from index Ahmed";
        // $data = $this->db()->rows("select * from user");
        $user = new user();
        $data = $user->get_allusers();

        $title = "home index";
        $h1 = "Ahmed ";
        // $this->view("home/index", ['title' => $title, 'h1' => $h1, 'Data' => $data]);
        $this->view("home/index", ['title' => $title, 'h1' => $h1, 'data' => $data]);
    }
    public function login()
    {
        $this->view("home/login", ['title' => 'login']);
    }
    public function postlogin()
    {
        $v = GUMP::is_valid($_POST, [
            'email' => 'required'
        ]);
        if ($v == 1) {
            $user = new user();
            $data = $user->Getuser($_POST['email'], $_POST['password']);
            // echo "<pre>";
            // print_r($data);
            session::set('user', $data);
            header("LOCATION: ?user/index");
            // helpers::redirect("user/index");
        }
    }
    public function register()
    {
        $this->view("home/register", ['title' => 'register']);
    }
    public function postregister()
    {
        $v = GUMP::is_valid($_POST, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($v == 1) {
            $user = new user();
            $data = $user->adduser($_POST['name'], $_POST['email'], $_POST['password']);
            // echo "<pre>";
            // print_r($data);
            session::set('user', $data);
            // header("LOCATION: ?user/index");
            // helpers::redirect("user/index");
        }
    }
    public function logout()
    {
        session::stop();
    }
}
