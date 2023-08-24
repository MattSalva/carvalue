<div class="subheader">
    <h1>Car Dealership Offers</h1>
</div>

<section>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php
        require_once 'controllers/cars.controller.php';
        $cars = CarController::ctrShow();

        foreach ($cars as $car) {
                echo '<div class="col">';
                echo '<div class="card">';
                echo '<div class="card-body">';
                echo "<h5 class='card-title'>{$car[1]}</h5>";
                echo "<h6 class='card-subtitle mb-2 text-muted'>{$car[2]}</h6>";
                echo "<p class='card-text'><strong>Price:</strong> $ {$car[4]}</p>";
                echo "<p class='card-text'><strong>Manufacture Year:</strong> {$car[3]}</p>";
                echo "<p class='card-text'><strong>Owner:</strong> {$car[5]}</p>";
                echo "<p class='card-text'><strong>Contact:</strong> {$car[6]}</p>";
                echo "<div class='d-flex justify-content-between'>";
                echo ($car[7] == 0) ? "<a href='index.php?route=contact&car={$car[0]}' class='btn btn-primary px-5'>Buy</a>" : "<a href='index.php?route=contact&car={$car[0]}' class='btn btn-primary px-5 disabled' role='button' aria-disabled='true'>Reserved</a>";
                $editButton = isset($_SESSION['user']) ? "<a href='#' class='btn btn-secondary px-5 edit-btn' data-bs-toggle='modal' data-bs-target='#editModal{$car[0]}' data-car-id='{$car[0]}' data-brand='{$car[1]}' data-model='{$car[2]}' data-price='{$car[4]}' data-year='{$car[3]}' data-owner='{$car[5]}' data-contact='{$car[6]}'>Edit</a>" : "";
                $deleteButton = isset($_SESSION['user']) ? "<button class='btn btn-danger px-5 delete-btn' data-car-id='{$car[0]}'>Delete</button>" : "";
                echo $editButton;
                echo $deleteButton;
                echo "</div>";
                echo '</div>';
                echo '</div>';
                echo '</div>';

                // Modal
                echo "<div class='modal fade' id='editModal{$car[0]}' tabindex='-1' aria-labelledby='editModalLabel{$car[0]}' aria-hidden='true'>";
                echo '<div class="modal-dialog">';
                echo '<div class="modal-content">';
                echo '<div class="modal-header">';
                echo "<h5 class='modal-title' id='editModalLabel{$car[0]}'>Edit Car Information</h5>";
                echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                echo '</div>';
                echo '<div class="modal-body">';
                echo "
                    <div>
                    <label for=''>Brand: </label>
                    <input type='text' name='brand' id='brand' value='{$car[1]}'>
                    </div>
                    <div>
                    <label for=''>Model: </label>
                    <input type='text' name='model' id='model' value='{$car[2]}'>
                    </div>
                    <div>
                    <label for=''>Price: </label>
                    <input type='text' name='price' id='price' value='{$car[4]}'>
                    </div>
                    <div>
                    <label for=''>Manufacture Year: </label>
                    <input type='text' name='year' id='year' value='{$car[3]}'>
                    </div>
                    <div>
                    <label for=''>Owner: </label>
                    <input type='text' name='year' id='owner' value='{$car[5]}'>
                    </div>
                    <div>
                    <label for=''>Contact: </label>
                    <input type='text' name='year' id='contact' value='{$car[6]}'>
                    </div>
        
                ";
                echo '</div>';
                echo '<div class="modal-footer">';
                echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>';
                echo '<button type="button" class="btn btn-primary save-changes-btn" data-car-id="'.$car[0].'">Save Changes<span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span></button>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';

        }
        ?>
    </div>
</section>
