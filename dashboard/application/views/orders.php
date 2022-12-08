    <div class="card-body">
    	<div class="single-tale">
            <div class="table-responsive">
            	<?php echo form_open_multipart('panel/status/'.$order[0]['s_id'] ,'role="form"'); ?>
				<table class="table table-bordered text-center">
	              <tr>
	                <th>Order details</th>
	              </tr>
	              <tr>
	                <td>Product Image :</td>
	                <td id="tester">
	                	<?php $array_of_photos = explode(":", $order[0]['image']); ?>
	                	<img style="width: 20%;" src="<?php echo base_url('../assets/uploads/'.$array_of_photos[0]) ?>" alt="picture" title="" class="img-fluid">
	                </td>
	              </tr>
	              <tr>
	                <td>Product Name :</td>
	                <td> <?php echo $order[0]['name'];?> </td>
	              </tr>
	              <tr>
	                <td>Quantity :</td>
	                <td> <?php echo $order[0]['qty'];?> </td>       
	              </tr>
	              <tr>
	                <td>Size :</td>
	                <td><?php echo $order[0]['size'];?> </td>
	              </tr>
	              <tr>
	                <td>Color :</td>
	                <td><?php echo $order[0]['color'];?> </td>
	              </tr>
	              <tr>
	                <td>Price of product :</td>
	                <td><?php echo $order[0]['price'];?> </td>
	              </tr>
	              <tr>
	                <td>Total price :</td>
	                <td><?php echo $order[0]['paid_amount']/100; ?> </td>
	              </tr>
	              <tr>
	                <td>Name of orderer :</td>
	                <td><?php echo $order[0]['sname'];?> </td>
	              </tr>
	              <tr>
	                <td>Email of orderer :</td>
	                <td><?php echo $order[0]['email'];?> </td>
	              </tr>
	              <tr>
	                <td>Country :</td>
	                <td><?php echo $order[0]['c_name'];?> </td>
	              </tr>
	              <tr>
	                <td>State :</td>
	                <td><?php echo $order[0]['state'];?> </td>
	              </tr>
	              <tr>
	                <td>Postcode :</td>
	                <td><?php echo $order[0]['postcode'];?> </td>
	              </tr>
	              <tr>
	                <td>Order date :</td>
	                <td><?php echo  date("d-m-Y", $order[0]['created_date']); ?></td>
	              </tr>
	              <tr>
	                <td>Status of order :</td>
	                <td style="color: <?php if ($order[0]['status'] == 2) { echo "green"; } if($order[0]['status'] == 1) { echo "#ffb900"; }  
                      if ($order[0]['status'] == 0) { echo "red"; } ?>"><?php if ( $order[0]['status'] == 1)
                                {
                                    echo "On shipping";
                                }
                                if ( $order[0]['status'] == 0)
                                {
                                    echo "Hasn't delivered";
                                }

                                if ( $order[0]['status'] == 2)
                                {
                                    echo "Finished";
                                }
                                ?></td>
	              </tr>
	            </table>
	            <input type="hidden" name="email" value="<?php echo $order[0]['email']; ?>">
	            <input type="hidden" name="product_name" value="<?php echo $order[0]['name']; ?>">
	            

	            <a href="<?php echo base_url("./panel/status") ?>"  style="margin-top: 10px; color: white;" name="cancel" type="submit" class="btn btn-primary">Cancel</a>	            
	            <?php if ( $order[0]['status'] == 0 ) { ?>
	            <input style="margin-top: 10px; color: white; background-color: #ffb900;" name="start" type="submit" class="btn btn-primary" value="Start the shipping">
	        	<?php } ?>
	            <?php if ($order[0]['status'] != 2) { ?>
	            <input style="margin-top: 10px; color: white; background-color: green;" name="finish" type="submit" class="btn btn-primary" value="Finish the shipping">	            
	        	<?php } ?>
	        </form>
			</div>					
		</div>
	</div>			
</div>
					
	
