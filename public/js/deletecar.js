$(document).ready(function() {
    $('.delete-btn').on('click', function() {
        var carId = $(this).data('car-id');
        var clickedButton = $(this);

        if (confirm("Are you sure you want to delete this car?")) {
            $.ajax({
                type: "GET",
                url: "ajax/deletecar.ajax.php",
                data: { car: carId },
                success: function(response) {
                    console.log("Car deleted successfully.");
                    clickedButton.closest('.col').remove();
                },
                error: function(xhr, status, error) {
                    console.error("Error deleting car: " + error);
                }
            });
        }
    });
});