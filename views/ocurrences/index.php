<div class="card">
	<header class="card-header flex-container align-middles space-between">
		<h1>Últimas ocorrências</h1>
		<a href="<?=HOME_URI?>/ocurrences/create" class="button new small">Novo</a>
	</header>
	<section class="card-content">
		<div class="mg-t-10">
			<label>Quantidade a exibir</label>
			<select class="form-control small" id="itemsToShow" onchange="changeUrl()">
				<option value="5" <?=$this->model->limit == 5 ? 'selected' : ''?>>5</option>
				<option value="10" <?=$this->model->limit == 10 ? 'selected' : ''?>>10</option>
				<option value="25" <?=$this->model->limit == 25 ? 'selected' : ''?>>25</option>
				<option value="50" <?=$this->model->limit == 50 ? 'selected' : ''?>>50</option>
			</select>
		</div><br><br>

		<div class="center-all">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Local</th>
						<th>Status</th>
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
							<td><?=$ocurrence['Status']?></td>
							<td><?=$ocurrence['Priority']?></td>
							<td><?=date('d/m/Y H:i:s', strtotime($ocurrence['Opening_Date']))?></td>
							<td><?=$ocurrence['Files']?></td>					
							<td>
								<a href="<?=$this->model->visualize_url . $ocurrence['Id']?>" class="icon-visu">Visualizar</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</section>
</div>

<script>
	function changeUrl() {
		var number = document.getElementById('itemsToShow').value;
		window.location = '<?=HOME_URI?>/ocurrences/index/' + number;
	}
</script>