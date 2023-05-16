<div class="box listar">
    <div class="box-header d-flex flex-row">
        <h2 class="title">Lista de Terminais</h2>
        <div class="ml-auto header-actions">
            <a class="btn light" href="<?= getLink("")?>">Home</a>
            <a class="btn add" href="<?= getLink("terminais/cadastrar/")?>">Cadastrar Terminal</a>
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
                    <div class="actions">
                        <a class="btn edit" href="<?= getLink("terminais/editar/" . $d->getId())?>">Editar</a>
                        <a class="btn remove" href="<?= getLink("terminais/remover/" . $d->getId())?>">Remover</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>