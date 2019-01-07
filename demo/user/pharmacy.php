<!DOCTYPE html>
<html>

<head>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/toaster.css" rel="stylesheet">
  <link href="css/login.css" rel="stylesheet">

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>


<body>
  <?php
    include 'header.php';
    require_once("../config.php");
  ?>

  <div class="container-fluid">
    <div class="row"> 
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <table class="table table-bordered"> 
          <tr class="active">
            <td class="field-label col-xs-3"><label>ID</label></td>
            <td class="col-md-3">Store Number</td>
            <td class="col-md-3">Name</td>
            <td class="col-md-3">Address</td>
            <td class="col-md-3">Update</td>
            <td class="col-md-3">Delete</td>
          </tr>
          <?php

            $sql = "select * from pharmacy ";
            $rs = mysqli_query($conn,$sql);
            
            while ($row = mysqli_fetch_array($rs)) {

              $id = $row['id'];
              $strNum = $row['strNum'];
              $name = $row['name'];
              $address = $row['address'];

              echo "<tr>";
              echo "<td class='col-md-1'>". $id ."</td>";
              echo "<td class='col-md-1'>". $strNum ."</td>";
              echo "<td class='col-md-3'>". $name ."</td>";
              echo "<td class='col-md-3'>". $address ."</td>";
              echo "<td class='col-md-2'><button type='button' class='btn btn-warning'>Update</button></td>";
              echo "<td class='col-md-2'><button type='button' class='btn btn-danger'>Delete</button></td>";
              echo "</tr>";
              
            }
          ?>
          <tr>
            <td class="field-label col-xs-3"><label></label></td>
            <td class="col-md-3"></td>
            <td class="col-md-3"></td>
            <td class="col-md-3"></td>
            
            <td colspan="2" class="col-md-6"><button type="button" class="btn btn-primary">Add New Phramacy</button></td>
          </tr>
        </table>
      </div>
      <div class="col-md-1"></div>
    </div>
  </div>


</body>
</html>
