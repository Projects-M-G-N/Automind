<?php 

namespace core\classes;

class Redirect{

    public function redirect($redirect = null){

        if(is_null($redirect)){

            return header('Location:./');

        }

        else{

            return header("Location:./$redirect");
            
        }

    }

}

?>