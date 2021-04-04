<?php
require "../model/db_connection.php";
include "../model/makes_db.php";

?>

<header class="list_row list_header">
    <h1>Vehicle Makes</h1>
</header>


<?php
$query = $db->prepare("SELECT * FROM make");
$query->execute();
$result = $query->fetchall();


?>

<?php

echo
"<table border='2'>
    <tr>
    <th>Name</th>
  
    </tr>"
;

foreach($result as $row)
{
    echo "<tr>";
    echo "<td>" . $row['makeName'] . "</td>";

    echo "<td> <input type=\"button\" value=\"Delete\"onClick=\accept.php?id=" . $row['makeID'] . "&start=true></td>";
}

echo "</tr>";
echo "</table>";
?>

<section id="add" class="add">
    <form action="admin_class.php" method="post" id="add_form" class="add_form">
        <input type="hidden" name="action" value="add_class">
        <div class="add_inputs"><br>


            <input type="text" name="makeName" maxlength="50" placeholder="Name" autofocus required>
        </div>
        <div class="add_addClass">
            <button href="." class="add-button bold">Add</button>
        </div>
    </form>

    <p><a href="../admin.php">Click Here To View Vehicle List</a></p>
    <p><a href="../view/admin_vehicle.php">Click Here To Add Vehicle</a></p>
    <p><a href="../view/admin_make.php">View/Edit Makes</a></p>
    <p><a href="../view/admin_type.php">View/Edit Types</a></p>
    <p><a href="../view/admin_class.php">View/Edit Classes</a></p>

</section>
<?php
include'../view/footer.php';
?>
