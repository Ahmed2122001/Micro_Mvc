<?php

namespace MVC\core;

use Dcblogdev\PdoWrapper\Database;

class controller
{
    public function view($path, $pram)
    {
        // $data = $this->db()->rows("select * from user");

        extract($pram);
        require_once(VIEWS . $path . ".php");
    }
}
