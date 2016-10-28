<div class="row">
    <div class="col-md-12">
        <form action="" method="post" enctype="multipart/form-data" class="font-form">
            <fieldset class="options fix">
                <div class="main">
                    <div class="field">
                        <label for="font">Select font</label>
                        <select name="font-form" id="font">
                            <?php
                            sort($result, SORT_NATURAL | SORT_FLAG_CASE);
                            foreach ($result as $file) {
                                $selected = '';
                                if ($_POST['font-form'] == $file) $selected = 'selected';
                                echo "<option value=\"" . $file . "\" " . $selected . ">" . $file . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="field col-md-4">
                        <label for="size">Font size</label><br/>
                        <input name="size-form" type="number" min="1" max="100" value="<?=$size?>" step="1" id="size"/>
                    </div>
                    <div class="field col-md-4">
                        <label for="weight">Font weight</label><br/>
                        <select name="weight-form" id="weight">
                            <?php
                            for ($i = 100; $i <=900; $i+=100) {
                                $selected = '';
                                if ($_POST['weight-form'] == $i) $selected = 'selected';
                                echo "<option value=\"" . $i . "\" " . $selected . ">" . $i . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="field col-md-4">
                        <label for="style">Font style</label><br/>
                        <select name="style-form" id="style">
                            <option value="normal" <?php if($_POST['style-form'] == 'normal'){echo "selected='selected'";}?>>normal</option>
                            <option value="italic" <?php if($_POST['style-form'] == 'italic'){echo "selected='selected'";}?>>italic</option>
                            <option value="oblique" <?php if($_POST['style-form'] == 'oblique'){echo "selected='selected'";}?>>oblique</option>
                        </select>
                    </div>
                </div>
            </fieldset>
            <input type="submit" value="Применить стили" name="submit" class="add add-upd"/>
        </form>
        <div class="add add-font">
            <a href="">Добавить новый шрифт</a>
        </div>
    </div>
</div>