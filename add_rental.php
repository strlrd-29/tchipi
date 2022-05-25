<?php
require_once 'config/connection.php';


$data = [
    'idClient' => '',
    'immat' => '',
    'locDate' => '',
    'sDate' => '',
    'eDate' => '',
    'rentalType' => ''
];


$sql = 'INSERT INTO rental (locDate, sDate, eDate, rentalType, immat, idClient) VALUES (:locDate, :sDate, :eDate, :rentalType, :immat, :idClient);';
$stmt = $connection->prepare($sql);



if (isset($_POST['submit'])) {
    if (isset($_POST['idClient']) && isset($_POST['immat']) && isset($_POST['locDate']) && isset($_POST['sDate']) && isset($_POST['eDate']) && isset($_POST['rentalType'])) {
        $data['idClient'] = $_POST['idClient'];
        $data['immat'] = $_POST['immat'];
        $locDate = strtotime($_POST['locDate']);
        $data['locDate'] = date('Y-m-d', $locDate);
        $sDate = strtotime($_POST['sDate']);
        $data['sDate'] = date('Y-m-d', $sDate);
        $eDate = strtotime($_POST['eDate']);
        $data['eDate'] = date('Y-m-d', $eDate);
        $data['rentalType'] = $_POST['rentalType'];
        try {
            $stmt->execute($data);
            $data['idClient'] = '';
            $data['immat'] = '';
            $data['locDate'] = '';
            $data['sDate'] = '';
            $data['eDate'] = '';
            $data['rentalType'] = '';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        echo "Please fill in all fields";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php
include 'layout/header.php';
?>

<form action='add_rental.php' class="" method="POST">
    <div class="">
        <div class="">
            <label class="" for="clientID">
                Client ID
            </label>
            <input required class="" id="clientID" type="text" name="idClient" placeholder="Please enter a clientID" />
        </div>
        <div class="">
            <label class="" for="immat">
                Registration Number
            </label>
            <input required class="" id="immat" type="text" name="immat" placeholder="Please enter a registration number" />
        </div>
        <div class="">
            <label class="" for="locDate">
                Location Date
            </label>
            <input required class="" id="locDate" type="date" name="locDate" placeholder="Location Date" />
        </div>
        <div class="">
            <label class="" for="sDate">
                Start Date
            </label>
            <input required class="" id="sDate" type="date" name="sDate" placeholder="Start Date" />
        </div>
        <div class="">
            <label class="" for="eDate">
                End Date
            </label>
            <input required class="" id="eDate" type="date" name="eDate" placeholder="End Date" />
        </div>
        <div class="">
            <label class="" for="rentalType">
                Rental Type
            </label>
            <select name='rentalType' id="rentalType" class="">
                <option value="WD">With Driver</option>
                <option value="ND">Without Driver</option>
            </select>
        </div>

        <div class="">
            <input type='submit' value='submit' name='submit' class='' />
        </div>
    </div>
</form>
</div>

</body>

<?php
include 'layout/footer.php';
?>

</html>