<?php

    // Db connection configuration
    define ("DB_HOST", "localhost"); // set database host
    define ("DB_USER", "bgprvhqk_vivach"); // set database user
    define ("DB_PASS","Q#9L,!TK9x3O"); // set database password
    define ("DB_NAME","bgprvhqk_sting"); // set database name

    $link = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("Couldn't make connection.");
    mysql_query('set names utf8', $link);
    $db = mysql_select_db(DB_NAME, $link) or die("Couldn't select database");

    $succeed = 0;
    $error = 0;
    $thegoodstuf = '';
    $thegoodstuf_mail = '';
    $thegoodstuf_db = '';

    $today = date('Y-m-d H:i:s');

    foreach($_FILES["file"]["error"] as $key => $value) {
        if ($value == UPLOAD_ERR_OK){
            $succeed++;

            //took this from: "http://stackoverflow.com/questions/7563658/php-check-file-extension"
            //you can loop through different file types
            $file_parts = pathinfo($filename);
            switch($file_parts['extension'])
            {
                case "jpg":

                    //do something with jpg

                break;

                case "exe":

                    // do sometinhg with exe

                break;

                case "": // Handle file extension for files ending in '.'
                case NULL: // Handle no file extension
                break;
            }

            $name = $_FILES['file']['name'][$key];

            $custom_name =  $name;

            // replace file to where you want
            copy($_FILES['file']['tmp_name'][$key], './upload/'.$custom_name);

            $size = filesize($_FILES['file']['tmp_name'][$key]);
            // make some nice html to send back
            $thegoodstuf .= "
                                <br>
                                <hr>
                                <br>

                                <h2>File $succeed - $custom_name</h2>
                                <br>
                                    give some specs:
                                    <br>
                                    size: $size bytes
            ";

            $thegoodstuf_mail .= "
                                <br>
                                <h5>File $succeed - $custom_name</h5>
                                <br>
            ";


            $thegoodstuf_db .= "$custom_name<br>
            ";
        }
        else{
            $error++;
        }
    }

    //echo 'Good lord vader '.$succeed.' files where uploaded with success!<br>';

    if($error){
       // echo 'shameful display! '.$error.' files where not properly uploaded!<br>';
    }

    $fname = $_REQUEST['fname'];
    $company = $_REQUEST['company'];
    $title = $_REQUEST['title'];
    $email = $_REQUEST['email'];
    $transform = $_REQUEST['transformation'];
    $transform2 = $_REQUEST['transformation2'];
    $transform3 = $_REQUEST['transformation3'];
    $transform4 = $_REQUEST['transformation4'];



    $choose = $_REQUEST['r1'];
/*
    echo '<br>Fname: '. $_REQUEST['fname']; //Name
    echo '<br>Company: '. $_REQUEST['company']; //Family
    echo '<br>Title: '. $_REQUEST['title']; //Family
    echo '<br>Email: '. $_REQUEST['email']; //Family
    echo '<br>Choose: '. $_REQUEST['r1']; //Family
    //echo '<br>Transformation: '. $_REQUEST['transformation']; //Family
*/
   

    //echo $thegoodstuf;
    echo "<br/>";
    echo "You have registered successfully";


    $sql = "INSERT INTO `image_test`( `img`) VALUES ('$custom_name')";
    $res = mysql_query($sql); //or die(mysql_error());

 
?>