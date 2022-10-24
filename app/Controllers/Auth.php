<?php

namespace App\Controllers;

use Config\Services;
use App\Models\UserModel;
use App\Controllers\BaseController;

class Auth extends BaseController
{
     public function __construct()
     {
          $this->validation = Services::validation();
          $this->UserModel = new UserModel();
     }

     public function index()
     {
        return redirect()->to('/login');
     }

     public function login()
     {
          $data = [
               'title' => 'Login',
               'validation' => $this->validation
          ];
          // d($data);
          return view('auth/login',$data);
     }

     public function attemptLogin()
     {
          //validate input
          if (!$this->validate([
               'auth' => [
                    'rules' => 'required',
                    'errors' => [
                         'required' => 'Username is required'
                    ]
               ],
               'password' => [
                    'rules' => 'required',
                    'errors' => [
                         'required' => 'Password is required',
                    ]
               ] 
          ])) 
          {
               return redirect()->to('/login')->withInput()->with('validation', $this->validation);
          }
        //get user input from login form
        $auth = $this->request->getVar('auth');
        $password = $this->request->getVar('password');

        //check if user exists in database
        $user = $this->UserModel->where('username', $auth)->first();

          //   if (password_verify($password, $user['password'])) 
            if ($password == $user['password'])
            {
                //check if user is active or not
                if($user['userstat'] == "inactive")
                {
                    session()->setFlashdata('error', 'Sorry, Your account is inactive. Please contact the administrator.');
                    return redirect()->to('/login');
                }
                else
                {
                    //set session variables
                    $this->session->set('user_id', $user['id']);
                    $this->session->set('user_name', $user['username']);
                    $this->session->set('user_email', $user['email']);
                    $this->session->set('user_role', $user['role']);
                    $this->session->set('isLoggedIn', TRUE);
                    return redirect()->to('/dashboard');
                }
            }
            //if user does not exist
            else 
            {
                session()->setFlashdata('error', 'Incorrect Password');
                return redirect()->back()->withInput();
            }
     }

     public function register()
     {
          return view('auth/register');
     }

     public function attempRegister()
     {
            //get user input from register form
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $confirm_password = $this->request->getPost('confirm_password');
    
            //check if user exists in database
            $user = $this->userModel->where('email', $email)->first();
    
            //if user exists
            if ($user) 
            {
                 $this->session->setFlashdata('error', 'Email is already registered');
                 return redirect()->back()->withInput();
            }
            //if user does not exist
            else 
            {
                 //check if password and confirm password match
                 if($password != $confirm_password)
                 {
                        $this->session->setFlashdata('error', 'Password and confirm password do not match');
                        return redirect()->back()->withInput();
                 }
                 //if password and confirm password match
                 else
                 {
                        //hash password
                        $password = password_hash($password, PASSWORD_DEFAULT);
    
                        //insert user data into database
                        $data = [
                             'name' => $name,
                             'email' => $email,
                             'password' => $password,
                             'role' => 'user',
                             'status' => 'active',
                        ];
                        $this->userModel->insert($data);
    
                        $this->session->setFlashdata('error', 'Successfully registered. Please login to continue.');
                        return redirect()->to('/login');
                 }
            }
     }

     //logout
     public function logout()
     {
          $this->session->destroy();
          return redirect()->to('/login');
     }
}
