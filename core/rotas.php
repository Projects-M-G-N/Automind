<?php 

    // Coleção de rotas
    $rotas = [
        'inicio' => 'main@inicio',
        'cadQuest' => 'main@cadQuest',
        'bancodequestoes' => 'main@bancodequestoes',
        'provas' => 'main@provas',
        'prova' => 'main@prova',
        'gerarProvas' => 'main@gerarProvas',
        'logout' => 'main@logout',
        'pdf' => 'main@pdf',
        'Bloom' => 'main@Bloom'
    ];

    // Ação por defeito
    $acao = 'inicio';

    // Verifica se existe a ação na lista
    if (isset($_GET['a'])) 
    {
        
        // Ação existe nas rotas
        if (!key_exists($_GET['a'], $rotas))
        {
            $acao = 'inicio';
        }else
        {
            $acao = $_GET['a'];
        }
    }

    // Tratar a definição da rota
    $partes = explode('@', $rotas[$acao]);
    $controlador = 'core\\controller\\'.ucfirst($partes[0]);
    $metodo = $partes[1];

    $ctr = new $controlador();
    $ctr->$metodo();

?>