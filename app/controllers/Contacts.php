<?php
    class Contacts extends Controller{
        private $session;
        public function __construct(){
            $this->contactModel = $this->model("Contact");
            $this->session = new Session;
        }

        public function addShowContacts(){
            $data =[];
            $this->session->startSession();
            $username = $this->session->getSession('username');
            $result = $this->contactModel->getContacts($username);
            foreach ($result as $row) {
                array_push($data,$row);
            }
            $this->view("contacts/contactsPage",$data);
        }
    }
?>