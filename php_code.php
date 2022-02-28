<?php

require("conn.php");
session_start();
error_reporting(0);

if(isset($_POST['submit']))
{
     
	date_default_timezone_set("Asia/Calcutta");
	$date = $_POST['date'];
	$time = $_POST['time'];

	$patient_name = $_POST['patient_name'];
	$clinic = $_POST['clinic'];
	$Booking_service = $_POST['Booking_service'];

	        $query = "INSERT INTO `booking`( `patientName`, `clinicID`, `bookDate`, `bookTime`, `bookService`) VALUES ('$patient_name','$clinic','$date','$time','$Booking_service')";
            $query_run = mysqli_query($dbConn,$query);
              
             if($query_run)              
             {
                 $_SESSION['alert']="Booking Added Successfully";                        
                 header('Location: newbooking.php');              
             }                            
             else
             {
             	$_SESSION['alert']="Booking Failed !!!";                        
                 header('Location: newbooking.php');
             }
                            
}


if(isset($_POST['submit2']))
{
      $search = $_POST['search'];
      $query = "SELECT * FROM `clinic`";
      $result = mysqli_query($dbConn, $query);
            if(mysqli_num_rows($result) > 0)
              {
                while($row = mysqli_fetch_array($result))
                      {
                        if($row["clinicName"] == $search)
                        {
                            $id = $row["clinicID"];
                        }
                      }
               }       


    date_default_timezone_set("Asia/Calcutta");
    $date = $_POST['date'];
    $time = $_POST['time'];

    $patient_name = $_POST['patient_name'];
    
    $Booking_service = $_POST['Booking_service'];

            $query = "INSERT INTO `booking`( `patientName`, `clinicID`, `bookDate`, `bookTime`, `bookService`) VALUES ('$patient_name','$id','$date','$time','$Booking_service')";
            $query_run = mysqli_query($dbConn,$query);
              
             if($query_run)              
             {
                 $_SESSION['alert']="Booking Added Successfully";                        
                 header('Location: newbooking2.php');              
             }                            
             else
             {
                $_SESSION['alert']="Booking Failed !!! , plz choose correct clinic name";                        
                 header('Location: newbooking2.php');
             }
                            
}



?>