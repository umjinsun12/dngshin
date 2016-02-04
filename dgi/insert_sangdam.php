<?php


    $con = mysql_connect("localhost","root","1234") or die('Could not connect: ' . mysql_error());
    //connect to the employee database
    
    mysql_query("SET NAMES UTF8");
    
    mysql_select_db("dbdgi", $con);
    
    //get the employee details
    $no = $_GET['no'];
    $bub_phone = $_GET['bub_phone'];
    $mem_phone = $_GET['mem_phone'];
	$dgi_chui = $_GET['dgi_chui'];
    $dgi_edu = $_GET['dgi_edu'];
    $dgi_jungi = $_GET['dgi_jungi'];
	$dgi_inji = $_GET['dgi_inji'];
	$dgi_chae = $_GET['dgi_chae'];
	$dgi_dgibu = $_GET['dgi_dgibu'];
	$dgi_total = $_GET['dgi_total'];
    
    //insert into mysql table
    $sql = "INSERT INTO sangdam(
    no,
    bub_phone,
    mem_phone,
    dgi_chui,
    dgi_edu,
    dgi_jungji,
    dgi_inji,
    dgi_chae,
    dgi_dgibu,
    dgi_total)
    VALUES(
    '$no',
    '$bub_phone',
    '$mem_phone',
    '$dgi_chui',
    '$dgi_edu',
    '$dgi_jungji',
    '$dgi_inji',
    '$dgi_chae',
    '$dgi_dgibu',
    '$dgi_total'
    )";
    
    if(!mysql_query($sql,$con))
    {
        die('Error : ' . mysql_error());
    }
?>