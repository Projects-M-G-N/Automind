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
            include("../core/views/$estrutura.php");
        }
    }

    public static function ClienteLogado()
    {
        return isset($_SESSION['cliente']);
    }

    function fatorial($numero)
    {
        for ($i = $numero - 1; $i > 0; $i--) {
            $numero *= $i;
        }
        return $numero;
    }


    public function sorteioGabarito($listaQuestoes, $totalProvas, $quantQuestoes)
    {
        $listaProvas = [];
        $quantProvas = 1;

        while ($quantProvas < $totalProvas) {
            if ($this->fatorial(sizeof($listaQuestoes)) < $totalProvas) {
                $quantProvas = $this->fatorial(sizeof($listaQuestoes));
                break;
            }
            $quantProvas *= sizeof($listaQuestoes);
        }

        $contador = 0;
        $i = 0;

        while ($contador < $totalProvas && $contador < $quantProvas) {
            $listaTemp = [];
            $i = 0;
            while ($i < $quantQuestoes) {
                $quest = $listaQuestoes[rand(0, sizeof($listaQuestoes) - 1)]['id'];
                if (!in_array($quest, $listaTemp)) {
                    array_push($listaTemp, $quest);
                    $i++;
                }
            }
            $str = implode(" ", $listaTemp);
            if (!in_array($str, $listaProvas)) {
                array_push($listaProvas, $str);
                $contador++;
            }
        }
        
        return $listaProvas;
    }

    public function gerarGabaritos($listaQuestoes, $listaAlunos, $totalProvas, $quantQuestoes) {
        $gabaritos = $this->sorteioGabarito($listaQuestoes, $totalProvas, $quantQuestoes);

        if($totalProvas > sizeof($gabaritos)) {
            $alunosPorProva = intval($totalProvas / sizeof($gabaritos)) + 1;
        } else {
            $alunosPorProva = 1;
        }

        $listaGabaritos = [];
        $cont = 0;
        foreach ($gabaritos as $gabarito) {
            for ($i = ($alunosPorProva * $cont); $i < ($alunosPorProva * ($cont + 1)); $i++) { 
                if($i >= $totalProvas) {
                    break;
                }
                $prova = [$listaAlunos[$i]['id'], $gabarito];
                array_push($listaGabaritos, $prova);
            }
            $cont ++;
        }

        return $listaGabaritos;
    }
}
