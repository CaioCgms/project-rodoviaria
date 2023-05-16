<?php
    $onibuss = [];
    foreach($data['onibus'] as $onibus) {
        $onibuss[] = [
            "empresa" => $onibus->getEmpresa(),
            "terminalObj" => $onibus->getTerminalObj(),
            "terminal_id" => $onibus->getTerminal(),
            "hora_saida" => $onibus->getTerminal(),
            "local_partida" => $onibus->getLocalPartida(),
            "local_chegada" => $onibus->getDestino(),
            "hora_chegada" => $onibus->getHoraChegada(),
            "linha" => $onibus->getLinha(),
        ];
    }
?>
<div class="box">
    <div class="box-header">
        <h2 class="title">
            Cadastrar Passagem
        </h2>
    </div>
    <div class="box-content">
        <form class="form" action="." method="POST">
            <div class="custom-input">
                <label>Cliente:</label>
                <select name="cliente_id">
                    <?php foreach($data['clientes'] as $cliente) { ?>
                        <option value="<?= $cliente->getId()?>"><?= $cliente->getNome()?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="custom-input">
                <label>Ônibus:</label>
                <select name="onibus_id" onchange="onibusSelecionado(this)">
                    <?php foreach($data['onibus'] as $onibus) { ?>
                        <option value="<?= $onibus->getId()?>"><?= $onibus->getEmpresa()?>|<?= $onibus->getLinha()?>|<?= $onibus->getHoraSaida()?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="custom-input">
                <label>Terminal:</label>
                <div class="terminal_saida_id">
                    <input type="number" readonly name="terminal_id" id="terminal_id" value="" />
                </div>
            </div>
            <div class="custom-input">
                <label>Poltrona:</label>
                <?php for($i = 0; $i < 44; $i++) { ?>
                    <?php if(($i) % 22 == 0) { ?>
                        <div class="d-flex flex-row flex-wrap div">
                    <?php } ?>
                    <div class="poltrona_box">
                        <span class="poltrona" onclick="selected('poltrona_<?= $i + 1 ?>')" id="poltrona_<?= $i + 1 ?>">
                            <input type="checkbox" name="poltrona_id" disabled="" value="<?= $i+1?>"/>
                        </span>
                    </div>
                    <?php if(($i + 1) % 22 == 0) { ?>
                    </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="custom-input">
                <button class="btn add" type="submit">Cadastrar</button>
            </div>
        </form>
    </div>
</div>

<script>
    function selected($id)
    {
        let classList =  document.getElementById($id).closest(".poltrona").classList;
        if (classList.contains('selecionado')) {
            classList.remove('selecionado')
        } else {
            classList.add('selecionado')
        }
    }

    var onibus = JSON.parse(<?= json_encode($onibuss)?>);
    function onibusSelecionado($id)
    {
        console.log($id?.value, onibus);
    }
</script>