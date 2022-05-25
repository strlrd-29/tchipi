<?php

require_once 'config/connection.php';

$sql = 'SELECT * FROM car';
$result = $connection->query($sql);
$result->setFetchMode(PDO::FETCH_ASSOC);
$immat = '';
$nPrice = 0;

if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['update'])) {
    $immat = $_POST['immat'];
    $nPrice = $_POST['nPrice'];
    $stmnt = $connection->prepare("UPDATE car SET priceByDay=:nPrice  WHERE immat=:immat;");
    try {
        $stmnt->execute(array('immat' => $immat, 'nPrice' => $nPrice));
        if (!$stmnt) {
            echo "Error updating record: " . $connection->error;
        }
    } catch (PDOException $pe) {
        echo $pe->getMessage();
    }
}

if (($_SERVER['REQUEST_METHOD'] == 'POST') && (isset($_POST['delete']))) {
    $immat = $_POST['immat'];
    $stmnt = $connection->prepare("DELETE FROM car WHERE immat=:immat;");
    try {
        $stmnt->execute(array('immat' => $immat));
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
        <?php while ($row = $result->fetch()) : ?>
            <tr class="">
                <td><?php echo htmlspecialchars($row['immat']) ?></td>
                <td><?php echo htmlspecialchars($row['brand']) ?></td>
                <td><?php echo htmlspecialchars($row['model']) ?></td>
                <td><?php echo htmlspecialchars($row['priceByDay']) ?></td>

            </tr>
        <?php endwhile; ?>
    </tbody>


</table>
<div class="">

    <form action="cars.php" method="POST" class="">

        <div class="">
            <label class="" for="clientID">
                Registration Number
            </label>
            <input type="text" class="" name="immat" placeholder="Registration Number" required />
        </div>
        <div class="">
            <label class="" for="clientID">
                New Price
            </label>
            <input type="number" class="" name="nPrice" placeholder="New price" required value="" />
            <input type="hidden" name="update" />
        </div>
        <div class="">
            <input type="submit" class="" value="Update">
        </div>

    </form>
    <form action="cars.php" method="POST" class="">

        <div class="">
            <label class="" for="registration">
                Registration Number
            </label>
            <input type="text" class="" name="immat" placeholder="Registration Number" required value="" />
            <input type="hidden" name="delete" />
        </div>
        <div class="">
            <input type="submit" class="" value="Delete">
        </div>

    </form>
</div>
</div>
</body>
<?php include 'layout/footer.php' ?>

</html>