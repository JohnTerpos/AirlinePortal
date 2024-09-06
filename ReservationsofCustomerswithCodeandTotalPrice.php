<!DOCTYPE html>
<html>
<head>
<title>Αριθμός Κρατήσεων και Συνολικό Κόστος Πελάτη</title>
<meta charset="utf-8">
<style>
	table { border:1px solid black;}
</style> </head>
<body>
<form id="form1" method="post" action="" >
<label for="custom">Εισάγετε κωδικό πελάτη και ημερομηνία: </label>
<input type="text" id="cn" name="cn">
<input type="date" id="rd" name="rd">
<input type="submit" name="submit" value="Αναζήτηση και Υπολογισμός" >
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
if ((isset($_POST['cn']) && isset($_POST['rd'])) && ($_POST['cn']!='' && $_POST['rd']!='') )
{
	$sql="SELECT COUNT(*),SUM(PRICE) FROM RESERVATIONS 
	      WHERE CUSTOM_NO='".$_POST['cn']."' AND 
		  MONTH(RESERVATIONS_DATE)=MONTH('".$_POST['rd']."')";
	
	//Εκτέλεση ερωτήματος στην βάση
    $result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) { 
	   //Εμφάνιση αποτελεσμάτων σε πίνακα - Τίτλος
	     echo "<table style='border:1px solid black'>";
	     echo "<tr>".
			     "<th>Number of Reservations</th>".
			     "<th>Total Price</th>".
			 "</tr>";
	   //Εισαγωγή αποτελεσμάτων σε γραμμή πίνακα
	     $row = mysqli_fetch_assoc($result);
		 echo "<tr>".
				"<td>".$row['COUNT(*)']."</td>".
				"<td>".$row['SUM(PRICE)']."</td>".
		     "</tr>"; 
	    
	    echo "</table>" ; 
   } else {
	    echo "Δεν βρέθηκαν εγγραφές";
    }
}
?>
</body>
</html>
