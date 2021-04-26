<?php
    class Contacts extends Controller{
        private $session;
        public function __construct(){
            $this->contactModel = $this->model("Contact");
            $this->session = new Session;
        }

        public function addShowContacts(){
            // init data array
            $data =[];
            // starting session
            $this->session->startSession();
            // checking if a user logged in & redirect to their home
        if (!isset($_SESSION['"username"'])) {
            header('location:' . URLROOT . '/users/login');
        }
            // print_r($_SESSION);
            $username = $this->session->getSession('username');
            //  getting data
            $result = $this->contactModel->getContacts($username);
            foreach ($result as $row) {
                array_push($data,$row);
            }
            // -------------------------------------
            // gettin data and inserting it
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // sanitize POST form
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // initialize data
                $insdata = [
                    'contact_name' => trim($_POST['name']),
                    'contact_phone' => trim($_POST['phone']),
                    'contact_email' => trim($_POST['email']),
                    'contact_adress' => trim($_POST['adress']),
                    'name_err' => '',
                    'phone_err' => '',
                    'email_err' => '',
                    'adress_err' => ''
                ];
                // name validation 
                if (empty($insdata['contact_name'])) {
                    $insdata['name_err'] = 'please enter the contact name';
                }
                // phone validation 
                if (empty($insdata['contact_phone'])) {
                    $insdata['phone_err'] = 'please enter the contact phone';
                }
                // email validation 
                if (empty($insdata['contact_email'])) {
                    $insdata['email_err'] = 'please enter the contact email';
                }
                // adress validation 
                if (empty($insdata['contact_adress'])) {
                    $insdata['adress_err'] = 'please enter the contact adress';
                }

                if (empty($insdata['name_err']) && empty($insdata['phone_err']) && empty($insdata['email_err']) && empty($insdata['adress_err'])) {
                    // inserting contact informations to db
                    if ($this->contactModel->addContact($insdata)) {
                        //calling the view and sending the data to it
                        $this->view("contacts/contactsPage",$data);
                    }else {
                        die("contact not inserted");
                    }
                }else {
                    //calling the view and sending the data and errors to it
                    $this->view("contacts/contactsPage",$data,$insdata);
                }
                
            }else {
                //calling the view and sending the data to it
                $this->view("contacts/contactsPage",$data);
            }
            
        }
    }
?>