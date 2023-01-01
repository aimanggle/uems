<?php

namespace App\Controllers;

use Config\Services;
use App\Models\UserModel;
use App\Controllers\BaseController;

class Auth extends BaseController
{
     /*
     |--------------------------------------------------------------------------
     | Auth Controller
     |--------------------------------------------------------------------------
     |
     | This controller is responsible for handling authentication requests
     |
     *

     /**
     * ---------------------------------------------
     * Constructor to load model and validation class
     * ---------------------------------------------
     */
     public function __construct()
     {
          $this->validation = Services::validation();
          $this->UserModel = new UserModel();
     }

     /**
     *  ----------------------------------------
     *  Methods Redirect to login page
     *  ----------------------------------------
     */
     public function index()
     {
          return redirect()->to('/login');
     }

     /**
     * ----------------------------------------
     * Methods to show login page
     * ----------------------------------------
     */
     public function login()
     {
          $data = [
               'title' => 'Login',
               'validation' => $this->validation
          ];
          return view('auth/login',$data);
     }

     /**
      * --------------------------------------------------------------------
      * Methods Attempt Login 
      * @param null
      * --------------------------------------------------------------------
      */
     public function attemptLogin()
     {
          //validate input
          if (!$this->validate([
               'auth' => [
                    'rules' => 'required',
                    'errors' => [
                         'required' => 'Username is required',
                         
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
          $auth = $this->request->getVar('auth');
          $password = $this->request->getVar('password');

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
                    $this->session->set('user_id', $user['id']);
                    $this->session->set('user_name', $user['username']);
                    $this->session->set('user_email', $user['email']);
                    $this->session->set('user_role', $user['role']);
                    $this->session->set('isLoggedIn', TRUE);
                    return redirect()->to('/dashboard');
               }
          }
          else 
          {
               session()->setFlashdata('error', 'Incorrect Password');
               return redirect()->back()->withInput();
          }
     }

/*

     public function forgotPassword()
     {
          $data = [
               // 'title' => 'Forgot Password',
               'validation' => $this->validation
          ];
          return view('auth/forgot',$data);
     }

     // attempt to send password reset link
     public function attemptForgotPassword()
     {
          //validate input
          if (!$this->validate([
               'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                         'required' => 'Email is required',
                         'valid_email' => 'Please enter a valid email address'
                    ]
               ]
          ])) 
          {
               return redirect()->to('/forgot-password')->withInput()->with('validation', $this->validation);
          }
          //get user input from login form
          $email = $this->request->getVar('email');
          //check if user exists in database
          $user = $this->UserModel->where('email', $email)->first();
          //if user exists
          if ($user) 
          {
               //check if user is active or not
               if($user['userstat'] == "inactive")
               {
                    session()->setFlashdata('error', 'Sorry, Your account is inactive. Please contact the administrator.');
                    return redirect()->to('/forgot-password');
               }
               else
               {
                    //generate random token
                    $token = bin2hex(random_bytes(32));
                    //set token in database
                    // $this->UserModel->setToken($token, $email);
                    //send email
                    $this->email->send($token, 'forgot');
                    session()->setFlashdata('success', 'Please check your email to reset your password');
                    return redirect()->to('/forgot-password');
               }
          }
          //if user does not exist
          else 
          {
               session()->setFlashdata('error', 'Email does not exist');
               return redirect()->back()->withInput();
          }
     }
     */

     /**
      * --------------------------------------------------------------------
      *   Method to show register page
      *   @param null
      * --------------------------------------------------------------------
      */
     public function register()
     {
          $data = [
               'title' => 'Register',
          ];
          return view('auth/register',$data);
     }

     /**
      * --------------------------------------------------------------------
      *   Method to attempt register
      *   @param null
      * --------------------------------------------------------------------
      */
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

     /**
      * --------------------------------------------------------------------
      *   Method to logout user
      *   @param null
      * --------------------------------------------------------------------
      */
     public function logout()
     {
          $this->session->destroy();
          return redirect()->to('/login');
     }
}