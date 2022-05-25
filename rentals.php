<?php

require_once 'config/connection.php';

$sql = 'SELECT * FROM rental';
$result = $connection->query($sql);
$result->setFetchMode(PDO::FETCH_ASSOC);

$rentalID = '';
$lDate = '';


if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['update'])) {
    $rentalID = $_POST['rentalID'];
    $lDate = $_POST['lDate'];
    $stmnt = $connection->prepare("UPDATE rental SET eDate=:lDate  WHERE rentalID=:rentalID;");
    try {
        $stmnt->execute(array('rentalID' => $rentalID, 'lDate' => $lDate));
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
            <th>Rental ID</th>
            <th>Location Date</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Rental Type</th>
            <th>Registration number</th>
            <th>Client ID</th>
        </tr>
    </thead>
    <tbody class="">
        <?php while ($row = $result->fetch()) : ?>
            <tr class="">
                <td><?php echo htmlspecialchars($row['rentalID']) ?></td>
                <td><?php echo htmlspecialchars($row['locDate']) ?></td>
                <td><?php echo htmlspecialchars($row['sDate']) ?></td>
                <td><?php echo htmlspecialchars($row['eDate']) ?></td>
                <td><?php echo htmlspecialchars($row['rentalType']) ?></td>
                <td><?php echo htmlspecialchars($row['immat']) ?></td>
                <td><?php echo htmlspecialchars($row['idClient']) ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>


</table>
<div class="">

    <form action="rentals.php" method="POST" class="">

        <div class="">
            <label class="" for="rentalID">
                Rental ID
            </label>
            <input type="text" class="" name="rentalID" placeholder="Rental ID" required />
        </div>
        <div class="">
            <label class="" for="clientID">
                New End Date
            </label>
            <input type="date" class="" name="lDate" placeholder="End Date" required />
            <input type="hidden" name="update" />
        </div>
        <div class="">
            <input type="submit" class="" value="Update">
        </div>

    </form>

</div>
</div>
</body>
<?php include 'layout/footer.php' ?>

</html>