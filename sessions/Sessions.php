<?php 

    session_start();

    class Sessions{
        
        //Session Type
        /*
            0 - Temporary session only sets $_SESSION
            1 - Long term session sets $_SESSION & $_COOKIE
        */

        public $sessionType; 

        private $sessionName;
        private $sessionValue;
        
        function __construct($ses , $val , $type){

            $this->sessionName = $ses;
            $this->sessionValue = $val;
            $this->sessionType = $type;

            switch($this->sessionType){
                case 0:
                    $this->setTempSession($this->sessionName , $this->sessionValue);
                    break;
                case 1:
                    $this->setLongSession($this->sessionName , $this->sessionValue);
                    break;
                default:
                    break;
            }

        }     
        
        public function setTempSession($n , $v){
            $_SESSION[$n] = $v;
        }

        private function setLongSession($n , $v){
            $_SESSION[$n] = $v;
            setcookie($n , $v , time()+86400 , '/');
        }

    }

?>