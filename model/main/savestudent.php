<?php
session_start();
include('../connect.php');
$a = $_POST['name'];
$b = $_POST['place'];
$c = $_POST['yoa'];
$d = $_POST['phone'];
$e = $_POST['dob'];
$f = $_POST['b_id'];
$g = $_POST['gender'];
// query

$file_name  = strtolower($_FILES['file']['name']);
$file_ext = substr($file_name, strrpos($file_name, '.'));
$prefix = 'your_site_name_'.md5(time()*rand(1, 9999));
$file_name_new = $prefix.$file_ext;
$path = '../uploads/'.$file_name_new;


    /* check if the file uploaded successfully */
    if(@move_uploaded_file($_FILES['file']['tmp_name'], $path)) {

  //do your write to the database filename and other details   
$sql = "INSERT INTO student (name,place,yoa,phone,dob,b_id,gender,file) VALUES (:a,:b,:c,:d,:e,:f,:g,:h)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$file_name_new));
header("location: students.php");

	}
?>