<?php
//Step1

 $db = mysqli_connect('******','******','******','******')
 or die('Error connecting to MySQL server.');
?>

<html>
 <head>
 <link rel="stylesheet" type="text/css" href="GradePage.css">
 </head>
 <body>
 <h1>Hack Street Boyz</h1>

<table class="striped">
            <tr class="header">
                <td style="font-weight:bold;">Team Name</td>
                <td style="font-weight:bold;">Grade</td>
            </tr>

<?php

//Step2
$query = "SELECT * FROM ******";
mysqli_query($db, $query) or die('Error querying database.');

//Step3
$result = mysqli_query($db, $query);

while ($row = mysqli_fetch_array($result)) {
   echo "<tr>";
                   echo "<td>".$row[Username]."</td>";
                   echo "<td>".$row[Grade]."</td>";
                   echo "</tr>";
}

//Step 4
mysqli_close($db);
?>

</table>
</body>
</html>