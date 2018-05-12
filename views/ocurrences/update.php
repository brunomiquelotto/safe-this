<div class="flex-container align-middles space-between">
    <h1 class="page-title">Atualização de ocorrência</h1>
    <a href="<?=HOME_URI?>/ocurrences" class="button back small">Voltar</a>
</div>


<div style="width:50%">
     <form action="<?=HOME_URI?>/ocurrences/save/<?=$this->model->ocurrences['Ocurrence_id']?>" enctype="multipart/form-data" method="post"> 
         <div class="form-group">
            <select class="form-control" name="Ocurrence_Priority_Id">
                    <option value="0">Status</option>
                <?php foreach($this->model->priorities as $pri) { ?>
                    <?php ?>
                    <option value="<?=$pri['Ocurrence_Priority_Id']?>" <?php if($this->model->update[0]["Ocurrence_Priority_Id"] == $pri['Ocurrence_Priority_Id']){echo "selected";}?> >
                        <?=$pri['Description']?>                    
                    </option>
                <?php } ?>
            </select>
        </div>
         <div class="form-group">
            <select class="form-control" name="Ocurrence_Status_Id">
                    <option value="0">Status</option>
                <?php foreach($this->model->status as $up) { ?>
                    <?php ?>
                    <option value="<?=$up['Ocurrence_Status_Id']?>" <?php if($this->model->update[0]["Ocurrence_Status_Id"] == $up['Ocurrence_Status_Id']){echo "selected";}?> >
                        <?=$up['Description']?>                    
                    </option>
                <?php } ?>
            </select>
        </div>
         <div class="form-group">
            <textarea class="form-group" name="Status_Feedback" style="width:300px;" placeholder="Dê um feedback!"></textarea>
        </div>
         <div class="form-group">
             <select class="form-control" name="Responsible">
                    <option value="0">Responsavel</option>
                <?php foreach($this->model->responsible as $res) { ?>
                    <?php ?>
                    <option value="<?=$res['User_Id']?>">
                        <?=$res['Name']?>
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
