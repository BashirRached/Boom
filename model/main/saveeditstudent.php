<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['name'];

$b = $_POST['place'];
$c = $_POST['yoa'];
$d = $_POST['phone'];
$e = $_POST['dob'];
$f = $_POST['b_id'];
$g = $_POST['gender'];
// query

$sql = "UPDATE student 
        SET name=?, place=?, yoa=?, phone=?, dob=?,b_id=?,gender=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$f,$g,$id));
header("location: students.php");

?>