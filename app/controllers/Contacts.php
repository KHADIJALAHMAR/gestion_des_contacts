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

            $username = $this->session->getSession();

            $dataInsert= [
                'contact_name' => trim($_POST['name']),
                'contact_phone' => trim($_POST['phone']),
                'contact_email' => trim($_POST['email']),
                'contact_adress' => trim($_POST['adress']),
                'save' => trim($_POST['save'])
            ];
            $result = $this->contactModel->getContacts($username);
            foreach ($result as $row) {
                array_push($data,$row);
            }
            $this->view("contacts/contactsPage",$data);
        }
    }
?>