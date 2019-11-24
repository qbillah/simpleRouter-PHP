<?php 
    include_once 'IRequest.php';
    class Request implements IRequest{

        //Constructor

        function __construct()
        {
            $this->bootstrapSelf();
        }

        //bootstrapSelf
        /*
            Stores global $_SERVER array as properties
        */

        private function bootstrapSelf(){
            foreach($_SERVER as $key => $value){
                $this->{$this->toCamelCase($key)} = $value;
            }
        }

        //toCamelCase
        /*
            Converts all string to camel case
        */

        private function toCamelCase($string){
            $result = strtolower($string);
            preg_match_all('/_[a-z]/', $result, $matches);
            foreach($matches[0] as $match){
                $c = str_replace('_', '', strtoupper($match));
                $result = str_replace($match, $c, $result);
            }
            return $result;
        }

        //getBody
        /*
            Return GET or POST
        */
        public function getBody(){
            if($this->requestMethod === "GET"){
                return;
            }
            if ($this->requestMethod == "POST"){
                $body = array();
                foreach($_POST as $key => $value){
                    $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
                return $body;
            }
        }
    }
?>