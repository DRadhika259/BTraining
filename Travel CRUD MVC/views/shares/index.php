<div>
    <?php if(isset($_SESSION['is_logged_in'])) :?>
        
        <a class="btn btn-success pull-right btn-share" href="<?php echo ROOT_PATH;?>shares/add">Add New Tourist</a>
        
        <?php endif;?>
        <?php foreach ($viewmodel as $item) :?>
            <div class ="table-wrapper">
                <div class="container">
                <div class = "row">
                    <div class="col-md-10">
                        <h3 class="mt-2 ">Tourist Bookings</h3>

                        <form action ="" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <p><b><?php echo $item['name'];?></b></p>
                        </div>
                        <div class="form-group">
                            <label>Place</label>
                            <p><b> <?php echo $item['place'];?></b></p>
                        </div>
                        <div class="form-group">
                            <label>Email-id</label>
                            <p><b> <?php echo $item['email'];?></b></p>
                        </div>
                        <div class="form-group">
                            <label>Phone no.</label>
                            <p><b> <?php echo $item['phno'];?></b></p>
                        </div>
                        <a class="btn btn-success btn-sm" href="<?php echo ROOT_PATH; ?>shares/update">Update</a>
                        <a class="btn btn-danger btn-sm" href="<?php echo ROOT_PATH; ?>shares/delete">Delete</a>

                        </form>
                    </div>
      
                </div>
                </div>
                <?php endforeach;?>
            </div>

        </div>
        </div>





                   
                   
                   