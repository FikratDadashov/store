<div class="single-tale">	
	<div class="table-responsive">
		<div class="col-md-9">
			<?php if ($uri == "slide") {   ?>							       
			<?php echo form_open_multipart('panel/updateslides/'.$id.'/'.$lan ,'role="form"'); ?>
			<?php foreach ($data as $keys => $values){  ?>
			<div class="form-group">
				<table class="table table-bordered text-center">
					<?php if ($lan == "" ) { ?>
						<tr>
							<td><label>Status of the slide</label></td>
							<td>	
								<?php if ($values['status']==1) { ?>
								<input type="radio" name="aktiv" value="1" checked > Active <input type="radio" name="aktiv" value="0" > Passive
								<?php } ?>
								<?php if ($values['status']==0) { ?>
									<input type="radio" name="aktiv" value="1" > Active 
									<input type="radio" name="aktiv" value="0" checked > Passive
								<?php } ?>
							</td>
						</tr>

						<tr>
							<td>
								<label>Change the photo of the slide </label>
								<input name="fileupload" type="file" value="<?php $values['image'];?>" >
							</td>
							<div>
								<td id="tester">
									<img width="150px" height="150px" src="<?php echo base_url('../assets/uploads/'.$values['image']) ?>" alt="picture" title="" class="img-fluid">
									<a id="delete_photo" style="color: red; cursor: pointer;" >Delete</a>
								</td>
							</div>
						</tr>
					<?php } ?>
					<?php if ($lan != "" ) {  ?>
						<tr>
							<td><label class="my-3 mr-2">Slide header</label></td>					
							<td><input required="" value="<?php echo($values['title']);?>" type="text" name="title" class="form-control form-control-lg">
							</td>
						</tr>
						<tr>
							<td><label class="my-3 mr-2">Slide text</label></td>					
							<td><input required="" value="<?php echo($values['body']);?>" type="text" name="body" class="form-control form-control-lg">
							</td>
						</tr>
					<?php } ?>
				</table>
			</div>	
			<?php } ?>
			<?php } ?>

			<?php if ($uri == "product_main_category") {   ?>							       
			<?php echo form_open_multipart('panel/updatemain/'.$id.'/'.$lan ,'role="form"'); ?>
			<?php foreach ($data as $keys => $values) { ?>
			<div class="form-group">
				<table class="table table-bordered text-center" >
				<?php if ($lan == "" ) { ?>
					<tr>
						<td><label> Status</label></td>
						<td>	
							<?php if ($values['status']==1) { ?>
								<input type="radio" name="aktiv" value="1" checked > Active 
								<input type="radio" name="aktiv" value="0" > Passive
							<?php } ?>
							<?php if ($values['status']==0) { ?>
								<input type="radio" name="status" value="1" > Active 
								<input type="radio" name="status" value="0" checked > Passive 
							<?php } ?>
						</td>
					</tr>			
					<tr>
						<td><label>Image* : </label>
						<input name="fileupload" type="file" value="<?php $values['image'];?>" ></td>
						<div >
						<td id="tester">
							<img width="50px" height="50px" src="<?php echo base_url('../assets/uploads/'.$values['image']) ?>" alt="picture" title="" class="img-fluid">
							<a id="delete_photo"  style="color: red; cursor: pointer;" >Delete</a>
						</td>
						</div>
					</tr>
				<?php } ?>
				<?php if ($lan != "" ) {  ?>
					<tr>
						<td><label> Name :</label></td>
						<td>
							<input value="<?php echo($values['name']);?>" type="text" name="name" class="form-control form-control-lg">
						</td>
					</tr>
					<tr>
						<td><label> Text :</label></td>
						<td>
							<textarea name="text" class="form-control form-control-lg" ><?php echo($values['body']);?></textarea>
						</td>
					</tr>
				<?php } ?>
				</table>
			</div>	
			<?php } ?>
			<?php } ?>


			<?php if ($uri == "product_sub_category") {   ?>							       
			<?php echo form_open_multipart('panel/updatesub/'.$id.'/'.$lan ,'role="form"'); ?>
			<?php foreach ($data as $keys => $values){  ?>
			<div class="form-group">				
				<table  class="table table-bordered text-center" >
				<?php if ($lan == "" ) { ?>
					<tr>
						<td><label> Status</label></td>
						<td>	
							<?php if ($values['status']==1) { ?>
							<input type="radio" name="status" value="1" checked > Active 
							<input type="radio" name="status" value="0" > Passive 
							<?php } ?>
							<?php if ($values['status']==0) { ?>
								<input type="radio" name="status" value="1" > Active 
								<input type="radio" name="status" value="0" checked > Passive 
							<?php } ?>
						</td>
					</tr>
					<tr>
						<td><label> Main category* : </label></td>
						<div >
							<td>
								<select name="main" class="form-control form-control-lg" id="exampleFormControlSelect1">
							     	<?php foreach ($main as $key => $value) {
							     	if ($values['main_cat_id'] == $value['relation_id']) { ?>
							      		<option value="<?php echo $value['relation_id']; ?>" selected ><?php echo $value['name']; ?></option>
							  		<?php } 
							  		else{  ?>
							      		<option value="<?php echo $value['relation_id']; ?>" ><?php echo $value['name']; ?></option>
							  		<?php } 
							  	} ?>
							    </select>
							</td>
						</div>
					</tr>
				<?php } ?>
				<?php if ($lan != "" ) {  ?>
					<tr>
						<td width="50%"><label> Name :</label></td>
						<td><input value="<?php echo($values['name']);?>" type="text" name="name" class="form-control form-control"></td>
					</tr>
				<?php } ?>
				</table>
			</div>	
			<?php } ?>
			<?php } ?>

			<?php if ($uri == "product_item" && $lan =="") { ?>
			<?php echo form_open_multipart('panel/update_product_item/'.$id ,'role="form"'); ?>
			<?php foreach ($data as $keys => $values){ ?>
			<div class="col-md-24" style="width: 850px">							
				<table class="table table-bordered text-center" >
					<tr>
						<td><label> Status :</label></td>
						<td>	<?php if ($values['status']==1) : ?>
							<input type="radio" name="aktiv" value="1" checked > Active
								<input type="radio" name="aktiv" value="0" > Passive 
							<?php endif;?>
							<?php if ($values['status']==0) : ?>
							<input type="radio" name="aktiv" value="1" > Active 
								<input type="radio" name="aktiv" value="0" checked > Passive 
							<?php endif;?>
						</td>
					</tr>
					<tr>
						<td><label> Main category* : </label></td>
						<div>
							<td>
								<select name="main" class="form-control form-control-lg" >
						     	<?php foreach ($main as $key => $value) {
						     	if ($values['main_cat_id'] == $value['relation_id']) { ?>
						      		<option value="<?php echo $value['relation_id']; ?>" selected ><?php echo $value['name']; ?></option>
						  		<?php } 
						  		else{  ?>
						      		<option value="<?php echo $value['relation_id']; ?>" ><?php echo $value['name']; ?></option>
						  		<?php } } ?>
							    </select>
							</td>
						</div>
					</tr>
					<tr>
						<td><label> Sub category* : </label></td>
						<div >
							<td>
								<select name="sub" class="form-control form-control-lg ">
								<?php foreach ($sub as $key => $value) {
						     	if ($values['sub_cat_id'] == $value['relation_id']) { ?>
						      		<option value="<?php echo $value['relation_id']; ?>" selected ><?php echo $value['name']; ?></option>
						  		<?php } else{  ?>
						      		<option value="<?php echo $value['relation_id']; ?>" ><?php echo $value['name']; ?></option>
						  		<?php }} ?>									      
							    </select>
							</td>
						</div>
					</tr>

					<tr>
		                <td>Price of product* :</td>
		                <td><input required="" value="<?php echo ($values['price']);?>" type="text" name="price" class="form-control-sm">$</td>
		            </tr>

					<tr>
						<td><label> Color of product* : </label></td>
						<div>
							<td>
								<select required="" style="width: 100%;" name="color[]" class="js-select2" multiple="multiple">
								<?php $colors = explode(",", $values['color_id']);  $i=0;
									foreach ($color as $key => $value) { 
										if ($colors[$i] == $value['name']) { ?>
											<option selected="" value="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></option>
										<?php $i++; } else{ ?>
								  <option value="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></option>
								<?php }  }?>										
								</select>
								<div class="dropDownSelect2" ></div>
							</td>
						</div>
					</tr>
					<tr>
						<td><label> Size of product* : </label></td>
						<div>
							<td>
								<select style="width: 100%;" name="size[]" class="js-select2" multiple="multiple">
								<?php $sizes = explode(",", $values['size_id']);  $j=0;
									foreach ($size as $key => $value) { 
										if ($sizes[$j] == $value['id']) { ?>
									<option selected="" value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
										<?php $j++; } else{ ?>
								  	<option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
								<?php }  }?>
								
								</select>
								<div class="dropDownSelect2"></div>
							</td>
						</div>
					</tr>

					<tr>
						<td><label> Image : </label>
						<input name="files[]" multiple type="file" value="<?php $values['image'];?>" ></td>
						<div>
							<td id="tester">
								<?php $array_of_photos = explode(":", $values['image']);
									for ($i=0; $i < count($array_of_photos) ; $i++) { ?>
										
									
							<img width="50px" height="50px" src="<?php echo base_url('../assets/uploads/'.$array_of_photos[$i]) ?>" alt="picture" title="" class="img-fluid">
							<!-- <a id="delete_photo" class="delete_photo" value="<?php $array_of_photos[$i] ?>"  style="color:  red; cursor: pointer;" >Delete</a> -->
							<?php } ?>
								
								<!-- <a id="delete_photo"  style="color:  red; cursor: pointer;" >Delete</a> -->
							</td>
						</div>
					</tr>		
				</table>
			</div>	
			<?php } ?>
			<?php } ?>

			<?php if ($uri == "product_item" && $lan != "") { ?>
			<?php echo form_open_multipart('panel/update_product_item/'.$id.'/'.$lan ,'role="form"'); ?>
			<?php foreach ($data as $keys => $values) { ?>
			<div class="col-md-24" style="width: 850px">
				<table class="table table-bordered text-center" >
					<tr>
						<td><label> Name :</label></td>
						<td><input value="<?php echo($values['name']);?>" type="text" name="name" class="form-control form-control-lg"></td>
					</tr>
					<tr>
						<td><label> Text :</label></td>
						<td>
							<textarea name="text" class="form-control form-control-lg" ><?php echo($values['body']);?></textarea>
						</td>
					</tr>			
				</table>
			</div>	
			<?php } ?>
			<?php } ?>

					<input style="margin-top: 10px" name="update" type="submit" class="btn btn-primary" value="Submit">
					<input style="margin-top: 10px" name="cancel" type="submit" class="btn btn-primary" value="Cancel">	
				</form>
			</div>
		</div>
	</div>			
</div>
