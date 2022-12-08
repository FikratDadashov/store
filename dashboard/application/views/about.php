    <div class="card-body">
    	<div class="single-tale">
            <div class="table-responsive">
			<table class="table table-bordered text-center">
				<tr>
					<?php for ($i=0;$i<count($name);$i++) : ?>
						<th width="250px">
						<?php 
							if ( $name[$i] == "id")
							{
								echo "ID";
							}
							if ( $name[$i] == "image")
							{
								echo "Image";
							}

							if ( $name[$i] == "status")
							{
								echo "Status";
							}								
				   		?>
				  		</th>
					<?php endfor; ?>
					<th width="250px">Operations</th>
				</tr>
				<?php foreach ($data as $key => $value) : ?>
					<tr>
						<?php for ($i=0;$i<count($name);$i++) : ?>
							<td><?php
							if ($name[$i] == "status") 
							{
								if ( $value[$name[$i]]==1)
								{
									echo "Active";
								}
								if ( $value[$name[$i]]==0)
								{
									echo "Passive";
								}
							}

							if ($name[$i]=="image"):?>
							
								<img  class="img-fluid" width="90" height="90" src="<?php echo base_url('../assets/uploads/'.$value[$name[$i]]) ?>" alt="picture" title="" >
							<?php endif;
							if ($name[$i] != "image" && $name[$i] != "status" ) 
								{
									echo $value[$name[$i]];
								}

							?>
						</td>
						<?php endfor; ?>
						<td  height="solid"> 							
							<a style=" margin-left: 15px;" href="<?php echo base_url('panel/update/about_us/'.$value['id'])?>"><input  type="image" src="<?php echo base_url('assets/uploads/update.png') ?>" alt="Submit" width="20" height="20"></a>

							<!-- <a style=" margin-left: 15px;"  href="<?php echo base_url('panel/update/about_us/'.$value['id'].'/2')?>"><input type="image" src="<?php echo base_url('assets/uploads/az.png') ?>" alt="Submit" width="20" height="20"></a> -->
							<a  style="margin-left: 15px;"  href="<?php echo base_url('panel/update/about_us/'.$value['id'].'/1')?>"><input type="image" src="<?php echo base_url('assets/uploads/en.png') ?>" alt="Submit" width="20" height="20"></a>
							<!-- <a  style="margin-left: 15px;" href="<?php echo base_url('panel/update/about_us/'.$value['id'].'/3')?>"><input  type="image" src="<?php echo base_url('assets/uploads/ru.png') ?>" alt="Submit" width="20" height="20"></a> -->
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div></div></div>
	</div>
					





		
	
