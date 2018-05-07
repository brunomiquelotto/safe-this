<div class="flex-container align-middles space-between">
    <h1 class="page-title">Locais para ocorrências</h1>
    <a href="<?=HOME_URI?>/places/create" class="button new small">Novo</a>
</div>

<div class="center-all mg-t-25">
    <table class="table">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Em aberto</th>
                <th>Última ocorrência</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($this->model->places as $place) { ?>
            <tr>
                <td><?=$place['Name']?></td>
                <td><?=$place['Open_Ocurrences']?></td>
                <td><?=$place['Last_Ocurrence'] ? date('d/m/Y H:i:s', strtotime($place['Last_Ocurrence'])) : 'Não há' ?></td>
                <td>
                    <a href="<?=HOME_URI?>/places/edit/<?=$place['Sector_Id']?>" class="button info small">Editar</a>
                    <a href="<?=HOME_URI?>/places/delete/<?=$place['Sector_Id']?>" class="button danger small" onclick="return confirm('Tem certeza que deseja deletar este registro?')">Excluir</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>