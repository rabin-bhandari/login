<?php

namespace App\Controllers;

use App\Models\UserModel;


class Users extends BaseController
{
    public function index()
    {
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {

            $rules = ['password' => 'validateUser[email,password]'];
            $errors = ['password' => ["validateUser" => 'Email or Password don\'t match']];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new UserModel();

                $user = $model->where('email', $this->request->getVar('email'))
                    ->first();

                $this->setUserSession($user);
                if ($user['admin'] == 1) {
                    return redirect()->to('dashboard');
                } else {
                    return redirect()->to('welcome');
                }
            }
        }

        echo view('templates/header', $data);
        echo view('index');
        echo view('templates/footer');
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'firstName' => $user['first_name'],
            'email' => $user['email'],
            'admin' => $user['admin'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function update()
    {

        $data = [];
        helper(['form']);
        $model = new UserModel();

        if ($this->request->getMethod() == 'post') {
            //let's do the validation here

            $newData = [
                'id' => session()->get('updateId'),
                'admin' => $this->request->getPost('role'),
                'password' => $this->request->getPost('newPass')
            ];
            $model->save($newData);

            session()->setFlashdata('success', 'Successfuly Updated');
            return redirect()->to('/dashboard');
        }

        $data['user'] = $model->where('id', session()->get('id'))->first();
        echo view('templates/header', $data);
        echo view('dashboard');
        echo view('templates/footer');
    }


    public function signup()
    {
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {

            $model = new UserModel();
            $newData = [
                'first_name' => $this->request->getVar('fname'),
                'last_name' => $this->request->getVar('lname'),
                'email' => $this->request->getVar('email'),
                'password' => $this->request->getVar('validation1')
            ];
            $model->save($newData);
            $session = session();
            $session->setFlashdata('success', 'Successful Registration');
            return redirect()->to('/');
        }

        echo view('templates/header', $data);
        echo view('index', $data);
        echo view('templates/footer', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
