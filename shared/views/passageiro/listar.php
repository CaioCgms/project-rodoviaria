<div class="box listar">
    <div class="box-header d-flex flex-row">
        <h2 class="title">Lista de Clientes</h2>
        <div class="ml-auto header-actions">
            <a class="btn light" href="<?= getLink("")?>">Home</a>
            <a class="btn add" href="<?= getLink("passageiro/cadastrar/")?>">Cadastrar Passageiro</a>
        </div>
    </div>
    <div class="box-content">
        <div class="items">
            <?php foreach( $data as $d ) { ?>
                <div class="item">
                    <div class="item-h">
                        <div class="label">
                            Nome:
                        </div>
                        <div class="value">
                            <?= $d->getNome(); ?>
                        </div>
                    </div>
                    <div class="item-h">
                        <div class="label">
                            Email:
                        </div>
                        <div class="value">
                            <?= $d->getEmail(); ?>
                        </div>
                    </div>
                    <div class="item-h">
                        <div class="label">
                            CPF:
                        </div>
                        <div class="value">
                            <?= $d->getCpf(); ?>
                        </div>
                    </div>
                    <div class="actions">
                        <a class="btn edit" href="<?= getLink("passageiro/editar/" . $d->getId())?>">Editar</a>
                        <a class="btn remove" href="<?= getLink("passageiro/remover/" . $d->getId())?>">Remover</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>