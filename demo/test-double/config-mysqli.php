<?Php

/////// Update your database login details here /////

$dbhost_name = "localhost"; // Your host name 

$database = "gomallgr_manager";       // Your database name

$username = "gomallgr_manager";            // Your login userid 

$password = "9vDf5[x{g9AB";            // Your password 

//////// End of database details of your server //////



//////// Do not Edit below /////////

$connection = mysqli_connect($host_name, $username, $password, $database);



if (!$connection) {

    echo "Error: Unable to connect to MySQL.<br>";

    echo "<br>Debugging errno: " . mysqli_connect_errno();

    echo "<br>Debugging error: " . mysqli_connect_error();

    exit;

}

?> 