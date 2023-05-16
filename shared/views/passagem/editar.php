<?php
    $onibus = $data['onibus'];
    $poltronasIds = [];

    foreach ($data['poltronas'] as $poltrona) {
        $poltronasIds[$poltrona->getNumeracao()] = $poltrona;
    }
?>
<div class="box">
    <div class="box-header">
        <h2 class="title">
            Cadastrar Passagem
        </h2>
    </div>
    <div class="box-content">
        <div class="custom-input">
            <label>Cliente:</label>
            <select name="cliente_id">
                <?php foreach($data['clientes'] as $cliente) { ?>
                    <option value="<?= $cliente->getId()?>"><?= $cliente->getNome()?></option>
                <?php } ?>
            </select>
        </div>
        <div class="custom-input" style="display:none">
            <label>Ônibus:</label>
            <select name="onibus_id" onchange="onibusSelecionado(this)">
                <?php foreach($data['onibus'] as $onibus) { ?>
                    <option value="<?= $onibus->getId()?>"><?= $onibus->getEmpresa()?>|<?= $onibus->getLinha()?>|<?= $onibus->getHoraSaida()?></option>
                <?php } ?>
            </select>
        </div>
        <div class="custom-input onibus-info">
            <div class="item">
                <div class="item-h">
                    <div class="label">
                        Empresa:
                    </div>
                    <div class="value">
                        <?= $onibus->getEmpresa(); ?>
                    </div>
                </div>
                <div class="item-h">
                    <div class="label">
                        Linha:
                    </div>
                    <div class="value">
                        <?= $onibus->getLinha(); ?>
                    </div>
                </div>
                <div class="item-h">
                    <div class="label">
                        Terminal:
                    </div>
                    <div class="value">
                        <?= $onibus->getTerminalObj()->getNome(); ?>
                    </div>
                </div>
                <div class="combo-item d-flex">
                    <div class="item-h">
                        <div class="label">
                            Local. Partida:
                        </div>
                        <div class="value">
                            <?= $onibus->getLocalPartida(); ?>
                        </div>
                    </div>
                    <div class="item-h">
                        <div class="label">
                            Local. Chegada:
                        </div>
                        <div class="value">
                            <?= $onibus->getDestino(); ?>
                        </div>
                    </div>
                </div>
                <div class="combo-item d-flex">
                    <div class="item-h">
                        <div class="label">
                            Horário Partida:
                        </div>
                        <div class="value">
                            <?= $onibus->getHoraSaida(); ?>
                        </div>
                    </div>
                    <div class="item-h">
                        <div class="label">
                            Horário Chegada:
                        </div>
                        <div class="value">
                            <?= $onibus->getHoraChegada(); ?>
                        </div>
                    </div>
                    <div class="item-h">
                        <div class="label">
                            Duração:
                        </div>
                        <div class="value">
                            <?= $onibus->getDuracao(); ?> minutos
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="custom-input">
            <label>Poltronas:</label>
            <?php for($i = 0; $i < 44; $i++) { ?>
                <?php if(($i) % 22 == 0) { ?>
                    <div class="d-flex flex-row flex-wrap div">
                <?php } ?>
                <div class="poltrona_box">
                    <span class="poltrona <?= isset($poltronasIds[$i + 1]) && $data["passagem"]->getId() != $poltronasIds[$i + 1]->getPassagem() ?  "indisponivel" : ( isset($poltronasIds[$i + 1]) && $data["passagem"]->getId() == $poltronasIds[$i + 1]->getPassagem() ? "selecionado" : "")  ?>" onclick="selected('poltrona_<?= $i + 1 ?>')" id="poltrona_<?= $i + 1 ?>">
                        <?= $i + 1?>
                        <input type="radio" name="poltrona_id" hidden value="<?= $i+1?>"/>
                    </span>
                </div>
                <?php if(($i + 1) % 22 == 0) { ?>
                </div>
                <?php } ?>
            <?php } ?>
        </div>
        <div class="custom-input">
            <a href="<?= getLink("Passagem/remover/" . $data["passagem"]->getId())?>" class="btn remove">Remover</a>
        </div>
    </div>
</div>