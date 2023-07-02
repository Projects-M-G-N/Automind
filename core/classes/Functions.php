<?php 

namespace core\classes;

use Exception;

class Functions
{
    
    public static function Layout($estruturas)
    {
        
        if (!is_array($estruturas)) {
            throw new Exception("Coleção Inválida");
        }

        foreach ($estruturas as $estrutura) {
            include ("../core/views/$estrutura.php");
        }

    }

    public static function ClienteLogado()
    {
        return isset($_SESSION['cliente']);
    }

}

?>