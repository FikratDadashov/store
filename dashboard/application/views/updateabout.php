<div class="single-tale">	
	<div class="table-responsive">
		<div class="col-md-10">
			<?php if ($lan == "") { ?>			
				<?php echo form_open_multipart('panel/updateabout/'.$table.'/'.$id ,'role="form"'); ?>
					<?php foreach ($data as $keys => $values): ?>
						<div class="form-group">
							<table class="table table-bordered text-center">
								<br>
								<tr>
									<td>
										<label> Change the photo </label>
										<input name="fileupload" type="file" value="<?php $values['image'];?>" ">
									</td>
									<td id="tester">	
										<div style="margin-left: 250px">
											<img style="width: 50%;" class="img-fluid" src="<?php echo base_url('../assets/uploads/'.$values['image']) ?>" alt="picture" title="" class="pull-right img-rounded">
											<a id="delete_photo"  style="color:  red; cursor: pointer;" >Delete</a>
										</div>
										<br>
									</td>
								</tr>
								<tr>
									<td>
										<label> Change the background image </label>
										<input name="fileupload_2" type="file" value="<?php $values['background_image'];?>" ">
									</td>
									<td>	
										<div style="margin-left: 250px">
											<img style="width: 50%;" class="img-fluid" src="<?php echo base_url('../assets/uploads/'.$values['background_image']) ?>" alt="picture" title="" class="pull-right img-rounded">
										</div>
										<br>
									</td>
								</tr>
								<br>
							</table>			
						</div>	
					<?php endforeach; ?>
					<input style="margin-top: 10px" name="update" type="submit" class="btn btn-primary" value="Submit">
					<input style="margin-top: 10px" name="cancel" type="submit" class="btn btn-primary" value="Cancel">	
				</form>
			<?php } ?>

			<?php if ($lan != "") { ?>
			
				<?php echo form_open_multipart('panel/updateabout/'.$table.'/'.$id.'/'.$lan ,'role="form"'); ?>
					<?php foreach ($data as $keys => $values): ?>
						<div class="form-group">
							<table class="table table-bordered text-center">
								<tr><td><label> Header :</label></td>
									<td><input value="<?php echo($values['title']);?>" type="text" name="title" class="form-control"></td>
								</tr>
								<tr><td><label> Description :</label></td>
									<td><input value="<?php echo($values['desc']);?>" type="text" name="desc" class="form-control"></td>
								</tr>
								<tr><td><label> Body :</label></td>
									<td><textarea id="mytextarea" name="text" class="form-control" ><?php echo($values['body']);?></textarea>
								</td>
								</tr>
								<br>
								<br>
							</table>		
						</div>	
					<?php endforeach; ?>
					<input style="margin-top: 10px" name="update" type="submit" class="btn btn-primary" value="Submit">
					<input style="margin-top: 10px" name="cancel" type="submit" class="btn btn-primary" value="Cancel">	
				</form>
			<?php } ?>
		</div>								
	</div>
</div>
</div>

							


							
	