<?php
require "../model/db_connection.php";
include "../model/classes_db.php";

?>

<header class="list_row list_header">
    <h1>Vehicle Classes</h1>
</header>


<?php
$query = $db->prepare("SELECT * FROM make");
$query->execute();
$result = $query->fetchall();


?>

<?php
echo
"<table border='2' class='table-primary'>
    <tr>
        <th>Year</th>
        <th>Action</th>


    </tr>"

?>

<?php $types = get_types();

foreach ($types as $type) : ?>
    <tr>
        <td><?php echo $type['typeName']; ?></td>





        <td><form action="delete.php" method="post">
                <input type="hidden" name="typeID"
                       value="<?php echo $type['typeID']; ?>">
                <input type="hidden" name="typeID"
                       value="<?php echo $type['typeID']; ?>">
                <input  type="submit" value="Delete">
            </form></td>
    </tr>
<?php endforeach; ?>
</table>







<section id="add" class="add">
    <form action="admin_class.php" method="post" id="add_form" class="add_form">
        <input type="hidden" name="action" value="add_class">
        <div class="add_inputs"><br>


            <input type="text" name="className" maxlength="50" placeholder="Name" autofocus required>
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
