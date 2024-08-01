<?php
include_once('connection.php');
?>
<body style='background:green;'>
<table id="customers">
    <tr>
        <th></th><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th><th>Friday</th><th>Saturday</th><th>Sunday</th>
    </tr>
    <?php
    $sql = "select * from booking where user_id='$_SESSION[tiffin_id]' ";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($query);

    $b = $row[2];
    $l = $row[3];
    $d = $row[4];

    echo "<tr><h1 style='font-size:20px;color:white;margin-left:250px;'>You Booked On : $row[7]<br><br></h1></tr>";

    $mealTypes = ["Breakfast", "Lunch", "Dinner"];

    foreach ($mealTypes as $mealType) {
        $mealData = $row[($mealType == 'Breakfast') ? 1 : (($mealType == 'Lunch') ? 8 : 15)];

        if ($mealData != "") {
            echo "<tr>";
            echo "<th>$mealType</th>";
            for ($i = 0; $i < 7; $i++) {
                $index = ($mealType == 'Breakfast') ? $i + 1 : (($mealType == 'Lunch') ? $i + 8 : $i + 15);
                echo "<td>$row[$index]</td>";
            }
            echo "</tr>";
        }
    }
    ?>
</table>


</body>
