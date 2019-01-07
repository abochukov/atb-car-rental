<?php
 
//Including Database configuration file.
 
$con = mysqli_connect("localhost","cookbgco_nakata","nakata149754na");

if (!$con) {

    die('Could not connect: ' . mysql_error());

}

mysqli_select_db($con, 'cookbgco_sting');
mysqli_set_charset($con,"utf8");
 
//Getting value of "search" variable from "script.js".
 
if (isset($_POST['search'])) {
 
//Search box value assigning to $Name variable.
 
   $Name = $_POST['search'];
 
  //Search query.
   $Query = "SELECT id, city FROM city WHERE city LIKE '%$Name%' LIMIT 5";
 
    //Query execution
    $res = mysqli_query($con, $Query);
   
 
//Creating unordered list to display result.
 
   echo '
 
<ul>
 
   ';
 
   //Fetching result from database.
 
   while ($Result = MySQLi_fetch_array($res)) {
          $id_ph =$Result['id'];
       ?>
 
   <!-- Creating unordered list items.
 
        Calling javascript function named as "fill" found in "script.js" file.
 
        By passing fetched result as parameter. -->
 
   <li onclick='fill("<?php echo $Result['city']; ?>")'>
 
   <a>
 
   <!-- Assigning searched result in "Search box" in "search.php" file. -->
 
       <?php echo $Result['city'] . "&nbsp;<a href='edit_pharm.php?ids=$id_ph'><font color='#f27624'>редактирай</font></a>"; ?>
 
   </li></a>
 
   <!-- Below php code is just for closing parenthesis. Don't be confused. -->
 
   <?php
 
}}
 
 
?>
 
</ul>