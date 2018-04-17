<h2>Locais para ocorrências</h2>

<a href="<?=HOME_URI?>/places/create" class="button success ripple mg-t-10">Novo</a>

<div class="center-all">
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
                <td><?=date('d/m/Y H:i:s', strtotime($place['Last_Ocurrence'])) ?? 'Não há' ?></td>
                <td>
                    <a href="<?=HOME_URI?>/places/edit/<?=$place['Sector_Id']?>">Editar</a>
                    <a href="<?=HOME_URI?>/places/delete/<?=$place['Sector_Id']?>">Excluir</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>