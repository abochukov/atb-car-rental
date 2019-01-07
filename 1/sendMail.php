<?php

// $PickupPlace = $_POST['PickupPlace'];
// $PickupDate = $_POST['PickupDate'];
// $PickupHour = $_POST['PickupHour'];
//
// $DropPlace = $_POST['DropPlace'];
// $DropDate = $_POST['DropDate'];
// $DropHour = $_POST['DropHour'];
//
// $Period_Days = $_POST['Period_Days'];
// $Sum_Rent = $_POST['Sum_Rent'];
// $Sum_Extra = $_POST['Sum_Extra'];
// $Sum_All = $_POST['Sum_All'];
//
// $names = $_POST['names'];
// $mail = $_POST['mail'];
// $phone = $_POST['phone'];
// $sendDetails = $_POST['sendDetails'];
//
//
// $to = "a_bochukov@yahoo.com";
// $subject = "Rent A Car Reservation";
//
//
//
// $message = "
// <html>
// <head>
// <title>HTML email</title>
// </head>
// <body>
// <p>Данни за наем</p>
// <table border='1'>
// <tr><td width='30%'>Имена</td><td width='70%'>" . $names . "</td></tr>
// <tr><td width='30%'>Email</td><td width='70%'>" . $mail . "</td></tr>
// <tr><td width='30%'>Телефон</td><td width='70%'>" . $phone . "</td></tr>
// <tr height='15'><td colspan='2'></td></tr>
// <tr><td width='30%'>Място на вземане</td><td width='70%'>" . $PickupPlace . "</td></tr>
// <tr><td width='30%'>Дата на вземане</td><td width='70%'>" . $PickupDate . "</td></tr>
// <tr><td width='30%'>Час на вземане</td><td width='70%'>" . $PickupHour . "</td></tr>
// <tr height='15'><td colspan='2'></td></tr>
// <tr><td width='30%'>Място на оставяне</td><td width='70%'>" . $DropPlace . "</td></tr>
// <tr><td width='30%'>Дата на оставяне</td><td width='70%'>" . $DropDate . "</td></tr>
// <tr><td width='30%'>Час на оставяне</td><td width='70%'>" . $DropHour . "</td></tr>
// <tr height='15'><td colspan='2'></td></tr>
// <tr><td width='30%'>Период дни</td><td width='70%'>" . $Period_Days . "&nbsp;дни</td></tr>
// <tr><td width='30%'>Сума наем</td><td width='70%'>" . $Sum_Rent . "&nbsp;&euro;</td></tr>
// <tr><td width='30%'>Сума допълнения</td><td width='70%'>" . $Sum_Extra . "&nbsp;&euro;</td></tr>
// <tr><td width='30%'>Общо</td><td>" . $Sum_All . "&nbsp;&euro;</td></tr>
// <tr height='15'><td colspan='2'></td></tr>
// <tr><td width='30%'>Съобщение</td><td width='70%'>" . $sendDetails . "</td></tr>
// </table>
// </body>
// </html>
// ";
//
// // Always set content-type when sending HTML email
// $headers = "MIME-Version: 1.0" . "\r\n";
// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//
// // More headers
// $headers .= 'From: <reservation@atb-rental.eu>' . "\r\n";
// //$headers .= 'Cc: p.rainova@abv.bg' . "\r\n";

mail("a_bochukov@yahoo.com","My Subject","My message");

?>
