<?php
 
//Including Database configuration file.
 
$conn = mysqli_connect("localhost","cookbgco_nakata","nakata149754na");

if (!$conn) {

    die('Could not connect: ' . mysql_error());

}

mysqli_select_db($conn, 'cookbgco_sting');
mysqli_set_charset($conn,"utf8");
 
//Getting value of "search" variable from "script.js".
 
$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];

 
//Search box value assigning to $Name variable.
 

                    $query = "SELECT a.date_upld AS data, a.zone, a.mode, a.date_upld,
                        c.city AS city, 
                        z.zone AS zone,
                        m.mode AS mode, 
                        b.brand AS brand, 
                        t.type AS type, 
                        g.country AS grad, 
                        s.statename AS kod, 
                        c.segment AS segment,
                        c.pharmid AS pharmid, 
                        u.first_name AS user,
                        p.address AS adres,
                        p.clon AS clon
                        FROM form_upld AS a
                        INNER JOIN zone AS z ON a.zone = z.id
                        INNER JOIN mode_new AS m ON a.mode = m.id
                        INNER JOIN city AS c ON a.pharmacy = c.id
                        INNER JOIN brands AS b ON a.brand = b.id
                        INNER JOIN type AS t ON a.type = t.id
                        INNER JOIN country AS g ON a.city = g.id
                        INNER JOIN state AS s ON a.code = s.id
                        INNER JOIN users AS u ON a.user = u.id
                        INNER JOIN pharmacy AS p ON c.pharmid = p.ID
                        WHERE a.date_upld BETWEEN '$from_date' AND '$to_date'
                        ORDER BY a.id";
              
              //$query = "SELECT * FROM form_upld";
              $result = mysqli_query($conn, $query);  
              ?>
               <table border="1">
                <tr><th>дата</th><th>потребител</th><th>зона</th><th>материал</th><th>бранд</th><th>позициониране</th><th>град</th><th>код верига</th><th>ID аптека</th><th>име</th><th>сегмент</th><th>адрес</th><th>клон</th></tr>
                <?php
                    while ($row=mysqli_fetch_assoc($result)) {
                      $data = $row['data'];
                      $city = $row['city'];
                      $zone = $row['zone'];
                      $mode = $row['mode'];
                      $brand = $row['brand'];
                      $type = $row['type'];
                      $grad = $row['grad'];
                      $kod = $row['kod'];
                      $segment = $row['segment'];
                      $user = $row['user'];  
                      $pharmid = $row['pharmid'];
                      $adres = $row['adres'];  
                      $clon = $row['clon'];
                    
                      echo "
                        <tr>

                            <td>$data</td>
                            <td>$user</td>
                            <td>$zone</td>
                            <td>$mode</td>
                            <td>$brand</td>
                            <td>$type</td>
                            <td>$grad</td>
                            <td>$kod</td>
                            <td>$pharmid</td>
                            <td>$city</td>
                            <td>$segment</td>
                            <td>$adres</td>
                            <td>$clon</td>
                        </tr>
                      ";

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