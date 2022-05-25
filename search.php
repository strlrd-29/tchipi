<?php

require_once 'config/connection.php';

$sql = 'SELECT * FROM car';
$result = $connection->query($sql);
$result->setFetchMode(PDO::FETCH_ASSOC);
$brand = '';
$model = '';
$price = 1000;
$error = '';
$price_error = '';


if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['normal'])) {
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $stmnt = $connection->prepare("SELECT * FROM car WHERE brand=:brand AND model=:model;");
    try {
        $stmnt->execute(array('brand' => $brand, 'model' => $model));
        $result = $stmnt;
        $result->setFetchMode(PDO::FETCH_ASSOC);
    } catch (PDOException $pe) {
        echo $pe->getMessage();
    }
}

if (($_SERVER['REQUEST_METHOD'] == 'POST') && (isset($_POST['stored']))) {
    $price = $_POST['price'];
    $sql = 'CALL getCarsByPrice(:price)';
    $stmnt = $connection->prepare($sql);
    try {
        $stmnt->execute(array('price' => $price));
        $result = $stmnt;
        $result->setFetchMode(PDO::FETCH_ASSOC);
    } catch (PDOException $pe) {
        echo $pe->getMessage();
    }
}


?>


<!DOCTYPE html>
<html>

<?php include 'layout/header.php' ?>
<table class=''>
    <thead class="">
        <tr>
            <th>Registration Number</th>
            <th>Car Brand</th>
            <th>Car Model</th>
            <th>Car Price</th>
        </tr>
    </thead>
    <tbody class="">
        <?php if ($result->rowCount() > 0) : ?>
            <?php while ($row = $result->fetch()) : ?>
                <tr class="">
                    <td><?php echo htmlspecialchars($row['immat']) ?></td>
                    <td><?php echo htmlspecialchars($row['brand']) ?></td>
                    <td><?php echo htmlspecialchars($row['model']) ?></td>
                    <td><?php echo htmlspecialchars($row['priceByDay']) ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else : ?>
            <tr>
                <td colspan="4">No cars found!</td>
            </tr>
        <?php endif; ?>
    </tbody>


</table>
<div class="">

    <form action="search.php" method="POST" class="">

        <div class="">
            <label class="" for="brand">
                Brand
            </label>
            <input type="text" id="brand" class="" name="brand" placeholder="Brand" required />
        </div>
        <div class="">
            <label class="" for="model">
                Model
            </label>
            <input type="text" id="model" class="" name="model" placeholder="Model" required />
        </div>
        <input type="hidden" name="normal" />
        <input type="submit" class="" value="Search">

    </form>
    <form action="search.php" method="POST" class="">

        <div class="">
            <label class="" for="locPrice">
                Location Price
            </label>
            <input type="number" id="locPrice" class="" name="price" placeholder="Location Price" required />
        </div>
        <input type="hidden" name="stored" />
        <input type="submit" class="" value="Search">

    </form>
</div>
</div>
</body>
<?php include 'layout/footer.php' ?>

</html>