<main>


    <h1>Add Vehicle</h1>
    <form action="add_vehicles.php" method="post" id="add_vehicle_form">
        <input type="hidden" name="action" value="add_vehicle">


        <?php
        $pdo = new PDO('mysql:host=localhost;dbname=zippyusedautos', 'root', 'sesame');
        $sql = "SELECT makeName FROM make";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


        if ($stmt->rowCount() > 0) { ?>
            <select name="makeName">
                <option>View All Makes</option>
                <?php foreach ($results as $row) { ?>

                    <option value="<?php echo $row['makeName']; ?>"><?php echo $row['makeName']; ?></option>
                <?php } ?>
            </select>
        <?php } ?><br><br>

        <?php
        $pdo = new PDO('mysql:host=localhost;dbname=zippyusedautos', 'root', 'sesame');
        $sql = "SELECT typeName FROM type";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() > 0) { ?>
            <select name="modelName">
                <option>View All Types</option>
                <?php foreach ($results as $row) { ?>

                    <option value="<?php echo $row['typeName']; ?>"><?php echo $row['typeName']; ?></option>
                <?php } ?>
            </select>
        <?php } ?><br><br>

<?php
$pdo = new PDO('mysql:host=localhost;dbname=zippyusedautos', 'root', 'sesame');
$sql = "SELECT className FROM class";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() > 0) { ?>
        <select name="className">
            <option>View All Classes</option>
            <?php foreach ($results as $row) { ?>

                <option value="<?php echo $row['className']; ?>"><?php echo $row['className']; ?></option>
            <?php } ?>
        </select>
<?php } ?>
            <br>
        <label>Year:</label>
        <input type="text" name="year" />
        <br>

        <label>Model:</label>
        <input type="text" name="model" />
        <br>

        <label>Price:</label>
        <input type="text" name="price" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Vehicle" />
        <br>
    </form>

    <p><a href="../admin.php">Click Here To View Vehicle List</a></p>
    <p><a href="../view/admin_vehicle.php">Click Here To Add Vehicle</a></p>
    <p><a href="../view/admin_make.php">View/Edit Makes</a></p>
    <p><a href="../view/admin_type.php">View/Edit Types</a></p>
    <p><a href="../view/admin_class.php">View/Edit Classes</a></p>
    <p class="last_paragraph">
        <a href="../admin.php">View Vehicle List</a>
    </p>

</main>
