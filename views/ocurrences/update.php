<div class="flex-container align-middles space-between">
    <h1 class="page-title">Atualização de ocorrência</h1>
    <a href="<?=HOME_URI?>/ocurrences" class="button back small">Voltar</a>
</div>

<div style="width:50%">
     <form action="<?=HOME_URI?>/ocurrences/updatestatus/<?=$this->model->ocurrence['Ocurrence_Id']?>" enctype="multipart/form-data" method="post">
        <input type="hidden" value="<?=$this->model->update['Next_Status']?>" name="Ocurrence_Status_Id">
        <div class="form-group">
            <select class="form-control small" name="Ocurrence_Priority_Id"> 
                <option value="0">Prioridade</option>           
                <?php foreach($this->model->priorities as $priort) { ?>
                    <option value="<?=$priort['Ocurrence_Priority_Id']?>"
                        <?=$priort['Ocurrence_Priority_Id'] == $this->model->update['Priority']? 'selected' : ''?>>
                        <?=$priort['Description']?>
                    </option>
                <?php } ?>
            </select>
        </div>
         <div class="form-group">
            <textarea class="form-control" name="Status_Feedback" placeholder="Resposta ao solicitante"><?=$this->model->update['Status_Feedback']?></textarea>
        </div>
         <div class="form-group">
            <select class="form-control small" name="Responsible"> 
                <option value="0">Responsavel</option>
                <?php foreach ($this->model->users as $user) { ?>
                    <option value="<?=$user['User_Id']?>" 
                        <?=$user['User_Id'] == $this->model->update['Responsible'] ? 'selected' : '' ?>>
                        <?=$user['Name']?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group" id="Images">
            <input type="file" name="Image[]" id="Image_1" accept="image/png, image/jpeg" class="form-control-file">
            <label for="Image_1" class="display-block">Anexar arquivo</label>
        </div>
        <div class="form-group">
            <input type="submit" value="Atualizar" class="button success ripple"/>
        </div>        
    </form>
</div>
