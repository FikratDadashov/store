   
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
    <?php  if($uri != "slide"){ 
            if ($this->uri->segment(3) != "" ) { ?>
        <a class="btn" href="../add/<?php echo $uri; ?>"><i class="fa fa-plus"></i> Add new content </a>
        <?php } else { ?>
        <a class="btn" href="./add/<?php echo $uri ?>"><i class="fa fa-plus"></i> Add new content </a>
    <?php } } ?>

    <div class="card-body">
    	<div class="single-tale">
            <div class="table-responsive" >
                <table class="table table-bordered text-center" >
                    <tr>
                    <?php for ($i=0;$i<count($name);$i++) { ?>
                        <th>
                            <?php if ( $name[$i] == "id")
                            {
                                echo "ID";
                            }
                            elseif ( $name[$i] == "image")
                            {
                                echo "Image";
                            }
                           
                            elseif ( $name[$i] == "main_cat_id")
                            {
                                echo "Main Category";
                            } 
                            elseif ( $name[$i] == "sub_cat_id")
                            {
                                echo "Sub Category";
                            } 

                            elseif ( $name[$i] == "status")
                            {
                                echo "Status";
                            }

                            elseif ( $name[$i] == "name")
                            {
                                echo "Name";
                            }                                
                            ?>                                    
                        </th>
                    <?php } ?>
                        <th>Operations</th>
                    </tr>
                    <?php foreach ($data as $key => $value) : ?>
                    <tr>
                        <?php for ($i=0;$i<count($name);$i++) : ?>
                        <td>
                            <?php
                            if ($name[$i] == "status") {
                                if ( $value[$name[$i]]==1)
                                {
                                    echo "Active";
                                }
                                if ( $value[$name[$i]]==0)
                                {
                                    echo "Passive";
                                }
                            }

                            if ($name[$i] == "main_cat_id") {
                                foreach ($main as $keys => $values) 
                                {
                                    if ($value[$name[$i]] == $values['relation_id']) {
                                        echo $values['name'];
                                    }
                                }
                            }

                            if ($name[$i] == "name") {
                                echo  $value[$name[$i]];
                            }

                            if ($name[$i] == "head") {
                                echo  $value[$name[$i]];
                            }                            

                            if ($name[$i] == "sub_cat_id") 
                            {
                                foreach ($sub as $keys => $values) 
                                {
                                    if ($value[$name[$i]] == $values['relation_id']) 
                                    {
                                        echo $values['name'];
                                    }
                                }
                            }

                            if ($name[$i]=="image"){ ?>
                                <?php if ( $uri == "product_item")  {  
                                    $array_of_photos = explode(":", $value['image']);?>
                                    <img class="img-fluid" width="90" height="90"  src="<?php echo base_url('../assets/uploads/'.$array_of_photos[0]) ?>" alt="picture" title="" >
                                <?php } else { ?>
                                 

                            
                                <img class="img-fluid" width="90" height="90"  src="<?php echo base_url('../assets/uploads/'.$value[$name[$i]]) ?>" alt="picture" title="" >
                            <?php } ?>
                            <?php }

                            if ($name[$i]=="site"){ 
                            
                                echo $value[$name[$i]];
                            }

                            if ($name[$i] == "id") echo $value[$name[$i]];
                            if ($name[$i] == "time") echo date('d-m-Y', $value[$name[$i]] ) ;

                            ?>
                        </td>
                        <?php endfor; ?>
                        <td> 
                            <?php if ($uri != "slide" && $uri != "product_main_category")  {  ?>
                            <a>
                                <input id ="<?php echo $uri; ?>" type="image" onclick="delete_item(<?php echo $value['id'].","?> this.id)" src="<?php echo base_url('assets/uploads/delete.png') ?>" alt="Submit" width="20" height="20">
                            </a>
                            <?php } ?>
                            <a  style=" margin-left: 10px;" href="<?php echo base_url('panel/update/'.$uri.'/'.$value['id'])?>">
                                <input type="image" src="<?php echo base_url('assets/uploads/update.png') ?>" alt="Submit" width="20" height="20">
                            </a>
                            <?php if ($uri != "partners") { ?>
                                <!-- <a style=" margin-left: 10px;"  href="<?php echo base_url('panel/update/'.$uri.'/'.$value['id'].'/2')?>">
                                    <input type="image" src="<?php echo base_url('assets/uploads/az.png') ?>" alt="Submit" width="20" height="20">
                                </a> -->
                                <a  style="margin-left: 10px;"  href="<?php echo base_url('panel/update/'.$uri.'/'.$value['id'].'/1')?>">
                                    <input type="image" src="<?php echo base_url('assets/uploads/en.png') ?>" alt="Submit" width="20" height="20">
                                </a>
                                <!-- <a  style="margin-left: 10px;" href="<?php echo base_url('panel/update/'.$uri.'/'.$value['id'].'/3')?>">
                                    <input  type="image" src="<?php echo base_url('assets/uploads/ru.png') ?>" alt="Submit" width="20" height="20">
                                </a> -->
                            <?php } ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
		</div>
        <?php if ( $uri == "product_item"  ) { ?>
        <div>
            <nav  class="pagination">            
                <?php if ($page != 1) { ?>
                    <a href="<?php echo base_url('./panel/'.$uri.'/1')?>"><<</a>
                    <a href="<?php echo base_url('./panel/'.$uri.'/'.($page-1))?>">Back</a>
                <?php } ?>

                <?php $j=$page; $q=$page; for ($i=0; $i < 5 ; $i++) { ?>
                    <?php if ($j-2>0 && $j-2 <= ceil($count/10)) { ?>
                        <?php if ($j-2 == $page) { ?>
                        <a href="<?php echo base_url('./panel/'.$uri.'/'.($j-2))?>" class="current">
                            <?php echo $j-2; $j++; ?>
                        </a>      
                        <?php } else { ?>
                        <a href="<?php echo base_url('./panel/'.$uri.'/'.($j-2))?>" >
                            <?php echo $j-2; $j++; ?>
                        </a>                    
                    <?php }} ?>

                    <?php $a=5; if ($q == 1 && ceil($count/10) != 1 ) { ?>
                        <?php while ($q <= ceil($count/10) && $a>0) { ?>
                            <?php if ($q == $page) {  ?>
                                <a class="current" href="<?php echo base_url('./panel/'.$uri.'/'.($q))?>">
                                    <?php echo $q; $q++; $a--; ?>
                                </a>      
                            <?php } else{ ?>
                            <a href="<?php echo base_url('./panel/'.$uri.'/'.($q))?>">
                                <?php echo $q; $q++; $a--; ?>
                            </a>                    
                        <?php }} ?>
                    <?php } ?>

                    <?php if ($q == 1 && ceil($count/10) == 1 ) { ?>                    
                        <a class="current" href="<?php echo base_url('./panel/'.$uri.'/'.($q))?>" >
                            <?php echo $q; break; ?>
                        </a>
                    <?php } ?>

                    <?php $a=5; if ($q == 2) { ?>
                        <?php while ($q-1 <= ceil($count/10) && $a>0) { ?>
                            <?php if ($q-1 == $page) { ?>
                                <a class="current" href="<?php echo base_url('./panel/'.$uri.'/'.($q-1))?>" >
                                    <?php echo $q-1; $q++; $a--; ?>
                                </a>
                            <?php } else { ?>
                                <a href="<?php echo base_url('./panel/'.$uri.'/'.($q-1))?>" >
                                    <?php echo $q-1; $q++; $a--; ?>
                                </a>
                        <?php }} ?>
                    <?php } ?>
                <?php } ?>
            
                <?php if ($page < ceil($count/10) ) { ?>
                    <a href="<?php if ($page < ceil($count/10)) { $page++;} echo base_url('./panel/'.$uri.'/'.$page)?>">Next</a>
                    <a href="<?php if ($page < ceil($count/10)) { $page++;} echo base_url('./panel/'.$uri.'/'.(ceil($count/10)))?>">>></a>
                <?php } ?>         
            </nav>
        </div>
        <?php } ?>
	</div>
</div>

<script type="text/javascript">
    function delete_item(a,  b){        
        var r = confirm("Delete the selected line?");
        if (r == true) {
            if (b != "product_size" && b != "product_color" && b != "shipping_country" ) {
                window.location = "../delete/"+b+"/"+a;
            }
            else {
                window.location = "./delete/"+b+"/"+a;
            }
        alert("The selected row has been deleted!");
        }
    }
    
</script>