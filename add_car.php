<?php
require_once 'config/connection.php';
$data = [
    'immat' => '',
    'brand' => '',
    'model' => '',
    'priceByDay' => 0,
];


$sql = '
    INSERT INTO car (immat, brand, model, priceByDay) VALUES (:immat, :brand, :model, :priceByDay);
';
$stmt = $connection->prepare($sql);



if (isset($_POST['submit'])) {
    if (isset($_POST['immat']) && isset($_POST['brand']) && isset($_POST['model']) && isset($_POST['priceByDay'])) {
        $data['immat'] = $_POST['immat'];
        $data['brand'] = $_POST['brand'];
        $data['model'] = $_POST['model'];
        $data['priceByDay'] = (float) $_POST['priceByDay'];
        try {
            $stmt->execute($data);
            $data['immat'] = '';
            $data['brand'] = '';
            $data['model'] = '';
            $data['priceByDay'] = 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php
include 'layout/header.php';
?>

<form action='add_car.php' class="" method="POST">
    <div class="">
        <div class="">
            <label class="" for="immat">
                Registration Number
            </label>
            <input required class="" id="immat" type="text" name="immat" placeholder="Registration Number" />
        </div>
        <div class="">
            <label class="" for="brand">
                Car Brand
            </label>
            <input required class="" id="brand" type="text" name="brand" placeholder="Car Brand" />
        </div>
        <div class="">
            <label class="" for="model">
                Car Model
            </label>
            <input required class="" id="model" type="text" name="model" placeholder="Car Model" />
        </div>
        <div class="">
            <label class="" for="price">
                Car Price by Day
            </label>
            <input required class="" id="priceByDay" type="number" name="priceByDay" placeholder="Car Price by Day" />
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