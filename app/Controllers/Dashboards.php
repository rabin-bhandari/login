<?php

namespace App\Controllers;

use App\Models\UserModel;

class Dashboards extends BaseController
{
    public function user()
    {
        $data = [];

        echo view('templates/header', $data);
        echo view('welcome', $data);
        echo view('templates/footer', $data);
    }

    public function admin()
    {
        $data = [];

        echo view('templates/header', $data);
        echo view('dashboard', $data);
        echo view('templates/footer', $data);
    }
}
