<?php
 
//Including Database configuration file.
 
$conn = mysqli_connect("localhost","cookbgco_nakata","nakata149754na");

if (!$conn) {

    die('Could not connect: ' . mysql_error());

}

mysqli_select_db($conn, 'cookbgco_sting');
mysqli_set_charset($conn,"utf8");
 
//Getting value of "search" variable from "script.js".
 

 
//Search box value assigning to $Name variable.
 
   $Name = $_POST['search'];
 
  $num_rec_per_page=10;
  if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
  $start_from = ($page-1) * $num_rec_per_page;   

  /*$sql_pic = "SELECT * FROM form_upld WHERE user = '$Name' ORDER BY date_upld  DESC LIMIT $start_from, $num_rec_per_page";*/
  $sql_pic = "SELECT * FROM form_upld WHERE user = '$Name' ORDER BY date_upld  DESC ";
  $res_pic = mysqli_query($conn, $sql_pic);
  ?>
   <table border="1" class="tbl">
                <tr><th>дата</th><th>град</th><th>аптека</th><th>потребител</th><th>бранд</th><th>сегмент</th><th>снимка</th><th>направи ТОП</th><th>изтрий</th></tr>

                  <h4>Снимки</h4> 
                  <?php
                    while ($row_pic = mysqli_fetch_array($res_pic)) {
                        $id = $row_pic['id'];
                        $date_upld = $row_pic['date_upld'];
                        $city = $row_pic['city'];
                        $pharmacy = $row_pic['pharmacy'];
                        $brand = $row_pic['brand'];
                        $user = $row_pic['user'];
                        $segment = $row_pic['sgm'];
                        $img = "../" . $row_pic['img'];
                        /*
                        echo "
                            <input type='hidden' value='$user' id='user'>
                            <input type='hidden' value='$pharmacy' id='pharm'>
                            <input type='hidden' value='$brand' id='brand'>
                            <input type='hidden' value='$img' id='img'>
                        ";
                        */

                        $sql_city = "SELECT * FROM country where id = '$city'";
                        $res_city = mysqli_query($conn, $sql_city);
                        while ($row_city=mysqli_fetch_assoc($res_city)) { $grad = $row_city['country']; }

                        $sql_pharm = "SELECT * FROM city where id = '$pharmacy'";
                        $res_pharm = mysqli_query($conn, $sql_pharm);
                        while ($row_pharm=mysqli_fetch_assoc($res_pharm)) { $apteka = $row_pharm['city']; }

                        $sql_user = "SELECT * FROM users where id = '$user'";
                        $res_user = mysqli_query($conn, $sql_user);
                        while ($row_user=mysqli_fetch_assoc($res_user)) { $ptrbl = $row_user['id']; $potrebitel = $row_user['first_name']; }

                        $sql_brand = "SELECT * FROM brands where id = '$brand'";
                        $res_brand = mysqli_query($conn, $sql_brand);
                        while ($row_brand=mysqli_fetch_assoc($res_brand)) { $marka = $row_brand['brand']; }

                      
                      echo "<tr class='my-tr'>
                            <td width='11%'>$date_upld</td>
                            <td width='11%'>$grad</td>
                            <td width='11%'>$apteka</td>
                            <td width='11%'>$potrebitel</td>
                            <td width='11%'>$marka</td>
                            <td width='11%'>$segment</td>
                            <td width='11%'><img src='$img' width='100%;'></td>
                            <td width='11%'><input type='radio' name='r1' value='$id'></td>
                            <td width='11%'><a href='#'  class='del'><i class='glyphicon  glyphicon-trash'></i>&nbsp;</a></td>
                            </tr>";
                         
                    }
                  ?>
                </table>
                <?php
                /*
                $sql_pic = "SELECT * FROM form_upld WHERE user='$Name'";
                $res_pic = mysqli_query($conn, $sql_pic);
                $total_records = mysqli_num_rows($res_pic);  //count number of records
                $total_pages = ceil($total_records / $num_rec_per_page); 

                echo "<a href='pagination.php?page=1'>".'|<'."</a> "; // Goto 1st page  

                for ($i=1; $i<=$total_pages; $i++) { 
                            echo "<a href='pictures.php?page=".$i."'>".$i."</a> "; 
                }; 
                echo "<a href='pictures.php?page=$total_pages'>".'>|'."</a> "; // Goto last page
                */
                ?>

              </div>