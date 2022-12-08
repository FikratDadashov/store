   
<style>

.pagination {
    margin: 30px 0;
}

.pagination a {
    padding: 6px 10px;
    border-bottom: none;
    display: inline-block;
    color: #888;
    float: left;
    margin-right: 4px;
    background-color: #f4f4f4;
    -webkit-transition: all 200ms ease-in-out;
    -moz-transition: all 200ms ease-in-out;
    -o-transition: all 200ms ease-in-out;
    -ms-transition: all 200ms ease-in-out;
    transition: all 200ms ease-in-out;
    box-shadow:  inset 0px -1px 0px 0px rgba(0,0,0, 0.07);
    border-radius: 2px;
}

.pagination .current {
    background: #169fe6 !important;
    color: #fff;
    box-shadow: inset 0px -1px 0px 0px rgba(0,0,0, 0.15);
}

.pagination ul li a:hover {
    background-color: #ccc;
    color: #fff;
    box-shadow: inset 0px -1px 0px 0px rgba(0,0,0, 0.1);
}

</style> 
<?php if ($for_index == 1) { ?>
<div class="card-body">
	<div class="single-tale">
		<div class="table-responsive">
			<table class="table table-bordered text-center">
				<thead class="thead-light">
					<tr>
                      <th scope="col">Row</th>  
					  <th scope="col">ID</th>
					  <th scope="col">Product Image</th>
					  <th scope="col">Product Name</th>			  
					  <th scope="col">Price of product</th>					 
					  <th scope="col">Name of orderer</th>
					  <th scope="col">Email of orderer</th>
					  <th scope="col">State</th>
					  <th scope="col">Order date</th>
					  <th scope="col">Status of order</th>
					  <th scope="col">Operations</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; foreach ($orders as $key => $value) { ?>
					<tr>
                      <th scope="row"><?php echo $i; $i++; ?></th>  
					  <th ><?php echo $value['id']; ?></th>
                        <?php $array_of_photos = explode(":", $value['image']); ?>
					  <td><img class="img-fluid" width="90" height="90" src="<?php echo base_url('../assets/uploads/'.$array_of_photos[0]) ?>" alt="picture" title="" ></td>
					  <td><?php echo $value['name']; ?></td>
					  <td><?php echo $value['price']; ?></td>
					  <td><?php echo $value['sname']; ?></td>
					  <td><?php echo $value['email']; ?></td>
					  <td><?php echo $value['state']; ?></td>
					  <td><?php echo  date("d-m-Y", $value['created_date']) ?></td>
					  <td style="color: <?php if ($value['status'] == 2) { echo "green"; } if($value['status'] == 1) { echo "#ffb900"; }  
                      if ($value['status'] == 0) { echo "red"; } ?>">
					  	<?php  if ( $value['status'] == 1)
                                {
                                    echo "On shipping";
                                }
                                if ( $value['status'] == 0)
                                {
                                    echo "Hasn't delivered";
                                }

                                if ( $value['status'] == 2)
                                {
                                    echo "Finished";
                                }                               

                                 ?></td>
					  	<td>
                            <a  style=" margin-left: 10px;" href="<?php echo base_url('panel/check_order/'.$value['s_id'])?>">
                                <input type="image" src="<?php echo base_url('assets/uploads/update.png') ?>" alt="Submit" width="20" height="20">
                            </a>
					  		<!-- <a href="<?php echo base_url('panel/finish/'.$value['s_id'])?>">
                              <input type="image" src="<?php echo base_url('assets/uploads/finish.png') ?>" alt="Submit" width="20" height="20">
                            </a> -->
                    	</td>
					</tr>
				<?php } ?>					
				</tbody>
			</table>
		</div>
	</div>

	<div>
            <nav  class="pagination">            
                <?php if ($page != 1) { ?>
                    <a href="<?php echo base_url('./panel/orders/'.($page-1))?>">Back</a>
                <?php } ?>

                <?php $j=$page; $q=$page; for ($i=0; $i < 5 ; $i++) { ?>
                    <?php if ($j-2>0 && $j-2 <= ceil($count/10)) { ?>
                        <?php if ($j-2 == $page) { ?>
                        <a href="<?php echo base_url('./panel/orders/'.($j-2))?>" class="current">
                            <?php echo $j-2; $j++; ?>
                        </a>      
                        <?php } else { ?>
                        <a href="<?php echo base_url('./panel/orders/'.($j-2))?>" >
                            <?php echo $j-2; $j++; ?>
                        </a>                    
                    <?php }} ?>

                    <?php $a=5; if ($q == 1 && ceil($count/10) != 1 ) { ?>
                        <?php while ($q <= ceil($count/10) && $a>0) { ?>
                            <?php if ($q == $page) {  ?>
                                <a class="current" href="<?php echo base_url('./panel/orders/'.($q))?>">
                                    <?php echo $q; $q++; $a--; ?>
                                </a>      
                            <?php } else{ ?>
                            <a href="<?php echo base_url('./panel/orders/'.($q))?>">
                                <?php echo $q; $q++; $a--; ?>
                            </a>                    
                        <?php }} ?>
                    <?php } ?>

                    <?php if ($q == 1 && ceil($count/10) == 1 ) { ?>                    
                        <a class="current" href="<?php echo base_url('./panel/orders/'.($q))?>" >
                            <?php echo $q; break; ?>
                        </a>
                    <?php } ?>

                    <?php $a=5; if ($q == 2) { ?>
                        <?php while ($q-1 <= ceil($count/10) && $a>0) { ?>
                            <?php if ($q-1 == $page) { ?>
                                <a class="current" href="<?php echo base_url('./panel/orders/'.($q-1))?>" >
                                    <?php echo $q-1; $q++; $a--; ?>
                                </a>
                            <?php } else { ?>
                                <a href="<?php echo base_url('./panel/orders/'.($q-1))?>" >
                                    <?php echo $q-1; $q++; $a--; ?>
                                </a>
                        <?php }} ?>
                    <?php } ?>
                <?php } ?>
            
                <?php if ($page < ceil($count/10) ) { ?>
                    <a href="<?php if ($page < ceil($count/10)) { $page++;} echo base_url('./panel/orders/'.$page)?>">Next</a>
                <?php } ?>         
            </nav>
        </div>
</div>
<?php } ?>

</div>