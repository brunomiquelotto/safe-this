<div class="card">
<header class="card-header flex-container align-middles space-between">
    <h1>Usuários</h1>
    <a href="<?=HOME_URI?>/users/create" class="button new small">Novo</a>
</header>
<section class="card-content center-all">
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
                <a href="<?=HOME_URI?>/users/edit/<?=$user['User_Id']?>" class="icon-edit"></a>
                <a href="<?=HOME_URI?>/users/delete/<?=$user['User_Id']?>" class="icon-excluir" onclick="return confirm('Tem certeza que deseja deletar este registro?')"></a>
            </td>
        </tr>
        <?php } ?>
    </table>
</section>
</div>