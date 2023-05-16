<div class="box listar">
    <div class="box-header d-flex flex-row">
        <h2 class="title">Lista de Onibus</h2>
        <div class="ml-auto header-actions">
            <a class="btn light" href="<?= getLink("")?>">Home</a>
            <a class="btn add" href="<?= getLink("onibus/cadastrar/")?>">Cadastrar Ônibus</a>
        </div>
    </div>
    <div class="box-content">
        <div class="items">
            <?php foreach( $data as $d ) { ?>
                <div class="item">
                    <div class="item-h">
                        <div class="label">
                            Empresa:
                        </div>
                        <div class="value">
                            <?= $d->getEmpresa(); ?>
                        </div>
                    </div>
                    <div class="item-h">
                        <div class="label">
                            Linha:
                        </div>
                        <div class="value">
                            <?= $d->getLinha(); ?>
                        </div>
                    </div>
                    <div class="item-h">
                        <div class="label">
                            Terminal:
                        </div>
                        <div class="value">
                            <?= $d->getTerminalObj()->getNome(); ?>
                        </div>
                    </div>
                    <div class="combo-item d-flex">
                        <div class="item-h">
                            <div class="label">
                                Local. Partida:
                            </div>
                            <div class="value">
                                <?= $d->getLocalPartida(); ?>
                            </div>
                        </div>
                        <div class="item-h">
                            <div class="label">
                                Local. Chegada:
                            </div>
                            <div class="value">
                                <?= $d->getDestino(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="combo-item d-flex">
                        <div class="item-h">
                            <div class="label">
                                Horário Partida:
                            </div>
                            <div class="value">
                                <?= $d->getHoraSaida(); ?>
                            </div>
                        </div>
                        <div class="item-h">
                            <div class="label">
                                Horário Chegada:
                            </div>
                            <div class="value">
                                <?= $d->getHoraChegada(); ?>
                            </div>
                        </div>
                        <div class="item-h">
                            <div class="label">
                                Duração:
                            </div>
                            <div class="value">
                                <?= $d->getDuracao(); ?> minutos
                            </div>
                        </div>
                    </div>
                    <div class="actions">
                        <a class="btn edit" href="<?= getLink("onibus/editar/" . $d->getId())?>">Editar</a>
                        <a class="btn remove" href="<?= getLink("onibus/remover/" . $d->getId())?>">Remover</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>