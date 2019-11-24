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

        private $setFlag;
        
        function __construct(){

            $numargs = func_num_args();
            $args = func_get_args();

            try{
                if($numargs === 3){
                    $this->sessionName = $args[0];
                    $this->sessionValue = $args[1];
                    $this->sessionType = $args[2];

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
                }else{
                    return 0;
                }
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }     
        
        private function setTempSession($n , $v){
            $_SESSION[$n] = $v;
        }

        private function setLongSession($n , $v){
            $_SESSION[$n] = $v;
            setcookie($n , $v , time()+86400 , '/');
        }

        public function checkIsSession($n){
            if(isset($_SESSION[$n])){
                $this->setFlag = 1;
            }elseif(isset($_COOKIE[$n])){
                $this->setFlag = 1;
            }else{
                $this->setFlag = 0;
            }
            return $this->setFlag;
        }

        public function getSessionValue($n){
            if(isset($_SESSION[$n])){
                return $_SESSION[$n];
            }elseif(isset($_COOKIE[$n])){
                return $_COOKIE[$n];
            }else{
                return 0;
            }
        }



    }

?>