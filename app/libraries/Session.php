<?php 

    class Session{
        
        public function __construct(){

        }
        // start session method
        public function startSession(){
            session_start();
        }
        // set session method
        public function setSession($name,$value){
            $_SESSION['"'.$name .'"'] = $value;
        }
        // get session method
        public function getSession($name){
            return $_SESSION['"'.$name .'"'];
        }
        // get session method
        public function unsetSession($name){
            unset($_SESSION['"'.$name .'"']);
        }

    }

?>