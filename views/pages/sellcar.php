<div class="subheader">
    <h1>Sell Your Car</h1>
</div>

<section>
    <form action="#" method="post">
        <label for="model">Car Model:</label>
        <input type="text" name="model" id="model" required>

        <label for="brand">Car Brand:</label>
        <input type="text" name="brand" id="brand" required>

        <label for="year">Manufacture Year:</label>
        <input type="text" name="year" id="year" required>

        <label for="price">Price:</label>
        <input type="text" name="price" id="price" required>

        <label for="name">Your Name:</label>
        <input type="text" name="name" id="name" required>

        <label for="email">Your Email:</label>
        <input type="text" name="email" id="email" required>

        <input type="submit" value="Submit">
    </form>
    <?php
    require_once 'controllers/cars.controller.php';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $model = $_POST['model'];
        $brand = $_POST['brand'];
        $year = $_POST['year'];
        $price = $_POST['price'];
        $name = $_POST['name'];
        $email = $_POST['email'];

        $register = CarController::ctrAdd();

        echo "<br>";
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your car has been listed
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

    }
    ?>
</section>
