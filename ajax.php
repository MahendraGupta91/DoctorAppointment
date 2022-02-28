<?php
//Including Database configuration file.
include "conn.php";
//Getting value of "search" variable from "script.js".
if (isset($_POST['search'])) {
//Search box value assigning to $Name variable.
   $Name = $_POST['search'];
//Search query.
   $Query = "SELECT `clinicName`, `clinicAddress` FROM `clinic` WHERE clinicName LIKE '%$Name%' LIMIT 5";
//Query execution
   $ExecQuery = MySQLi_query($dbConn, $Query);
   if(mysqli_num_rows($ExecQuery) > 0)
   {
//Creating unordered list to display result.
   echo '
<ul>
   ';
   //Fetching result from database.
   while ($Result = MySQLi_fetch_array($ExecQuery)) {
?>
   <!-- Creating unordered list items.
        Calling javascript function named as "fill" found in "script.js" file.
        By passing fetched result as parameter. -->
   <li onclick='fill("<?php echo $Result['clinicName']; ?>")'>

   <!-- You can add here link of your Clinic Page --> 
   <a href="Clinic/<?php echo $Result['clinicName']; ?>.php" target="_blank"> 

   <!-- Assigning searched result in "Search box" in "search.php" file. -->
       <?php echo $Result['clinicName']; ?>
       <?php echo '<span>'.", Address :".$Result['clinicAddress'].'</span>'; ?>
       </a>
   </li>


  <?php 

   }
 }
 else
 {
     
?>
    <li  id="no_result" >
    
   <!-- Assigning searched result in "Search box" in "search.php" file. -->
       <?php echo "No Clinic Name Matches, Please choose another "; ?>
       
   </li>
   

   <!-- Below php code is just for closing parenthesis. Don't be confused. -->
   <?php
 }
}
?>
</ul>