    <div class="card-body">
      <div class="single-tale">
            <div class="table-responsive">
    <?php if ($lan == "") { ?>
			<?php echo form_open_multipart('panel/updatesettings' ,'role="form"'); ?>
        <?php foreach ($data as $keys => $value): ?> 
					<div class="form-group">
            <table class="table table-bordered text-center">
              <tr>
                <th>Edit & Save</th>
              </tr>
              <tr>
                <td>Logo* : <input name="fileupload" type="file" value="Logo" ></td>
                <td id="tester">
                	<img style="width: 20%;" src="<?php echo base_url('../assets/uploads/'.$value['logo']) ?>" alt="picture" title="" class="img-fluid">
                  <a id="delete_photo"  style="color:  red; cursor: pointer;" >Delete</a>
                </td>
              </tr>
              <tr>
                <td>E-Mail* :</td>
                <td><input required="" value="<?php echo  ($value['email']);?>" type="text" name="poct" class="form-control"></td>
              </tr>
              <tr>
                <td>Mobile* :</td>
                <td><input required="" value="<?php echo  ($value['phone']);?>" type="text" name="mobil" class="form-control"></td>       
              </tr>
              <tr>
                <td>Telephone :</td>
                <td><input value="<?php echo  ( $value['telephone']);?>" type="text" name="tel" class="form-control"></td>
              </tr>
              <tr>
                <td>Facebook* :</td>
                <td><input required="" value="<?php echo  ($value['facebook']);?>" type="text" name="face" class="form-control"></td>
              </tr>
              <tr>
                <td>Instagram* :</td>
                <td><input required="" value="<?php echo  ($value['instagram']);?>" type="text" name="ins" class="form-control"></td>
              </tr>
            </table>
					</div>	
        <?php endforeach; ?> 
				<input style="margin-top: 10px" name="update" type="submit" class="btn btn-primary" value="Submit">
        <a href="<?php echo base_url("./panel/settings") ?>"  style="margin-top: 10px; color: white;" name="cancel" type="submit" class="btn btn-primary">Cancel</a>
				<!-- <input style="margin-top: 10px" name="cancel" type="submit" class="btn btn-primary" value="Rədd et"> -->	
			</form>

    <?php } if ($lan != "") { ?>
      <?php echo form_open_multipart('panel/'.$uri.'/'.$id.'/'.$lan ,'role="form"'); ?>
        <?php foreach ($data as $keys => $values): ?>
          <div class="form-group">
            <table class="table table-bordered text-center">
              <!--<tr><td><label> Name :</label></td>
                <td><input value="<?php echo($values['name']);?>" type="text" name="name" class="form-control"></td>
              </tr>
              <tr><td><label> Header :</label></td>
                <td><input value="<?php echo($values['title']);?>" type="text" name="title" class="form-control"></td>
              </tr>
              <tr><td><label> Description :</label></td>
                <td><input value="<?php echo($values['desc']);?>" type="text" name="desc" class="form-control"></td>
              </tr>-->
              <tr><td><label> Contact text :</label></td>
                <td>
                <textarea name="contact_text" class="form-control" ><?php echo($values['contact_text']);?></textarea>
              </td>
              </tr>
              <tr><td><label> Address :</label></td>
                <td><input value="<?php echo($values['address']);?>" type="text" name="address" class="form-control"></td>
              </tr>

              <br>
              <br>
            </table>      
          </div>  
        <?php endforeach; ?>
        <input style="margin-top: 10px" name="update" type="submit" class="btn btn-primary" value="Submit">
        <a href="<?php echo base_url("./panel/settings") ?>"  style="margin-top: 10px; color: white;" name="cancel" type="submit" class="btn btn-primary">Cancel</a> 
      </form>
    <?php } ?>
		</div>
	</div>
</div>
</div>
