<div class="flex-container align-middles space-between">
    <h1 class="page-title">Perfis</h1>
    <a href="<?=HOME_URI?>/profiles/create" class="button new small">Novo</a>
</div>


<div class="center-all mg-t-25">
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
                <a href="<?=HOME_URI?>/profiles/edit/<?=$profile['Profile_Id']?>" class="icon-edit"></a>
                <a href="<?=HOME_URI?>/profiles/delete/<?=$profile['Profile_Id']?>" class="icon-excluir" onclick="return confirm('Tem certeza que deseja deletar este registro?')">Excluir</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>