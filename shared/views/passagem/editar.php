<div class="box">
    <div class="box-header">
        <h2 class="title">
            Cadastrar Ônibus
        </h2>
    </div>
    <div class="box-content">
        <form class="form" action="./<?= $data['onibus']->getId()?>" method="POST">
            <div class="custom-input">
                <label>EmpresaNome:</label>
                <input type="text" name="empresa" value="<?= $data['onibus']->getEmpresa()?>"/>
            </div>
            <div class="custom-input">
                <label>Linha</label>
                <input type="text" name="linha" value="<?= $data['onibus']->getLinha() ?>"/>
            </div>
            <div class="custom-input">
                <label>Local Saída:</label>
                <input type="text" name="local_partida" value="<?= $data['onibus']->getLocalPartida() ?>"/>
            </div>
            <div class="custom-input">
                <label>Local Chegada:</label>
                <input type="text" name="local_destino" value="<?= $data['onibus']->getDestino()?>"/>
            </div>
            <div class="custom-input">
                <label>Horário Saída:</label>
                <input type="datetime-local" name="hora_saida" value="<?= $data['onibus']->getHoraSaida()?>"/>
            </div>
            <div class="custom-input">
                <label>Horário Chegada:</label>
                <input type="datetime-local" name="hora_chegada" value="<?= $data['onibus']->getHoraChegada()?>"/>
            </div>
            <div class="custom-input">
                <label>Terminal:</label>
                <select name="terminal_id">
                    <?php foreach($data['terminais'] as $terminal) { ?>
                        <option value="<?= $terminal->getId()?>" <?= $terminal->getId() === $data["onibus"]->getTerminal() ?  "selected" : ""?>><?= $terminal->getNome()?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="custom-input">
                <label>Duração:</label>
                <input type="number" min="1" name="duracao" value="<?= $data['onibus']->getDuracao()?>"/>
            </div>
            <div class="custom-input">
                <button class="btn add" type="submit">Editar</button>
            </div>
        </form>
    </div>
</div>