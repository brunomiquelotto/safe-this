<div class="card" style="width: 100%;">

    <header class="flex-container align-middles space-between card-header">
        <h1>Registrar nova ocorrência</h1>
        <a href="<?=HOME_URI?>/ocurrences">Voltar</a>
    </header>

    <section class="card-content">
        <div style="width:50%">
            <form action="<?=HOME_URI?>/ocurrences/save" method="post" enctype="Multipart/form-data">       
                    <select class="form-control small" name="Sector_Id">
                    <option value="0">Selecione um Local</option>
                        <?php foreach($this->model->places as $place) { ?>
                            <option value="<?=$place['Sector_Id']?>">
                                <?=$place['Name']?>
                            </option>
                        <?php } ?>
                    </select>   
                    <div class="form-group">       
                    <select class="form-control small" name="Ocurrence_Priority_Id"> 
                        <option value="0">Prioridade</option>           
                        <?php foreach($this->model->priorities as $priort) { ?>
                            <option value="<?=$priort['Ocurrence_Priority_Id']?>">
                                <?=$priort['Description']?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="textarea" name="Description" class="form-control large" placeholder="Descreva a ocorrência">
                    </div>
                    <div class="form-group">
                        <input type="email" name="Reporter_Email" class="form-control large" placeholder="Informe seu E-mail (opcional)">
                    </div>
                    <div class="form-group">
                        <input type="text" name="Reporter_CPF" class="form-control large" maxlength="14" OnKeyPress="GeneralFunctions.Format('###.###.###-##', this)" placeholder="Informe seu CPF (opcional)" >
                    </div>
                    <div class="form-group" id="Images">
                        <input type="file" name="Image[]" id="Image_1" accept="image/png, image/jpeg" class="form-control-file">
                        <label for="Image_1" class="display-block">Anexar arquivo</label>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Salvar" class="button success ripple"/>
                    </div>        
            </form>
        </div>
    </section>
</div>

        <script>
            var added = 1;
            var Image_1 = document.getElementById('Image_1');
            Image_1.addEventListener('change', onAddedFile);
            function onAddedFile() {
                var divImages = document.getElementById('Images');
                var convertedElement = getTemplate(++added);
                convertedElement[0].addEventListener('change', onAddedFile);
                convertedElement[0].addEventListener('change', Components.FormControlFile.OnChangeHandler.bind(convertedElement[0]));
                divImages.appendChild(convertedElement[0]);
                divImages.appendChild(convertedElement[0]);
            }

            function getTemplate(id) {
                return createElementsFromHTML('<input type="file" name="Image[]" id="Image_' + id + '" accept="image/png, image/jpeg" class="form-control-file"><label class=" display-block mg-t-10" for="Image_' + id + '">Anexar arquivo</label>');
            }
        </script>