<!DOCTYPE html>
<html>
<body>
<head>
<title>Κρατήσεις Πελάτων σε συγκερκιμένη πτήση</title>
<meta charset="utf-8">
<style>
	table { border:1px solid black;}
</style> </head>
<form id="form1" method="post" action="">
  <label for="flights">Επιλέξτε Κωδικό Πτήσης:</label>
  <select name="flights" id="flights">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
  </select>
  <br><br>
  <input type="submit" name="submit" value="Get Reservations Customers">
</form><br><br>
<?php
//Αριθμός Ομάδας:09
//Ονοματεπώνυμο φοιτητή1:Ιωάννης Τέρπος	ΑΜ:18390208
//Ονοματεπώνυμο φοιτητή2:Ιωάννης Τριανταφυλλόπουλος	ΑΜ:161244
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CHARTED_AIRLINES";

//Εκτέλεση σύνδεσης
$conn=
mysqli_connect($servername, $username, $password, $dbname);

//Έλεγχος σύνδεσης
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

//Ορισμός charset  σύνδεσης
mysqli_set_charset($conn, "utf8");

//Σύνταξη ερωτήματος
if (isset($_POST['flights']) && $_POST['flights']!='' )
{
    $sql="SELECT FLIGHT_NO,CUSTOMERS.CUSTOM_NO,SURNAME,NAME,CITIZENSHIP,BIRTHDATE FROM reservations,customers 
	      WHERE customers.CUSTOM_NO=reservations.CUSTOM_NO AND FLIGHT_NO='".$_POST['flights']."'";
    //Εκτέλεση ερωτήματος στην βάση
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) { 
	   //Εμφάνιση αποτελεσμάτων σε πίνακα - Τίτλος
	     echo "<table style='border:1px solid black'>";
	     echo "<tr>".
			     "<th>Flight No</th>".
			     "<th>Custom No</th>".
			     "<th>Surname</th>".
			     "<th>Name</th>".
			     "<th>Citizenship</th>".
			     "<th>Birthdate</th>".
			 "</tr>";
	   //Εισαγωγή δεδομένων σε γραμμές πίνακα
	   while($row = mysqli_fetch_assoc($result)) {
		   echo "<tr>".
				   "<td>".$row['FLIGHT_NO']."</td>".
				   "<td>".$row['CUSTOM_NO']."</td>".
				   "<td>".$row['SURNAME']."</td>".
				   "<td>".$row['NAME']."</td>".
				   "<td>".$row['CITIZENSHIP']."</td>".
				   "<td>".$row['BIRTHDATE']."</td>".
				"</tr>"; 
	    }
	    echo "</table>" ; 
   } else {
	    echo "Δεν βρέθηκαν εγγραφές";
    }
}

//Κλείσιμο σύνδεσης με βάση
mysqli_close($conn); 
?>
</body>
</html>
