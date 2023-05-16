<?php
    $onibus = $data['onibus'][0];
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
        <form class="form" action="." method="POST">
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
                <input type="number" name="terminal_id" value="<?= $onibus->getTerminal()?>"/>
            </div>
            <div>
                <label>Informações do Ônibus:</label>
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
            </div>
            <div class="custom-input">
                <label>Poltrona:</label>
                <?php for($i = 0; $i < 44; $i++) { ?>
                    <?php if(($i) % 22 == 0) { ?>
                        <div class="d-flex flex-row flex-wrap div">
                    <?php } ?>
                    <div class="poltrona_box">
                        <span class="poltrona <?= isset($poltronasIds[$i + 1]) ?  "indisponivel" : ""  ?>" onclick="selected('poltrona_<?= $i + 1 ?>')" id="poltrona_<?= $i + 1 ?>">
                            <input type="radio" <?= isset($poltronasIds[$i + 1]) ?  "disabled" : ""  ?> name="poltrona_id" value="<?= $i+1?>"/>
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

        var poltronas = (document.getElementsByClassName("poltrona"));

        for (let i = 0; i < poltronas?.length; i++) {
            poltronas[i].classList.remove('selecionado');
        }

        let classList =  document.getElementById($id).closest(".poltrona").classList;
        if (classList.contains('selecionado')) {
            classList.remove('selecionado')
        } else {
            classList.add('selecionado')
        }
    }
</script>