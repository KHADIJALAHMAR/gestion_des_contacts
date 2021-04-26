<?php 
class Users extends Controller {
    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->userSession = new Session;
    }
    public function signup(){
        // init session
        $this->userSession->startSession();
        // checking if a user logged in & redirect to their home
        if (isset($_SESSION['"username"'])) {
            header('location:' . URLROOT . '/contacts/addShowContacts');
        }
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
                // encrypt password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                // register user
                if ($this->userModel->signUp($data)) {
                    header('location: ' . URLROOT . '/users/login');
                }else {
                    die('something went wrong');
                }
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
        // init session :
        $this->userSession->startSession();
        // checking if a user logged in & redirect to their home
        if (isset($_SESSION['"username"'])) {
            header('location:' . URLROOT . '/contacts/addShowContacts');
        }
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
                $data['password_err'] = 'please enter your password';
            }

            //check for username/password
            if ($this->userModel->findUser($data['username'])) {
                // user found
            }else {
                $data['username_err'] = 'please enter a valid username';
            }

            // make sure array errors is empty
            if (empty($data['username_err']) && empty($data['password_err'])) {
                
                // valid
                // checking and setting logged in user
                $loggedInUser = $this->userModel->logIn($data['username'], $data['password']);
                if ($loggedInUser) {
                    
                    // create session
                    $this->userSession->setSession('username',$data['username']);

                    // updating last login for user 

                    $this->userModel->updateLastLogin($data['username']);
                    
                    // if logged in direct user to profile
                    header('location:' . URLROOT . '/contacts/addShowContacts');

                }else {
                    
                    $data['password_err'] = 'password incorrect';
                    $this->view('users/login', $data);
                }



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
    public function logout(){
        $this->userSession->startSession();
        $this->userSession->unsetSession('username');
        $data = ['title' => 'Contacts app',
                 'description' => 'Simple contacts management app built on a mini mvc php framework',
        ];
        
        // load view
        $this->view('pages/index', $data);
    }
    // profile
    public function profile(){
        $this->userSession->startSession();

        $data = $this->userModel-> getProfile($_SESSION['"username"']);

         // load view
         $this->view('users/profile', $data);
    }
}