<?php
require("conn.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Booking</title>

<style type="text/css">
	#tables {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin-top: 3%;
}

#tables td, #tables th {
  border: 1px solid #000;
  padding: 8px;
  text-align: center;
}

#tables tr:nth-child(even){background-color: #f2f2f2;}

#tables tr:hover {background-color: #ddd;}

#tables th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
  text-align: center;
}
h1{text-align: center;color: blue;}
</style>
</head>
<body>
<h1>All Booking Details</h1>
			<table id="tables">
				<tr>
					<th>Booking ID</th>
					<th>Patient Name</th>
					<th>Clinic</th>
					<th>Book Service</th>
				</tr>
	 <?php
          $query = "SELECT * FROM booking  JOIN clinic ON booking.clinicID=clinic.clinicID ORDER BY  bookDate, bookTime ASC";
          $result = mysqli_query($dbConn, $query);
               if(mysqli_num_rows($result) > 0)
               {
                 while($row = mysqli_fetch_array($result))
                 {
     ?> 
				<tr>
					<td><?php echo $row["bookNum"];?></td>
					<td><?php echo $row["patientName"]; ?></td>
					<td><?php echo $row["clinicName"];  ?></td>
					<td><?php echo $row["bookService"];  ?></td>
				</tr>
	<?php
	    }
	 }
	?> 			
			</table>
</body>
</html>