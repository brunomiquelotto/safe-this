<h1>Últimas ocorrências</h1>
<h3 class="mg-t-10">Para criar uma ocorrência, clique em novo!</h3>

<a href="<?=HOME_URI?>/ocurrences/create" class="button success ripple mg-t-10">Novo</a>

<div class="mg-t-10">
	<label>Quantidade a exibir</label>
	<select class="form-control small">
		<option value="5">5</option>
		<option value="5">10</option>
		<option value="5">25</option>
		<option value="5">50</option>
	</select>
</div>

d<div class="center-all">
	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>Local</th>
				<th>Prioridade</th>
				<th>Data</th>
				<th>N. Arquivos</th>
				<?php if ($this->logged_in): ?>
				<th>Ações</th>
				<?php endif ?>

			</tr>
		</thead>
		<tbody>
			<?php foreach ($this->model->ocurrences as $ocurrence): ?>
				<tr>
					<td><?=$ocurrence['Id']?></td>
					<td><?=$ocurrence['Place']?></td>
					<td><?=$ocurrence['Priority']?></td>
					<td><?=date('d/m/Y H:i:s', strtotime($ocurrence['Opening_Date']))?></td>
					<td><?=$ocurrence['Files']?></td>
					<?php if ($this->logged_in): ?>
					<td>
						<a href="<?=$this->model->edit_url . $ocurrence['Id']?>" class="button success small">Editar</a>
					</td>
					<?php endif ?>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>