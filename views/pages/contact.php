<div class="subheader">
    <h1>Contact us!</h1>
</div>

<section>
    <form action="#" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>

        <label for="email">Email:</label>
        <input type="text" name="email" id="email" required>

        <label for="message">Message:</label>
        <textarea name="message" id="message" rows="4" required></textarea>
        <input type="submit" value="Submit" class="mt-2">
    </form>
    <?php


    require_once 'controllers/cars.controller.php';

    if (isset($_GET['car']))  $car = $_GET["car"];
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        if (isset($car)){
            CarController::ctrSell($car);
        }

        echo '<div class="alert alert-success p-5 m-5 text-center fw-bold" role="alert"> Thanks for reaching us! We will get back to you!</div>';
    }
    ?>
</section>
