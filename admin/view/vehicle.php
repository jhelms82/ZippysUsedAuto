<?php include('../view/header.php') ?>



<nav>
    <form action="." method="get" id="make_selection">
        <section id="dropmenus" class="dropmenus">
            <?php if ($makes) { ?>
            <label>Make:</label>
            <select name="make_id">
                <option value="0">View All Makes</option>
                <?php foreach ($makes as $make) : ?>
                <?php if ($make['ID'] == $make_id) { ?>
                <option value="<?= $make['ID']; ?>" selected>
                    <?php } else { ?>
                <option value="<?= $make['ID']; ?>">
                    <?php } ?>
                    <?= $make['Make']; ?>
                </option>
                <?php endforeach; ?>
            </select>
            <?php } ?>


            <?php if ($types) { ?>
            <label>Types:</label>
            <select name="type_id">
                <option value="0">View All Types</option>
                <?php foreach ($types as $type) : ?>
                <?php if ($type['ID'] == $type_id) { ?>
                <option value="<?= $type['ID']; ?>" selected>
                    <?php } else { ?>
                <option value="<?= $type['ID']; ?>">
                    <?php } ?>
                    <?= $type['Type']; ?>
                </option>
                <?php endforeach; ?>
            </select>
            <?php } ?>

            <?php if ($classes) { ?>
            <label>Class:</label>
            <select name="class_id">
                <option value="0">View All Classes</option>
                <?php foreach ($classes as $class) : ?>
                <?php if ($class['ID'] == $class_id) { ?>
                <option value="<?= $class['ID']; ?>" selected>
                    <?php } else { ?>
                <option value="<?= $class['ID']; ?>">
                    <?php } ?>
                    <?= $class['Class']; ?>
                </option>
                <?php endforeach; ?>
            </select>
            <?php } ?>
        </section>
        <section id="sortBy" class="sortBy">
            <div>
                <span>Sort by: </span>
                <input type="radio" id="sortByPrice" name="sort" value="price" checked>
                <label for="sortByPrice">Price</label>
                <input type="radio" id="sortByYear" name="sort" value="year">
                <label for="sortByYear">Year</label>
                <input type="submit" value="Submit" class="button blue button-slim">
            </div>
        </section>
    </form>
</nav>
<section>
    <?php 
     $vehicles = get_all_vehicle ($sort);
    if($vehicles) { ?>
    <div id="table-overflow-customer" class="table-overflow-customer">
        <table>
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Type</th>
                    <th>Class</th>
                    <th>Price</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody><?php
                $vehicles = get_all_vehicle($sort);

foreach ($vehicles as $vehicle) : ?>
    <tr>
        <td><?php echo $vehicle['year']; ?></td>
        <td><?php echo $vehicle['Make']; ?></td>
        <td><?php echo $vehicle['model']; ?></td>
        <td><?php echo $vehicle['Type']; ?></td>
        <td><?php echo $vehicle['Class']; ?></td>
        <td><?php echo $vehicle['price']; ?></td>


        <td><form action="." method="post">
                <input type="hidden" name="action"
                       value="delete_vehicle">
                <input type="hidden" name="vehicleID"
                       value="<?php echo $vehicle['ID']; ?>">
                <input  type="submit" value="Delete">
            </form></td>
                </tr>
                <?php endforeach; ?>
                  <?php } ?>
            </tbody>
        </table>

    <p><a href="view/add_vehicles.php">Click Here To Add Vehicle</a></p>
    <p><a href="view/admin_make.php">View/Edit Makes</a></p>
    <p><a href="view/admin_type.php">View/Edit Types</a></p>
    <p><a href="view/admin_class.php">View/Edit Classes</a></p>

</section>
<?php include('../view/footer.php') ?>