<?php 
class Users extends Controller {
    public function __construct()
    {
        
    }
    public function signup(){
        // checking for form submit
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // process
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