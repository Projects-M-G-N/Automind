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

        public function cadProva()
        {

            Functions::Layout([
                'cadProva'
            ]);

        }

        public function criarprova()
        {

            Functions::Layout([
                'criarProva'
            ]);

        }

        public function gerarProvas()
        {

            Functions::Layout([
                'gerarProvas'
            ]);

        }

    }

?>