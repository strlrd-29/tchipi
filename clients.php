<?php

require_once 'config/connection.php';

$sql = 'SELECT * FROM client';
$result = $connection->query($sql);
$result->setFetchMode(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html>

<?php include 'layout/header.php' ?>
<table class=''>
    <thead class="">
        <tr>
            <th>Client ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone number</th>
            <th>Street</th>
            <th>City</th>
            <th>Job</th>
        </tr>
    </thead>
    <tbody class="">
        <?php while ($row = $result->fetch()) : ?>
            <tr class="">
                <td><?php echo htmlspecialchars($row['idClient']) ?></td>
                <td><?php echo htmlspecialchars($row['fName']) ?></td>
                <td><?php echo htmlspecialchars($row['lName']) ?></td>
                <td><?php echo htmlspecialchars($row['phone']) ?></td>
                <td><?php echo htmlspecialchars($row['street']) ?></td>
                <td><?php echo htmlspecialchars($row['city']) ?></td>
                <td><?php echo htmlspecialchars($row['job']) ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
</div>
</body>
<?php include 'layout/footer.php' ?>

</html>