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
$sql="SELECT FLIGHT_NO,DEPARTURE,ARRIVAL,TYPE,TOTAL_SEATS,AVAILABLE_SEATS,FLIGHTDATE FROM FLIGHTS"; 

//Εκτέλεση ερωτήματος στην βάση
$result = mysqli_query($conn, $sql);

//Έλεγχος αποτελεσμάτων
if (mysqli_num_rows($result) > 0) { 
	//Εμφάνιση αποτελεσμάτων σε πίνακα - Τίτλος
	echo "<table style='border:1px solid black'>";
	echo "<tr>".
			"<th>Flight No</th>".
			"<th>Departure</th>".
			"<th>Arrival</th>".
			"<th>Type</th>".
			"<th>Total Seats</th>".
			"<th>Available Seats</th>".
			"<th>Flight Date</th>".
			"</tr>";
	//Εισαγωγή δεδομένων σε γραμμές πίνακα
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr>".
				"<td>".$row['FLIGHT_NO']."</td>".
				"<td>".$row['DEPARTURE']."</td>".
				"<td>".$row['ARRIVAL']."</td>".
				"<td>".$row['TYPE']."</td>".
				"<td>".$row['TOTAL_SEATS']."</td>".
				"<td>".$row['AVAILABLE_SEATS']."</td>".
				"<td>".$row['FLIGHTDATE']."</td>".
				"</tr>"; 
	}
	echo "</table>" ; 
} else {
	echo "Δεν βρέθηκαν εγγραφές";
}

//Κλείσιμο σύνδεσης με βάση
mysqli_close($conn); 
?>
