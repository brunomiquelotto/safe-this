<h1>Registro de Ocorrências </h1>
<h3 class="mg-t-10">Para criar uma ocorrência, clique em novo!</h3>
<a href="<?=HOME_URI?>/ocurrences/create" class="button success ripple mg-t-10">Novo</a>

<div class="center-all">
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
					<td><?=$ocurrence['Ocurrence_Id']?></td>
					<td><?=$ocurrence['Sector_Id']?></td>
					<td><?=$ocurrence['Ocurrence_Priority_Id']?></td>
					<td><?=$ocurrence['Ocurrence_Date']?></td>
					<td><?=$ocurrence['Ocurrence_Id']?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>