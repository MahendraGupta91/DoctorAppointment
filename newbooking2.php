<?php 
     require("conn.php"); 
     session_start();
     error_reporting(0);

?>
<!DOCTYPE html>
<html>
<head>
	<title>New Booking</title>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
   <script type="text/javascript" src="script.js"></script>

<style type="text/css">
       form{
       	width: 400px;
       	height: auto;
       	margin-left: 34%;
       	margin-top: 2%;
       	background-color: rgba(0,0,0,0.2);
       	padding: 15px 15px;
       	line-height: 12px;
       }	
       form input,select{
              width: 97%;
              padding: 5px 5px;
              outline: none;
              font-size: 18px;
              border: 1px solid black;
       }
       form select{width: 100%;}
       form input[type=submit]{width: 100px; margin-left: 40%;}
       form p {font-size: 20px;font-weight: bold;}
       h1{text-align: center;color: blue;}

       #display ul {
        list-style: none;        
        border: 1px solid grey;
        padding-left: 6px;
        cursor: pointer;
        line-height: 18px;
       }
       #display ul li a{color: green;
        font-size: 16px;text-decoration: none;}
        #display ul li a span{color: #000;
        font-size: 14px;text-decoration: none;font-style: italic;}
       #display #no_result{list-style: none;color: red;margin-top: 6px;}
</style>

</head>
<body> 

<?php

            $msg = $_SESSION['alert'];
            if($_SESSION['alert'])
            {
                echo ' <script type="text/javascript"> alert("'.$msg.'") </script> ';
            }
            unset($_SESSION['alert']);
    ?>

	<h1>New Booking</h1>
        <form method="POST" action="php_code.php">
        	    <p>Patient Name :</p>
    	    	<input type="text" name="patient_name" maxlength="16" required>
    	    	<p>Clinic :</p>
    	    	 <input type="text" id="search" name="search" placeholder="Search" required />
              <div id="display"></div>
    	    	
            <p>Booking Date :</p>
    	    	<input type="date" name="date" required>
    	    	<p>Booking Time :</p>
    	    	<input type="time" name="time" required>
    	    	<p>Booking Service :</p>
    	    	<input type="text" name="Booking_service" maxlength="64" required><br><br>
    	    	<input type="submit" name="submit2">
        </form>
</body>
</html>