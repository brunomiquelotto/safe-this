<h1>Perfis</h1>

<a href="<?=HOME_URI?>/profiles/create" class="button success ripple mg-t-10">Novo</a>

<div class="center-all">
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <?php foreach ($this->model->profiles as $profile) { ?>
        <tr>
            <td><?=$profile['Description']?></td>
            <td>
                <a href="<?=HOME_URI?>/profiles/edit/<?=$profile['Profile_Id']?>" class="button small info mg-t-10">Editar</a>
                <a href="<?=HOME_URI?>/profiles/delete/<?=$profile['Profile_Id']?>" class="button small danger mg-t-10">Excluir</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>