    <div class="card-body">
      <div class="single-tale">
        <div class="table-responsive" >
    		<?php echo form_open_multipart('panel/add_parameter' ,'role="form"'); ?>
          <div class="form-group">
            <table class="table table-bordered text-center">
              <tr>
                <?php if ($column == "product_color") { ?>
                <th>Add new color</th>
                <?php } ?>
                <?php if ($column == "product_size") { ?>
                <th>Add new size</th>
                <?php } ?>
                <?php if ($column == "shipping_country") { ?>
                <th>Add new country</th>
                <?php } ?>
              </tr>
             
              <tr>
                <?php if ($column == "product_color") { ?>
                <td> Name of color :</td>
                <?php } ?>
                <?php if ($column == "product_size") { ?>
                <td> Name of size :</td>
                <?php } ?>
                <?php if ($column == "shipping_country") { ?>
                <td> Name of country :</td>
                <?php } ?>
                <td><input required="" type="text" name="name" class="form-control"></td>        
                <input type="hidden"  name="column" value="<?php echo $column; ?>">       
              </tr>   
              <?php if ($column == "shipping_country") { ?>
              <tr>
                <td>Country shipping price</td>
                <td><input required="" value="" type="text" name="price" class="form-control-sm">$</td> 
              </tr>
              <?php } ?>                   
            </table>
    			</div>	
      		<input style="margin-top: 10px" name="add" type="submit" class="btn btn-primary" value="Add">
      		<a href="<?php echo base_url('./panel/'.$column) ?>" style="margin-top: 10px" name="cancel" type="submit" class="btn btn-primary">Cancel</a>
    		</form>
    	</div>							
    </div>
  </div>
</div>
