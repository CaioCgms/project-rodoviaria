<?php
    require_once "autoload.php";

    use classes\Passageiro;
    use classes\Terminal;
    use classes\Onibus;
    use classes\Ingresso;
    use classes\Rodoviaria;

    // Objetos 
    $rodoviaria = new Rodoviaria("Caio's Rodoviaria");

    $passageiros = $rodoviaria -> getPassageiros();
    $terminais = $rodoviaria -> getTerminais();
    $onibuss = $rodoviaria -> getOnibuss();
    $tickets = $rodoviaria -> getTickets();

    // Criar Terminais
    $terminal1 = new Terminal("Terminal 1", $rodoviaria);
    $terminal2 = new Terminal("Terminal 2", $rodoviaria);
    $terminal3 = new Terminal("Terminal 3", $rodoviaria);
    $terminal4 = new Terminal("Terminal 4", $rodoviaria);

    // Terminais da rodoviária
    $terminais->add($terminal1);
    $terminais->add($terminal2);
    $terminais->add($terminal3);
    $terminais->add($terminal4);

    $rodoviaria->setTerminais($terminais);

    // Criar Passageiros
    $passageiros->add(new Passageiro("Caio Graco", "caio@mail.com", "1111"));
    $passageiros->add(new Passageiro("Caíque Gabriel", "caaique@mail.com", "1111"));

    // Criar Onibuss
    $onibuss->add(new Onibus("Expresso Jaguabara", "Russas - Fortaleza", 180, "12:00", "15:00", "Russas", "Fortaleza",  $terminal1));
    $onibuss->add(new Onibus("Expresso Jaguabara", "Juazeiro - Fortaleza", 540, "10:00", "19:00", "Juazeiro", "Fortaleza",  $terminal2));
    $onibuss->add(new Onibus("Expresso Jaguabara", "Palhano - Fortaleza", 120, "12:00", "14:00", "Palhano", "Fortaleza", $terminal3));


    // Mostra Lista de Terminais
    function showTerminais()
    {
        global $terminais;
        echo "\n ---- Terminais ---- \n";
        for ($i = 0; $i < count($terminais->getAll()); $i++) {
            echo "$i - " . $terminais->getAll()[$i]->getNome() . "\n";
        }
    }

    // Motra lista de Onibuss
    function showOnibuss()
    {
        global $onibuss;

        echo "\n ---- Onibus'2s ---- \n";
        for ($i = 0; $i < count($onibuss->getAll()); $i++) {
            echo "$i - Linha: " . $onibuss->getAll()[$i]->getLinha() . " | Empresa: " . $onibuss->getAll()[$i]->getEmpresa();
            echo " | Loc. Partida: " . $onibuss->getAll()[$i]->getLocalPartida() . " | Loc.Destino: " . $onibuss->getAll()[$i]->getDestino();
            echo " | Terminal: " . $onibuss->getAll()[$i]->getTerminal()->getNome() ;
            echo "\n";
        }
    }

    // Mostra lista de Passageiros
    function showPassageiros()
    {
        global $passageiros;

        echo "\n ---- Passageiros ---- \n";
        for ($i = 0; $i < count($passageiros->getAll()); $i++) {
            echo "$i - " . $passageiros->getAll()[$i]->getNome() . "\n";
        }
    }

    // Mostra lista de Tickets
    function showTickets()
    {
        global $tickets;

        echo "\n ---- Tickets ---- \n";
        for ($i = 0; $i < count($tickets->getAll()); $i++) {
            echo "$i - Passageiro: " . $tickets->getAll()[$i]->getPassageiro()->getNome();
            echo " | Onibus: ". $tickets->getAll()[$i]->getOnibus()->getLinha();
            echo " | Terminal : ". $tickets->getAll()[$i]->getTerminal()->getNome() . "\n";
        }
    }

    // Cria Terminal
    function criarTerminal()
    {
        global $terminais;
        global $rodoviaria;
        
        $nome = readline("Insira o nome da Terminal: ");
        $terminais->add(new Terminal($nome, $rodoviaria));
    }

    // Cria Onibus
    function criarOnibus()
    {
        global $onibuss;
        global $rodoviaria;

        echo "\n Insira os detalhes do Onibus ---- \n ";

        $empresa = readline("Nome: ");
        $linha = readline("Linha: ");
        $duracao = readline("Duração em Minutos: ");
        $local_saida = readline("Local Saída: ");
        $local_chegada = readline("Local Chegada: ");
        $hora_saida = readline("Hora Saída (hh:mm): ");
        $hora_chegada = readline("Hora Chegada (hh:mm): ");

        echo "\n >> Selecione o terminal de saída do Ônibus";
        showTerminais();
        $terminal = (int) readline();

        $onibuss->add(new Onibus($empresa, $linha, $duracao, $hora_saida, $hora_chegada, $local_saida, $local_chegada, $rodoviaria->getTerminais($terminal)));
    }

    // Cria Passageiro
    function criarPassageiro()
    {
        global $passageiros;

        echo "\n Insira os detalhes do Passageiro ---- \n ";

        $nome = readline("Nome: ");
        $email = readline("Email: ");
        $cpf = readline("CPF: ");

        $passageiros->add(new Passageiro($nome, $email, $cpf));
    }

    // Cria Ingresso
    function criarIngresso()
    {
        global $tickets;
        global $passageiros;
        global $terminais;
        global $onibuss;

        echo "\n Insira os detalhes do Ingresso ---- \n ";

        echo "\n >> Selecione o número do Passageiro";
        showPassageiros();
        $passageiro_index = (int) readline();
        echo "\n >> Selecione o número do Onibus";
        showOnibuss();
        $onibus_index = (int) readline();
        $onibus = $onibuss->get($onibus_index);
        $tickets->add(new Ingresso($passageiros->get($passageiro_index), $onibus, $onibus->getTerminal()));
    }

    // Editar Terminal
    function editarTerminal($index)
    {
        global $terminais;
        global $rodoviaria;

        $nome = readline("Insira o nome da Terminal: ");
        $terminais->update($index, new Terminal($nome, $rodoviaria));
    }

    // Editar Onibus
    function editarOnibus($index)
    {
        global $onibuss;
        global $rodoviaria;

        echo "\n Insira os detalhes do Onibus ---- \n ";

        $empresa = readline("Nome: ");
        $linha = readline("Linha: ");
        $duracao = readline("Duração em Minutos: ");
        $local_saida = readline("Local Saída: ");
        $local_chegada = readline("Local Chegada: ");
        $hora_saida = readline("Hora Saída (hh:mm): ");
        $hora_chegada = readline("Hora Chegada (hh:mm): ");

        echo "\n >> Selecione o terminal de saída do Ônibus";
        showTerminais();
        $terminal = (int) readline();

        $onibuss->update($index, new Onibus($empresa, $linha, $duracao, $hora_saida, $hora_chegada, $local_saida, $local_chegada, $rodoviaria->getTerminais($terminal)));
    }

    // Editar Passageiro
    function editarPassageiro($index)
    {
        global $passageiros;

        echo "\n Insira os detalhes do Passageiro ---- \n ";

        $nome = readline("Nome: ");
        $email = readline("Email: ");
        $cpf = readline("CPF: ");

        $passageiros->update($index, new Passageiro($nome, $email, $cpf));
    }

    // Editar Ingresso
    function editarIngresso($index)
    {
        global $tickets;
        global $passageiros;
        global $terminais;
        global $onibuss;

        echo "\n Insira os detalhes do Ingresso ---- \n ";

        echo "\n >> Selecione o número do Passageiro";
        showPassageiros();
        $passageiro = readline();
        echo "\n >> Selecione o número do Onibus";
        showOnibuss();
        $onibus_index = (int) readline();
        $onibus = $onibuss->get($onibus_index);
        echo "\n >> Selecione o número da Terminal";
        showTerminais();

        $tickets->update($index, new Ingresso($passageiros->get($passageiro), $onibus, $onibus->getTerminal()));
    }

    // Remover Terminal
    function removerTerminal($index)
    {
        global $terminais;
        $terminais->delete($index);
    }

    // Remover Onibus
    function removerOnibus($index)
    {
        global $onibuss;
        $onibuss->delete($index);
    }

    // Remover Passageiro
    function removerPassageiro($index)
    {
        global $passageiros;
        $passageiros->delete($index);
    }

    // Remover Ingresso
    function removerIngresso($index)
    {
        global $tickets;
        $tickets->delete($index);
    }


    // 
    function PassageirosFuncs()
    {
        $exit = false;
        while( !$exit) {
            echo "\n ---- PassageiroS ----- ";
            echo "\n\n\n";
            echo " 1- >> Lista \n";
            echo " 2- >> Adicionar \n";
            echo " 3- >> Remover \n";
            echo " 4- >> Atualizar \n";
            echo " 5- >> Sair \n";

            $menu_ = (int) readline();
    
            switch ($menu_) {
                case 1:
                    showPassageiros();
                    break;
                case 2:
                    criarPassageiro();
                    break;
                case 4:
                    showPassageiros();
                    $index = (int) readline();
                    editarPassageiro($index);
                    break;
                case 3:
                    showPassageiros();
                    $index = (int) readline();
                    removerPassageiro($index);
                    break;
                case $menu_ == 5:
                    $exit = true;
                    break;
            }
        }
    }

    function OnibussFuncs()
    {
        $exit = false;
        while (!$exit) {
            echo "\n ---- Onibuss ----- ";
            echo "\n\n\n";
            echo " 1- >> Lista \n";
            echo " 2- >> Adicionar \n";
            echo " 3- >> Remover \n";
            echo " 4- >> Atualizar \n";
            echo " 5- >> Sair \n";
    
            $menu_ = (int) readline();
    
            switch ($menu_) {
                case 1:
                    showOnibuss();
                    break;
                case 2:
                    criarOnibus();
                    break;
                case 4:
                    showOnibuss();
                    $index = (int) readline();
                    editarOnibus($index);
                    break;
                case 3:
                    showOnibuss();
                    $index = (int) readline();
                    removerOnibus($index);
                    break;
                case $menu_ == 5:
                    $exit = true;
                    break;
            }
        }
    }

    function TerminaisFuncs()
    {
        $exit = false;
        while (!$exit) {
            echo "\n ---- Terminais ----- ";
            echo "\n\n\n";
            echo " 1- >> Lista \n";
            echo " 2- >> Adicionar \n";
            echo " 3- >> Remover \n";
            echo " 4- >> Atualizar \n";
            echo " 5- >> Sair \n";
    
            $menu_ = (int) readline();
    
            switch ($menu_) {
                case 1:
                    showTerminais();
                    break;
                case 2:
                    criarTerminal();
                    break;
                case 4:
                    showTerminais();
                    $index = (int) readline();
                    editarTerminal($index);
                    break;
                case 3:
                    showTerminais();
                    $index = (int) readline();
                    removerTerminal($index);
                    break;
                case $menu_ == 5:
                    $exit = true;
                    break;
            }
        }
    }

    function TicketsFuncs()
    {
        $exit = false;
        while (!$exit) {
            echo "\n ---- Tickets ----- ";
            echo "\n\n\n";
            echo " 1- >> Lista \n";
            echo " 2- >> Adicionar \n";
            echo " 3- >> Remover \n";
            echo " 4- >> Atualizar \n";
            echo " 5- >> Sair \n";

            $menu_ = (int) readline();

            switch ($menu_) {
                case 1:
                    showTickets();
                    break;
                case 2:
                    criarIngresso();
                    break;
                case 4:
                    showTickets();
                    $index = (int) readline();
                    editarIngresso($index);
                    break;
                case 3:
                    showTickets();
                    $index = (int) readline();
                    removerIngresso($index);
                    break;
                case $menu_ == 5:
                    $exit = true;
                    break;
    
            }
        } 
    }

    $exit = false;
    while(!$exit)
    {
        echo "\n ---- CAIO'S Rodoviárias ----- ";
        echo "\n\n\n";
        echo " 1- >> Onibus \n";
        echo " 2- >> Passageiros \n";
        echo " 3- >> Terminais \n";
        echo " 4- >> Tickets \n";
        echo " 5- >> Sair \n";

        $menu_ = (int) readline();

        switch ($menu_) {
            case 1:
                OnibussFuncs();
                break;
            case 2:
                PassageirosFuncs();
                break;
            case 3:
                TerminaisFuncs();
                break;
            case 4:
                TicketsFuncs();
                break;
            case $menu_ == 5:
                $exit = true;
                break;

        }
    }

