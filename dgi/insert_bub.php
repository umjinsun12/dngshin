<?php


    $con = mysql_connect("localhost","root","1234") or die('Could not connect: ' . mysql_error());
    //connect to the employee database
    
    mysql_query("SET NAMES UTF8");
    
    mysql_select_db("dbdgi", $con);
    
    //get the employee details
    $phone = $_GET['phone'];
    $location = $_GET['location'];
    
    //insert into mysql table
    $sql = "INSERT INTO bup(bup_phone,bup_location)
    VALUES('$phone','$location')";
    
    if(!mysql_query($sql,$con))
    {
        die('Error : ' . mysql_error());
    }
?>