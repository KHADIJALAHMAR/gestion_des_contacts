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
            // print_r($_SESSION);
            $username = $this->session->getSession('username');
            //  getting data
            $result = $this->contactModel->getContacts($username);
            foreach ($result as $row) {
                array_push($data,$row);
            }
            // -------------------------------------
            // gettin data and inserting it
            
            // -------------------------------------
            //calling the view and sending the data to it
            $this->view("contacts/contactsPage",$data);
        }
    }
?>