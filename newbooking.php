<?php 
     require("conn.php"); 
     session_start();
     error_reporting(0);

?>
<!DOCTYPE html>
<html>
<head>
	<title>New Booking</title>

<style type="text/css">
       form{
       	width: 400px;
       	height: 500px;
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
    	    	<select name="clinic" required>
   <?php
    	     $query = "SELECT * FROM `clinic`";
             $result = mysqli_query($dbConn, $query);
           if(mysqli_num_rows($result) > 0)
             {
                while($row = mysqli_fetch_array($result))
                      {
    ?> 
    	    	<option value="<?php echo $row["clinicID"]; ?>"><?php echo $row["clinicName"]; ?></option>
<?php
   } 
}
?>    	    		
    	    	</select>
    	    	<p>Booking Date :</p>
    	    	<input type="date" name="date" required>
    	    	<p>Booking Time :</p>
    	    	<input type="time" name="time" required>
    	    	<p>Booking Service :</p>
    	    	<input type="text" name="Booking_service" maxlength="64" required><br><br>
    	    	<input type="submit" name="submit">
        </form>
</body>
</html>