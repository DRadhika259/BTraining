<div class="panel panel-default">
    <div class="panel-heading">
            <h3 class="panel-title">Insert Tourist Data</h3>
    </div>      
<div class = "panel-body">
                <form method="post" action="<?php $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
                <div class = "form-group">
                    <label>Name</label>
                    <input type="text" name="name"  class="form-control" value = "" required autocomplete="off">
                </div>

                <div class = "form-group">
                    <label>Place</label>
                    <input type="text" name="place" class="form-control" value = ""required autocomplete="off">
                </div>

                <div class = "form-group">
                    <label>Email-id</label>
                    <input type="email" name="email" class="form-control" value = ""required autocomplete="off">   
                </div>

                <div class = "form-group">
                    <label>Phone no.</label>
                    <input type="text" name="phno"  class="form-control" value = ""required autocomplete="off">
                </div>

                <div class = "form-group">
                    <label>Photo</label>
                    <input type="file" name="image"  class="form-control" value = "">
                </div>

                <input class="btn btn-primary" name="submit" type="submit" value="Submit" />
                <a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>shares">Cancel</a>

</form>
            </div>
        </div>
 