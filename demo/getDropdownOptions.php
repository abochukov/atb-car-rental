<?php



    $conn = mysqli_connect("localhost","gomallgr_manager","9vDf5[x{g9AB","gomallgr_sting");







        //$first = mysql_real_escape_string($_REQUEST["first"]);
        $first = $_POST['first'];
        $query = "SELECT * FROM subcategory WHERE catid = '2'";

        $datas  = mysqli_query($query);

        $dataq = 'qw';

        while ($row = mysqli_fetch_row($datas)) {
            //$data .= "<option value=\"" . $row['id'] . "\">" . $row['subcat'] . "        </option>";
            $data = "dsf";
        }

        echo json_encode($dataq); 

  





    ?>