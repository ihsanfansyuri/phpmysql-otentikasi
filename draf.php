<div class="mb-3">
                    <label for="pengguna" class="form-label">Id</label>
                    <select class="form-select" name="id_pengguna" id="id_pengguna">
                        <option selected><?php echo $row['id_pengguna']; ?></option>
                        <?php

                        foreach ($pengguna as $p) {
                            echo "<option value='$p' ";
                            echo $row['id_pengguna']==$p?'selected="selected"':'' ;
                            echo ">$p</option>";
                        }

                        ?>
                    </select>
                    </div>