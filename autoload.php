<?php
    function load($class)
    {
        require_once $class;
    }

    load('functions.php');

    // Aqui onde é feito os includes dos arquivos PHP
    
    load('banco_dados/DB_PDO.php');
    load('classes/daos/DAOS.php');

    // Load controllers
    load('controllers/http/Controller.php');

    load('classes/interfaces/CRUD.php');
    load('classes/Rodoviaria.php');

    load('classes/Usuario.php');
    load('classes/Passageiro.php');
    load('classes/Onibus.php');
    load('classes/Ticket.php');
    load('classes/Terminal.php');
    load('classes/Poltronas.php');

    load('classes/Passageiro_DAO.php');
    load('classes/Poltronas_DAO.php');
    load('classes/Onibus_DAO.php');
    load('classes/Tickets_DAO.php');
    load('classes/Terminais_DAO.php');
    
