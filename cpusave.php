<?php
include('check.php');
$category = 'pc';
$name = $_POST['name'];

$core_count = $_POST['core_count'];
$core_clock = $_POST['core_clock'];
$boost_clock = $_POST['boost_clock'];
$tdp = $_POST['tdp'];
$integrated_graphics = $_POST['integrated_graphics'];
$smt = $_POST['smt'];
$website = $_POST['website'];

$price = $_POST['price'];
$userid= $_SESSION['login'];
$sellerusername = $_SESSION['user'];


include('connect.php');
include('upload.php');


$upload = new Upload();

$filename = $upload->up('file1');






$db->query("SET NAMES UTF8");

$sql = "insert into product (category, name, core_count, core_clock, boost_clock, tdp, integrated_graphics, smt, website, pic, userid, price, sellerusername) values ('{$category}' , '{$name}' , '{$core_count}', '{$core_clock}', '{$boost_clock}', '{$tdp}', '{$integrated_graphics}', '{$smt}', '{$website}', '{$filename}', '{$userid}','{$price}','{$sellerusername}')"; //{} can have or not  use it more safe
//die;
//echo $sql = "insert into product (category, name, core_count, core_clock, boost_clock, tdp,  integrated_graphics, ) values ('{$category}')";
$is = $db->query($sql); 
//die;
//echo "you have said bye to the product '$name'";
//die;
 echo "<script>alert('Success！'); window.location.href='selling.php'</script>";
?>

