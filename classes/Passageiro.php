<?php
    namespace classes;

    use classes\Usuario;

    class Passageiro extends Usuario
    {
        public function __construct($nome, $email, $cpf)
        {
            parent::__construct($nome, $email, $cpf);
        }
    }