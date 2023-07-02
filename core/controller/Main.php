<?php 

    namespace core\controller;

    use core\classes\Functions;

    class Main
    {

        public function inicio()
        {

            Functions::Layout([
                'inicio'
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