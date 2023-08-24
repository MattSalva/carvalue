
$(document).ready(function() {
    $('.edit-btn').on('click', function() {
        var carId = $(this).data('car-id');
        var modal = $('#editModal' + carId);

        modal.on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal

            modal.find('#brand').val(button.data('brand'));
            modal.find('#model').val(button.data('model'));
            modal.find('#price').val(button.data('price'));
            modal.find('#year').val(button.data('year'));
            modal.find('#owner').val(button.data('owner'));
            modal.find('#contact').val(button.data('contact'));
        });

        modal.find('.save-changes-btn').on('click', function() {
            var saveButton = $(this);
            var spinner = saveButton.find('.spinner-border');

            spinner.removeClass('d-none');

            var editedData = {
                brand: modal.find('#brand').val(),
                model: modal.find('#model').val(),
                price: modal.find('#price').val(),
                year: modal.find('#year').val(),
                owner: modal.find('#owner').val(),
                contact: modal.find('#contact').val()
            };

            $.ajax({
                type: "POST",
                url: "ajax/editcar.ajax.php",
                data: { carId: carId, editedData: editedData },
                success: function(response) {
                    console.log("Car information edited successfully.");
                    updateCardContent(carId, editedData);

                    spinner.addClass('d-none');

                    modal.modal('hide');
                },
                error: function(xhr, status, error) {
                    console.error("Error editing car information: " + error);

                    spinner.addClass('d-none');
                }
            });
        });
    });
});

    function updateCardContent(carId, editedData) {
    var card = $('.edit-btn[data-car-id="' + carId + '"]').closest('.card');

    card.find('.card-title').text(editedData.brand);
    card.find('.card-subtitle').text(editedData.model);
    card.find('.card-text:eq(0)').html('<strong>Price:</strong> $ ' + editedData.price);
    card.find('.card-text:eq(1)').html('<strong>Manufacture Year:</strong> ' + editedData.year);
    card.find('.card-text:eq(2)').html('<strong>Owner:</strong> ' + editedData.owner);
    card.find('.card-text:eq(3)').html('<strong>Contact:</strong> ' + editedData.contact);
}
