<div class="box">
    <div class="box-header">
        <h2 class="title">
            Editar Usuário
        </h2>
    </div>
    <div class="box-content">
        <form class="form" action="./<?= $data->getId() ?>" method="POST">
            <div class="custom-input">
                <label>Nome: </label>
                <input type="text" name="nome" value="<?= $data->getNome() ?>"/>
            </div>
            <div class="custom-input">
                <label>Email:</label>
                <input type="text" name="email" value="<?= $data->getEmail() ?>"/>
            </div>
            <div class="custom-input">
                <label>Cpf:</label>
                <input type="text" name="cpf" value="<?= $data->getCpf() ?>"/>
            </div>
            <div class="custom-input">
                <button class="btn add" type="submit">Cadastrar</button>
            </div>
        </form>
    </div>
</div>