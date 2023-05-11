<?php
    function load($class)
    {
        require_once $class;
    }

    // Aqui onde é feito os includes dos arquivos PHP

    load('classes/interfaces/CRUD.php');
    load('classes/Rodoviaria.php');

    load('classes/Usuario.php');
    load('classes/Passageiro.php');
    load('classes/Onibus.php');
    load('classes/Ticket.php');
    load('classes/Terminal.php');

    load('classes/Passageiros.php');
    load('classes/Onibuss.php');
    load('classes/Tickets.php');
    load('classes/Terminais.php');
    
