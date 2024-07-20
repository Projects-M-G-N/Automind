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

        public function cadQuest()
        {

            Functions::Layout([
                'cadQuest'
            ]);

        }

        public function bancodequestoes()
        {

            Functions::Layout([
                'bancodequestoes'
            ]);

        }

        public function gerarProvas()
        {

            Functions::Layout([
                'gerarProvas'
            ]);

        }

        public function provas()
        {

            Functions::Layout([
                'provas'
            ]);

        }

        public function prova()
        {

            Functions::Layout([
                'prova'
            ]);

        }

        public function logout()
        {

            Functions::Layout([
                'logout'
            ]);

        }

        public function pdf()
        {

            Functions::Layout([
                'pdf'
            ]);

        }

    }

?>