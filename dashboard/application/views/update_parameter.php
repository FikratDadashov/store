  <div class="card-body">
    <div class="single-tale">
      <div class="table-responsive">
        <?php echo form_open_multipart('panel/'.$uri.'/'.$id.'/'.$lan ,'role="form"'); ?>
          <?php  foreach ($data as $keys => $value){ ?> 
            <div class="form-group">              
              <?php if($lan == "") { ?>
                <table class="table table-bordered text-center">
                  <tr><th>Edit & Save</th></tr>
            
                  <tr>
                    <?php if ($column == "product_color") { ?>                   
                    <td>Color status</td>
                    <?php } ?>
                    <?php if ($column == "product_size") { ?>                   
                    <td>Size status</td>
                    <?php } ?>
                    <?php if ($column == "shipping_country") { ?>                   
                    <td>Country status</td>
                    <?php } ?>
                    <td>
                    <input type="hidden"  name="column" value="<?php echo $column; ?>">  
                      <?php if ($value['status']==1) { ?>
                        <input type="radio" name="aktiv" value="1" checked > Active
                        <input type="radio" name="aktiv" value="0" > Passive
                      <?php }?>
                      <?php if ($value['status']==0) { ?>
                      <input type="radio" name="aktiv" value="1" > Active 
                      <input type="radio" name="aktiv" value="0" checked > Passive 
                      <?php } ?>
                    </td>
                  </tr> 
                  <?php if ($column == "shipping_country") { ?>
                    <tr>
                      <td>Country shipping price</td>
                      <td><input required="" value="<?php echo($value['price']);?>" type="text" name="price" class="form-control-sm">$</td> 
                    </tr>


                  <?php } ?>               
                </table>              
              <?php } ?>
              <?php if($lan != "") { ?>
                <table class="table table-bordered text-center">
                  <tr><th>Edit & Save</th></tr>                  
                  <tr>
                    <?php if ($column == "product_color") { ?>
                    <td><label> Change the name of color</label></td>
                    <?php } ?>
                    <?php if ($column == "product_size") { ?> 
                    <td><label> Change the name of size</label></td>
                    <?php } ?>    
                    <?php if ($column == "shipping_country") { ?> 
                    <td><label> Change the name of country</label></td>
                    <?php } ?>    
                    
                    <td><input required="" value="<?php echo($value['name']);?>" type="text" name="name" class="form-control"></td> 
                    <input type="hidden"  name="column" value="<?php echo $column; ?>">
                  </tr>
                </table> 
                  
              <?php } ?>
            </div>  
          <?php } ?>
          <input style="margin-top: 10px" name="update" type="submit" class="btn btn-primary" value="Submit">
          <a href="<?php echo base_url('./panel/'.$column) ?>" style="margin-top: 10px" name="cancel" type="submit" class="btn btn-primary">Cancel</a> 
        </form>
      </div>
    </div>
  </div>
</div>
