<?php 

    namespace core\controller;

    use core\classes\Functions;

    class Login
    {

        public function inicio()
        {

            Functions::Layout([
                'log'
            ]);

        }

        public function login()
        {

            Functions::Layout([
                'login'
            ]);

        }

    }

?>