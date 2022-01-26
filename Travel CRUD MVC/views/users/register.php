<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class ="panel-title">Add Tourist Data</h3>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form control" value="" required />
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form control" value="" required />
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form control" value="" required />
        </div>
        
        <input type="submit" class = "btn btn-success" name="submit" value="Submit"/>
</form>
    </div>
</div>