<div class="box">
    <div class="box-header">
        <h2 class="title">
            Cadastrar Ônibus
        </h2>
    </div>
    <div class="box-content">
        <form class="form" action="." method="POST">
            <div class="custom-input">
                <label>EmpresaNome:</label>
                <input type="text" name="empresa"/>
            </div>
            <div class="custom-input">
                <label>Linha</label>
                <input type="text" name="linha"/>
            </div>
            <div class="custom-input">
                <label>Local Saída:</label>
                <input type="text" name="local_partida"/>
            </div>
            <div class="custom-input">
                <label>Local Chegada:</label>
                <input type="text" name="local_destino"/>
            </div>
            <div class="custom-input">
                <label>Horário Saída:</label>
                <input type="datetime-local" name="hora_saida"/>
            </div>
            <div class="custom-input">
                <label>Horário Chegada:</label>
                <input type="datetime-local" name="hora_chegada"/>
            </div>
            <div class="custom-input">
                <label>Terminal:</label>
                <select name="terminal_id">
                    <?php foreach($data['terminais'] as $terminal) { ?>
                        <option value="<?= $terminal->getId()?>"><?= $terminal->getNome()?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="custom-input">
                <label>Duração:</label>
                <input type="number" min="1" name="duracao"/>
            </div>
            <div class="custom-input">
                <button class="btn add" type="submit">Cadastrar</button>
            </div>
        </form>
    </div>
</div>