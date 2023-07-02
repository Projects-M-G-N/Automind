<?php 

namespace core\classes;

class Login{

    public function logado(){

        if(isset($_SESSION['login']) && $_SESSION['login'] == True){

            return True;

        }
        
        else{

            return False;

        }

    }

}

?>