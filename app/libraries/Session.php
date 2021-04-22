<?php 

    class Session{
        private $session;
        public function __construct(){

        }
        // start session method
        public function startSession(){
            session_start();
        }
        // set session method
        public function setSession(){
            $this->session = $_SESSION['username'];
        }
        // get session method
        public function getSession(){
            return $this->session;
        }
        // get session method
        public function unsetSession(){
            unset($this->session);
        }

    }

?>