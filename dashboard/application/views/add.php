<div class="card-body">
	<div class="single-tale">	
		<div class="col-md-10">
			<?php echo form_open_multipart('panel/add_content/'.$uri ,'role="form"'); ?>
				<div class="form-group">
					<table class="table table-bordered text-center">
						<tr>
							<td><label>Status :</label></td>
							<td>	
								<input checked="" type="radio" name="status" value="1"  > Active 
								<input type="radio" name="status" value="0" > Passive 
							</td>
						</tr>
						<tr>
							<td><label>Name :</label></td>
							<td>	
								<input required=""  type="text" name="name" class="form-control-sm">
							</td>
						</tr>
						<?php if ($uri == "product_item") { ?>
						<tr>
							<td><label>Text :</label></td>
							<td>	
								<textarea  name="product_body" class="form-control form-control-lg" ></textarea>
							</td>
						</tr>
						<?php }?>

						<?php if ($uri == "product_item" || $uri == "product_sub_category") {   ?>	
							<tr>
								<td><label> Main category* : </label></td>
								<div>
									<td>
										<select name="main" class="form-control form-control-sm" id="exampleFormControlSelect1">
									     	<?php foreach ($main as $key => $value) { ?>
									      		<option value="<?php echo $value['relation_id'];?>" ><?php echo $value['name']; ?></option>
									  		<?php } ?>
									    </select>
									</td>
								</div>
							</tr>
						<?php } ?>	

						<?php if ($uri == "product_item") {   ?>
							<tr>
								<td><label> Sub category* : </label></td>
								<div>
									<td>
										<select name="sub" class="form-control form-control-sm" id="exampleFormControlSelect1">
											<?php foreach ($sub as $key => $value) { ?>
									      		<option value="<?php echo $value['relation_id']; ?>" selected ><?php echo $value['name']; ?></option>
									  		<?php } ?>										      
									    </select>
									</td>
								</div>
							</tr>
							<tr>
				                <td>Price of product* :</td>
				                <td><input required=""  value="" type="text" name="price" class="form-control-sm">$</td>
			            	</tr>
							<tr>
								<td><label> Color of product* : </label></td>
								<div>
									<td>
										<select required="" style="width: 62%;" name="color[]" class="js-select2" multiple="multiple">
										<?php foreach ($color as $key => $value) {  ?>
											<option value="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></option>
										<?php } ?>											
										</select>
										<div class="dropDownSelect2" ></div>
									</td>
								</div>
							</tr>
							<tr>
								<td><label> Size of product* : </label></td>
								<div>
									<td>
										<select style="width: 62%;" name="size[]" class="js-select2" multiple="multiple">
										<?php foreach ($size as $key => $value) {  ?>
											<option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>	
										<?php } ?>											
										</select>
										<div class="dropDownSelect2" ></div>
									</td>
								</div>
							</tr>
						<?php } ?>	

						<?php if ($uri != "product_sub_category" ) {   ?>
							<tr>
								<td><label>Image* :</label></td>
								<div style="margin-left: 250px">
								<td><input <?php  if ($uri == "product_item"){ ?> multiple name="files[]" <?php } else { ?> name="fileupload" <?php } ?> required  type="file" value="Faylı yüklə" ></td>
								</div>
							</tr>
						<?php } ?>	

					</table>
				</div>	
				<input style="margin-top: 10px" name="update" type="submit" class="btn btn-primary" value="Submit">
				<a href="<?php echo base_url('./panel/'.$uri) ?>" style="margin-top: 10px" name="cancel" type="submit" class="btn btn-primary">Cancel</a>
				</form>
			</div>
		</div>						
	</div>
</div>