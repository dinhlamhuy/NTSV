<?php

// session_start();
// ob_start();
    // $conn=mysqli_connect ("127.0.0.1", "root", "", "ntsv");
    
    $conn=mysqli_connect ("127.0.0.1", "root", "", "ntsv");
    
    mysqli_set_charset($conn, 'UTF8');
    date_default_timezone_set('Asia/Saigon'); 
	$date_current = '';
    $date_current = date("Y-m-d H:i:sa");
    $hourht  = substr($date_current, 11, 2); 
    $minht  = substr($date_current, 14, 2); 
    
    if (isset($_SESSION['current_user']) )
	{
        // if (!empty($_GET['id'])){

        //     $id_to=$_GET['id'];
        // }
        $_SESSION['date_login']=date('Y-m-d H:i:s');
        $usr = $_SESSION['current_user'];
        if ($usr['hoatdong'] == '0') {
            $tt = mysqli_query($conn, "UPDATE `user` SET `hoatdong`='1', `lastupdate_user` ='". $_SESSION['date_login'] ."' WHERE `id_user`='" . $usr['id_user'] . "'");
            
        } 
        $thoigian=mysqli_query($conn, "SELECT * FROM `user` WHERE `id_user`='" . $usr['id_user'] . "' ");
        while ($rowtime=mysqli_fetch_assoc($thoigian)){
        $date = $rowtime['lastupdate_user'];
        $hour  = substr($date, 11, 2); 
        $min  = substr($date, 14, 2); 

//         var_dump($minht);
// var_dump($min); 
// var_dump($minht-$min); 
       
        // if ($minht-$min > 2 || $hourht -$hour >= 1){
           
        //     $tt=mysqli_query($conn, "UPDATE `user` SET `hoatdong`='0', `lastupdate` ='". date('Y-m-d H:i:s') ."' WHERE `user_id`='".$user['user_id']."'");
        //     unset($_SESSION['current_user']);
        //     unset($_SESSION['id_to']);

        // }

    }
    

	}
	else{
		$usr = '';
    }
 
    
?>
