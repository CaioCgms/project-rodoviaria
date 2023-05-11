<?php

namespace classes;

use classes\Onibuss;
use classes\Terminais;
use classes\Passageiros;
use classes\Tickets;

class Rodoviaria
{

    private $nome;
    private Onibuss $onibuss;
    private Terminais $terminais;
    private Passageiros $passageiros; //Array de clientes
    private Tickets $tickets;//Array de tickets de viagem (passagens)

    public function __construct($nome)
    {
        $this->nome;
        $this->onibuss = new Onibuss();
        $this->terminais = new Terminais();
        $this->passageiros = new Passageiros();
        $this->tickets = new Tickets();
    }

    // Retorna o nome do terminal
    public function getNome()
    {
        return $this->nome;
    }

    // Retorna Objeto de onibus
    public function getOnibuss()  : Onibuss
    {
        return $this->onibuss;
    }

    // Retorna Objeto de terminais
    public function getTerminais($index = -1)
    {

        if($index >= 0){
            $terminal = $this->terminais->get($index);
            return $terminal;
        }

        return $this->terminais;
    }

    public function setTerminais($terminais)
    {
        $this->terminais = $terminais;
    }

    // Retorna Objeto de Tickets
    public function getTickets() : Tickets
    {
        return $this->tickets;
    }

    // Retorna Objeto de passageiros
    public function getPassageiros() : Passageiros
    {
        return $this->passageiros;
    }
}