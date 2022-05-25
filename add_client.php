<?php
require_once 'config/connection.php';

$data = [
    'idClient' => '',
    'fname' => '',
    'lname' => '',
    'phone' => '',
    'street' => '',
    'city' => '',
    'job' => ''
];



$errors = array('fname' => "", 'lname' => "", 'phone' => "", 'street' => "", 'street' => '', 'city' => '', 'job' => '', 'idClient' => '');


$sql = '
    INSERT INTO client (idClient, fName, lName, phone, street, city, job) VALUES (:idClient, :fname, :lname, :phone, :street, :city, :job);
';
$stmt = $connection->prepare($sql);



if (isset($_POST['submit'])) {
    if (isset($_POST['idClient']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['phone']) && isset($_POST['street']) && isset($_POST['city']) && isset($_POST['job'])) {
        $data['idClient'] = $_POST['idClient'];
        $data['fname'] = $_POST['fname'];
        $data['lname'] = $_POST['lname'];
        $data['phone'] = $_POST['phone'];
        $data['street'] = $_POST['street'];
        $data['city'] = $_POST['city'];
        $data['job'] = $_POST['job'];
        try {
            $stmt->execute($data);
            $data['idClient'] = '';
            $data['fname'] = '';
            $data['lname'] = '';
            $data['phone'] = '';
            $data['street'] = '';
            $data['city'] = '';
            $data['job'] = '';
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

<form action='add_client.php' class="" method="POST">
    <div class="">
        <div class="">
            <label class="" for="idClient">
                Client ID
            </label>
            <input required class="" id="idClient" type="text" name="idClient" placeholder="Client ID" />
        </div>
        <div class="">
            <label class="" for="fname">
                First Name
            </label>
            <input required class="" id="fname" type="text" name="fname" placeholder="First Name" />
        </div>
        <div class="">
            <label class="" for="lname">
                Last Name
            </label>
            <input required class="" id="lname" type="text" name="lname" placeholder="Last Name" value="" />
        </div>
        <div class="">
            <label class="" for="phone">
                Phone Number
            </label>
            <input required class="" id="phone" type="text" name="phone" placeholder="Phone Number">
        </div>
        <div class="">
            <label class="" for="street">
                Street
            </label>
            <input required class="" maxlength="20" id="street" type="text" name="street" placeholder="Street" />
        </div>
        <div class="">
            <label class="" for="city">
                City
            </label>
            <input required class="" id="city" type="text" name="city" placeholder="City" />
        </div>
        <div class="">
            <label class="" for="job">
                Job
            </label>
            <input required class="" id="job" type="text" name="job" placeholder="Job" />
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