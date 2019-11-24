<?php 
    interface IRequest{
        public function getBody();
        /*
            Retrives data from request body.
            Request class must implement this method.
        */
    }
?>