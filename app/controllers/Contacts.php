<?php
    class Contacts extends Controller{
        public function __construct(){
            $this->contactModel = $this->model("Contact");
        }

        public function addShowContacts(){
            $data =[];
            $result = $this->contactModel->getContacts();
            foreach ($result as $row) {
                array_push($data,$row);
            }
            $this->view("contacts/contactsPage",$data);
        }
    }
?>