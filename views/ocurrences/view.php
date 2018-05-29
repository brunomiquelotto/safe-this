<div class="card">
	<header class="card-header flex-container align-middles space-between">
		<h3>Visualização da Ocorrência</h3>
		<div>
		<?php foreach($this->model->actions as $action) { ?>
			<a href="<?=$action['Url']?>" class="button small info" style="margin-right: 5px;">
				<?=$action['Description']?>
			</a>
		<?php } ?>
		</div>
	</header>

		<section class="card-content">
			<div>
				<p>
					<span style="font-weight: bold">Local:</span>
					<?=$this->model->ocurrence['Place'] ?>.</p>
					<p>
						<span style="font-weight: bold">Descrição: </span>
						<?=$this->model->ocurrence['Description'] ?>
					</p>
					<p>
						<span style="font-weight: bold">Email: </span> 
						<?=$this->model->ocurrence['Reporter_Email'] ?>.
					</p>
					<p>
						<span style="font-weight: bold">CPF: </span> 
						<?=$this->model->ocurrence['Reporter_CPF'] ?>
					</p>
				</div>
			</section>
		</div>

		<div class="card wrap">
			<header class="card-header flex-container align-middles">
				<h3>Atualizações</h3>
			</header>
			<section class="card-content">
				<?php foreach($this->model->ocurrences as $oc) { ?>
					<div class="update-card mg-t-10">
						<header>
							<span class="title">
								<? echo $oc['Status']." - Prioridade: ".$oc['Priority']?>
								
							</span>
							<span class="subtitle">
								<?php if(isset($oc['Responsible'])){
									echo $oc['Responsible'];
									
								} else {
									echo "Sem responsável!";
								} ?>
							</span>
						</header>
						<section>
							<span class="content">					
								<?=$oc['Status_Feedback']?>
							</span>
						</section>
					</div>
					<?php } ?>
				</section>
			</div>

			<div class="card">
				<header class="card-header flex-container align-middles">
					<h3>Imagens da ocorrência</h3>
				</header>
				<section class="card-content">
					<?php foreach($this->model->ocurrence['Pictures'] as $pic) { ?>
						<div class="card-image"">
							<figure>
								<a href="<?=$pic['src']?>" target="_blank">
									<img src="<?=$pic['src']?>" alt="<?=$pic['title']?>">
								</a>
								<figcaption><?=$pic['title']?></figcaption>
							</figure>
						</div>
						<?php } ?>
					</section>
				</div>