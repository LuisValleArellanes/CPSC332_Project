<head>

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
  <style>

table

{

border-style:solid;

border-width:5px;

}

</style>
</head>

<?php

include "Connect.php";

$keywordfromform_Prof_Course= $_GET["keyword_Section_Num"];
$keywordfromform_Prof_Section= $_GET["keyword_Prof_Grades"];

echo "Searching For:<br>";
echo "Course Number: ".$keywordfromform_Prof_Course."<br>";
echo "Section Number: ".$keywordfromform_Prof_Section."<br>";

//Search database for Course and Section

$sql = "SELECT Grade, COUNT(*) as count
FROM Enrollment_Records INNER JOIN Section
ON Enrollment_Records.Section_Num = Section.Section_Num
WHERE Section.Course_Num LIKE '%".$keywordfromform_Prof_Course."%'  AND Section.Section_Num LIKE '%".$keywordfromform_Prof_Section."%'
GROUP BY Grade";

$result = $mysqli->query($sql);

if ($keywordfromform_Prof_Course == NULL|| $keywordfromform_Prof_Section == NULL) {
  
	echo "<h2> Please enter a Course and Section </h2>";

	} else if ($result->num_rows > 0) {
  
		echo "<h2> Showing Grades and Student Count </h2>";
		// output data of each row
		echo "<table border='1'>
			<tr>
			<th>Grade</th>
			<th>Students with Grade</th>
			</tr>";

		while($row = $result->fetch_assoc()) {
	   
			echo "<tr>";
			echo "<td>" . $row['Grade'] . "</td>";
			echo "<td>" . $row['count'] . "</td>";
			echo "</tr>";
     
		}
  
} 
else {
	
	echo "<h2> Cannot Find Course and Section </h2>";
  
}

?>
