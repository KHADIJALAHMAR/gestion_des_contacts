<?php 
class Users extends Controller {
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }
    public function signup(){
        // checking for form submit
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // sanitize POST form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // initialize data
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'confirm_pass' => trim($_POST['confirm_password']),
                'username_err' => '',
                'password_err' => '',
                'confirm_pass_err' => ''

            ];
            // username validation 
            if (empty($data['username'])) {
                $data['username_err'] = 'please enter your username';
            }else {
                // check if username already exists
                if ($this->userModel->findUser($data['username'])) {
                    $data['username_err'] = 'username already taken';
            }
         }
            // password validation 
            if (empty($data['password'])) {
                $data['password_err'] = 'please enter your password';
            }elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'password must be at least 6 characters';
            }
            // username validation 
            if (empty($data['confirm_pass'])) {
                $data['confirm_pass_err'] = 'please confirm your password';
            }else {
                if ($data['password'] != $data['confirm_pass']) {
                    $data['confirm_pass_err'] = 'password does not match';
                }
            }
            // make sure array errors is empty
            if (empty($data['username_err']) && empty($data['password_err']) && empty($data['confirm_pass_err'])) {
                die('SUCCESS');
            }else {
                $this->view('users/signup', $data);
            }
                
          
               
        
            
            

        } else {
            // initialize data
            $data = [
                'username' => '',
                'password' => '',
                'confirm_pass' => '',
                'username_err' => '',
                'password_err' => '',
                'confirm_pass_err' => ''

            ];
            // load view
            $this->view('users/signup', $data);
        }
    }
    public function login(){
        // checking for form submit
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // process
             // sanitize POST form
             $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
             // initialize data
             $data = [
                 'username' => trim($_POST['username']),
                 'password' => trim($_POST['password']),
                 'username_err' => '',
                 'password_err' => ''
                ];
                 // username validation 
            if (empty($data['username'])) {
                $data['username_err'] = 'please enter your username';
            }
             // password validation 
             if (empty($data['password'])) {
                $data['password_err'] = 'please enter your username';
            }
            // make sure array errors is empty
            if (empty($data['username_err']) && empty($data['password_err'])) {
                die('SUCCESS');
            }else {
                $this->view('users/login', $data);
            }


        } else {
            // initialize data
            $data = [
                'username' => '',
                'password' => '',
                'username_err' => '',
                'password_err' => '',
            ];
            // load view
            $this->view('users/login', $data);
        }
    }
}