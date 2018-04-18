<h1>Tabela de Responsáveis</h1>

<a href="<?=HOME_URI?>/users/create" class="button success ripple mg-t-10">Novo</a>

<div class="center-all">
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Função</th>
                <th>Ações</th>
            </tr>
        </thead>
        <?php foreach ($this->model->users as $user) { ?>
        <tr>
            <td><?=$user['Name']?></td>
            <td><?=$user['Email']?></td>
            <td><?=$user['Profile']?></td>
            <td>
                <a href="<?=HOME_URI?>/users/edit/<?=$user['User_Id']?>" class="button small info mg-t-10">Editar</a>
                <a href="<?=HOME_URI?>/users/delete/<?=$user['User_Id']?>" class="button small danger mg-t-10">Excluir</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>