<?php
include('check.php');
$category = 'car';
$name = $_POST['name'];
$make = $_POST['make'];
$model = $_POST['model'];
$year = $_POST['year'];
$website = $_POST['website'];
$price = $_POST['price'];
$userid= $_SESSION['login'];
$sellerusername = $_SESSION['user'];


include('connect.php');
include('upload.php');


$upload = new Upload();

$filename = $upload->up('file1');






$db->query("SET NAMES UTF8");

$sql = "insert into product (category, name, make, model, year, website, pic, userid, price, sellerusername) values ('{$category}' , '{$name}' , '{$make}','{$model}', '{$year}', '{$website}', '{$filename}', '{$userid}','{$price}','{$sellerusername}')"; //{} can have or not  use it more safe
//die;
//echo $sql = "insert into product (category) values ('{$category}')";
$is = $db->query($sql); 
//die;
//echo "you have said bye to the product '$name'";

 echo "<script>alert('Success！'); window.location.href='selling.php'</script>";
?>

