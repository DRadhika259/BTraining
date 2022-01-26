<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\grid\GridView;
// $this->title = 'Plans';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CRM</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  body {
  color: #252f41;
  background: #085173;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 14px;
}
.table-responsive {
  margin: 30px 0;
}
.table-wrapper {
  background: rgb(236, 229, 229);
  padding: 20px 25px;
  border-radius: 3px;
  min-width: 1000px;
  box-shadow: 0 1px 1px rgba(211, 104, 104, 0.05);
}
.table-title {
  padding-bottom: 15px;
  background-color: rgb(119, 188, 190);
  color: rgb(21, 32, 114);
  padding: 16px 30px;
  min-width: 100%;
  margin: -20px -25px 10px;
  border-radius: 3px 3px 0 0;
}
.table-title h2 {
  margin: 5px 0 0;
  font-size: 24px;
}
.table-title .btn-group {
  float: right;
}
.table-title .btn {
  color: #fff;
  float: right;
  font-size: 14.5px;
  border: none;
  min-width: 50px;
  border-radius: none;
  border: none;
  outline: none !important;
  margin-left: 10px;
}

.table-title .btn i {
  float: left;
  font-size: 21px;
  margin-right: 5px;
}

.table-title .btn span {
  float: left;
  margin-top: 2px;
}
table.table tr th,
table.table tr td {
  border-color: #cdd4dd;
  padding: 12px 15px;
  vertical-align: middle;
}
table.table tr th:first-child {
  width: 60px;
}
table.table tr th:last-child {
  width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
  background-color: #d8e0ee;
}

table.table-striped.table-hover tbody tr:hover {
  background: #f5f5f5;
}
table.table th i {
  font-size: 13px;
  margin: 0 5px;
  cursor: pointer;
}
table.table td:last-child i {
  opacity: 0.9;
  font-size: 22px;
  margin: 0 5px;
}
table.table td a {
  font-weight: bold;
  color: #566787;
  display: inline-block;
  text-decoration: none;
  outline: none !important;
}
table.table td a:hover {
  color: #2196f3;
}
table.table td a.edit {
  color: #ffc107;
}
table.table td a.delete {
  color: #f44336;
}
table.table td i {
  font-size: 19;
}
table.table .avatar {
  border-radius: 50%;
  vertical-align: middle;
  margin-right: 10px;
}
</style>
</head>
<body>

<div class="container">
      <div class="table responsive">
          <div class="table-wrapper">
              <div class="table-title">
                  <div class="row">
                  <div class="col-md-12"><h1>Manage Plans</h1></div>
                      <div class="col-md-12">
                          <div class="mt-3 mb-2 ">          
<!-- <a class ="btn btn-success float-right" href="yii/crm/crm-commontask/frontend/web/index.php"> Cancel </a> </h1> <br>  </h1> <br> -->
					</div>
                          </div>
                      </div>
                  </div>
              </div>

              

<?php 
$msg = yii::$app->getSession() -> getFlash('success');
if(null !==$msg) :?>
<div class="alert alert-success"> <?= $msg; ?></div>
<?php endif; ?>


          <div class="plans" >

          <?=Html::beginForm();?>

          <?=GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
              'plan_id',
              'plan_name',
              'validity',
              'plan_data',
              'price',
            ],
          ]);
          ?>

        <?= Html::endForm();?> 

      </div>
    </div>
  </div>
</div>
</body>
</html>
