<div class="box listar">
    <div class="box-header d-flex flex-row">
        <h2 class="title">Lista de Passagens</h2>
        <div class="ml-auto header-actions">
            <a class="btn light" href="<?= getLink("")?>">Home</a>
            <a class="btn add" href="<?= getLink("onibus/listar/")?>">Cadastrar Passagem</a>
        </div>
    </div>
    <div class="box-content">
        <div class="items">
            <?php foreach( $data as $d ) { ?>
                <div class="item">
                    <div class="combo-item d-flex">
                        <div class="item-h">
                            <div class="label">
                                Passagem ID:
                            </div>
                            <div class="value">
                                <?= $d['passagem']->getId(); ?>
                            </div>
                        </div>
                        <div class="item-h">
                            <div class="label">
                                Passageiro:
                            </div>
                            <div class="value">
                                <?= $d['cliente']->getNome(); ?>
                            </div>
                        </div>
                        <div class="item-h">
                            <div class="label">
                                Poltrona:
                            </div>
                            <div class="value">
                                <?= $d['poltrona']->getNumeracao(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="item-h">
                        <div class="label">
                            Linha:
                        </div>
                        <div class="value">
                            <?= $d['onibus']->getLinha(); ?>
                        </div>
                    </div>
                    <div class="item-h">
                        <div class="label">
                            Terminal:
                        </div>
                        <div class="value">
                            <?= $d['terminal']->getNome(); ?>
                        </div>
                    </div>
                    <div class="combo-item d-flex">
                        <div class="item-h">
                            <div class="label">
                                Local. Partida:
                            </div>
                            <div class="value">
                                <?= $d['onibus']->getLocalPartida(); ?>
                            </div>
                        </div>
                        <div class="item-h">
                            <div class="label">
                                Local. Chegada:
                            </div>
                            <div class="value">
                                <?= $d['onibus']->getDestino(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="combo-item d-flex">
                        <div class="item-h">
                            <div class="label">
                                Horário Partida:
                            </div>
                            <div class="value">
                                <?= $d['onibus']->getHoraSaida(); ?>
                            </div>
                        </div>
                        <div class="item-h">
                            <div class="label">
                                Horário Chegada:
                            </div>
                            <div class="value">
                                <?= $d['onibus']->getHoraChegada(); ?>
                            </div>
                        </div>
                        <div class="item-h">
                            <div class="label">
                                Duração:
                            </div>
                            <div class="value">
                                <?= $d['onibus']->getDuracao(); ?> minutos
                            </div>
                        </div>
                    </div>
                    <div class="actions">
                        <a class="btn edit" href="<?= getLink("passagem/editar/" . $d['passagem']->getId())?>">Editar</a>
                        <a class="btn remove" href="<?= getLink("passagem/remover/" .  $d['passagem']->getId())?>">Remover</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>