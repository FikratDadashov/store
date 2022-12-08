    <div class="card-body">
    	<div class="single-tale">
            <div class="table-responsive">
						<table class="table table-bordered text-center">
							<tr>
								<?php for ($i=0;$i<count($name);$i++) : ?>
									<th><?php 
									if ( $name[$i] == "id")
									{
										echo "Prioritet";
									}
									if ( $name[$i] == "logo")
									{
										echo "Loqo";
									}

									if ( $name[$i] == "email")
									{
										echo "E-mail";
									} 

									if ( $name[$i] == "phone")
									{
										echo "Mobil ";
									}

									if ( $name[$i] == "facebook")
									{
										echo "Facebook linki";
									} 

									?></th>
								<?php endfor; ?>
								<th>Əməliyyatlar</th>
							</tr>
							<?php foreach ($data as $key => $value) : ?>
								<tr>
								<?php for ($i=0;$i<count($name);$i++) : ?>
									<td><?php
									if ($name[$i]=="logo"):?>
									
										<img style="margin-right: 40px" width="50px" height="50px" src="<?php echo base_url('../assets/uploads/'.$value[$name[$i]]) ?>" alt="picture" title="" class="pull-right img-rounded">
									<?php endif;
									if ($name[$i] != "logo") echo $value[$name[$i]];?>
									</td>
								<?php endfor; ?>
									<td> 
										<a style="display: inline-block;margin-left: 15px;" href="<?php echo base_url('panel/update/settings/'.$value['id'])?>"><input  type="image" src="<?php echo base_url('assets/uploads/update.png') ?>" alt="Submit" width="20" height="20"></a>
										<!-- <a style=" margin-left: 15px;"  href="<?php echo base_url('panel/update/settings/'.$value['id'].'/2')?>"><input type="image" src="<?php echo base_url('assets/uploads/az.png') ?>" alt="Submit" width="20" height="20"></a> -->
										<a  style="margin-left: 15px;"  href="<?php echo base_url('panel/update/settings/'.$value['id'].'/1')?>"><input type="image" src="<?php echo base_url('assets/uploads/en.png') ?>" alt="Submit" width="20" height="20"></a>
										<!-- <a  style="margin-left: 15px;" href="<?php echo base_url('panel/update/settings/'.$value['id'].'/3')?>"><input  type="image" src="<?php echo base_url('assets/uploads/ru.png') ?>" alt="Submit" width="20" height="20"></a> -->
									</td>
								</tr>
							<?php endforeach; ?>
						</table>
					</div>
					
						</div>
						</div>
					
						</div>
					
	
