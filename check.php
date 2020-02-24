<?php
include('connect.php');


session_start();

//var_dump($_POST);
//exit;
$user = isset($_POST['user'])? $_POST['user'] : ''; 
$pwd = isset($_POST['pwd'])? $_POST['pwd'] : ''; 
if( !empty($user) && !empty($pwd)){

    $sql = "select * from account where user='{$user}' and pwd='{$pwd}'";
    $mysqli_result = $db-> query($sql);
    $row = $mysqli_result->fetch_array(MYSQLI_ASSOC);
    
    
    
    
   
    if ( is_array($row)) {   
        $sql = "select userid from account where user='{$user}' and pwd='{$pwd}'";
        $idr = $db-> query($sql);

        $row=$idr->fetch_array(MYSQLI_ASSOC);
        
        
        $login = $row['userid'];
        
   
        
        $_SESSION['login'] = $row['userid'];
        $_SESSION['user'] = $user;
        ////////////////////
        $row2 =[];
        $sql = "select email2 from account where user='{$user}' and pwd='{$pwd}'";
        $em = $db-> query($sql);

        $row2=$em->fetch_array(MYSQLI_ASSOC);
        $email2 = $row2['email2'];
        $_SESSION['email2'] = $email2;
        
        $row3 =[];
        $sql = "select Firstname from account where user='{$user}' and pwd='{$pwd}'";
        $fn = $db-> query($sql);

        $row3=$fn->fetch_array(MYSQLI_ASSOC);
        $firstname = $row7['Firstname'];
        $_SESSION['Firstname'] = $firstname;

        /////////////////////
        $row4 =[];
        $sql = "select lastname from account where user='{$user}' and pwd='{$pwd}'";
        $ln = $db-> query($sql);

        $row4=$ln->fetch_array(MYSQLI_ASSOC);
        $lastname = $row8['lastname'];
        $_SESSION['lastname'] = $lastname;

        /////////////////////
        $row5 =[];
        $sql = "select phone from account where user='{$user}' and pwd='{$pwd}'";
        $ph = $db-> query($sql);

        $row5=$ph->fetch_array(MYSQLI_ASSOC);
        $phone = $row9['phone'];
        $_SESSION['phone'] = $phone;













        
        
        header("location: index.php");
        exit;
    }else{
       
   
		echo "<script>alert('Please log in first.'); window.location.href='login.php'</script>";
        die('login fail');
    }
}


?>