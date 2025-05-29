<!-- Booking Form -->
<div class="container-fluid" style="background-color: #fdf6e3; color: #333; padding: 10px; border-radius: 20px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); width: 400px;">
    <form action="" id="book-form">
        <div class="form-group">
            <input name="package_id" type="hidden" value="<?php echo $_GET['package_id'] ?>" >
            <input type="date" class='form form-control' required name='schedule' id='selected-date' style="background-color: #ffffff; color: #495057; border: 1px solid #ced4da;">
        </div>
        <!-- Payment Method Dropdown -->
        <div class="form-group">
            <label for="payment-method">Select Payment Method:</label>
            <select class="form-control" id="payment-method" required style="background-color: #ffffff; color: #495057; border: 1px solid #ced4da;">
                <option value="credit_card">Credit Card</option>
                <option value="gpay">Google Pay</option>
                <option value="offline">Offline Payment</option>
            </select>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#payment-modal" style="background-color: #ffbb00; border-color: #ffbb00;">
            Proceed to Payment
        </button>
    </form>
</div>

<!-- Payment Modal -->
<div id="payment-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document" style="width: 400px;">
        <div class="modal-content" style="background-color: #f8f9fa; color: #333; border-radius: 10px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
            <div class="modal-header">
                <h5 class="modal-title">Payment Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Credit Card Fields -->
                <div id="credit-card-fields">
                    <div class="form-group">
                        <label for="card-number">Card Number</label>
                        <input type="text" class="form-control" id="card-number" placeholder="Enter card number" style="background-color: #ffffff; color: #495057; border: 1px solid #ced4da;">
                        <small id="card-number-error" class="form-text text-danger" style="display:none;">Please enter a valid card number.</small>
                    </div>
                    <div class="form-group">
                        <label for="expiry-date">Expiry Date</label>
                        <input type="text" class="form-control" id="expiry-date" placeholder="MM/YYYY" style="background-color: #ffffff; color: #495057; border: 1px solid #ced4da;">
                        <small id="expiry-date-error" class="form-text text-danger" style="display:none;">Please enter a valid expiry date.</small>
                    </div>
                    <div class="form-group">
                        <label for="cvv">CVV</label>
                        <input type="text" class="form-control" id="cvv" placeholder="Enter CVV" style="background-color: #ffffff; color: #495057; border: 1px solid #ced4da;">
                        <small id="cvv-error" class="form-text text-danger" style="display:none;">Please enter a valid CVV.</small>
                    </div>
                </div>
                <!-- Google Pay Fields (Add additional fields if needed) -->
                <div id="gpay-fields" style="display: none;">
                    <p>Complete the payment using Google Pay.</p>
                </div>
                <!-- Offline Payment Fields (Add additional fields if needed) -->
                <div id="offline-fields" style="display: none;">
                    <p>Please proceed with the offline payment instructions provided.</p>
                </div>
                <!-- Loading Spinner -->
                <div id="loading-spinner" class="text-center" style="display: none;">
                    <i class="fa fa-spinner fa-spin fa-3x"></i>
                    <p>Processing Payment...</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="submit-payment" style="background-color: #ffbb00; border-color: #ffbb00;">Submit Payment</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #6c757d; border-color: #6c757d; color: #fff;">Close</button>
            </div>
        </div>
    </div>
    <!-- ... The rest of the Payment Modal content ... -->
</div>

<!-- Custom Modal for Popup Message -->
<!-- ... The rest of the Custom Modal content ... -->
<style>
    .custom-modal {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #ffffff; /* White background */
        color: #333; /* Dark text color */
        padding: 20px;
        text-align: center;
        z-index: 9999;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Soft shadow */
    }

    .custom-modal h2 {
        font-size: 28px;
        margin-bottom: 20px;
        color: #333; /* Dark text color for title */
    }

    .custom-modal-content.info {
        background-color: #007bff; /* Vibrant blue for info */
        color: #fff; /* White text color */
    }

    .custom-modal-content.warning {
        background-color: #ffc107; /* Vibrant yellow for warning */
        color: #333; /* Dark text color */
    }

    .custom-modal-content.success {
        background-color: #28a745; /* Vibrant green for success */
        color: #fff; /* White text color */
    }

    .custom-modal-content.error {
        background-color: #dc3545; /* Vibrant red for error */
        color: #fff; /* White text color */
    }
</style>

<!-- Combined Script Section -->
<script>
$(document).ready(function () {
    $('#payment-method').change(function () {
        // Show/hide payment fields based on the selected method
        var selectedMethod = $(this).val();
        $('#credit-card-fields, #gpay-fields, #offline-fields').hide();
        $('#' + selectedMethod + '-fields').show();
    });

    $('#submit-payment').click(function () {
        // Check if a date is selected
        if ($('#selected-date').val() === '') {
            alert_toast("Please select a date before proceeding with the payment.", 'warning');
            return;
        }

        // Dummy implementation: Simulate payment based on the selected method
        var selectedMethod = $('#payment-method').val();
        if (selectedMethod === 'credit_card' || selectedMethod === 'gpay' || selectedMethod === 'offline') {
            // Show loading spinner during payment processing
            $('#loading-spinner').show();
            // Simulate payment completion after a delay
            setTimeout(function () {
                var successMessage = selectedMethod === 'offline' ? 'Offline Payment Successful' : 'Payment Successful';
                alert_toast(successMessage + ". Redirecting back to site...");
                // Show custom modal for the popup message
                showCustomModal(successMessage + "!", "Don't forget to check the status of your booking.", 'success');
                $('#loading-spinner').hide();
                $('#payment-modal').modal('hide');
                simulatePaymentCompletion();
                $('uni_modal form').modal('hide');
                uni_modal_close();

                // Hide the booking form when payment form is displayed
                $('#book-form').hide(); // Hiding the booking form

                // Display booking details after payment completion
                var bookingDetails = {
                    packageID: $('input[name="package_id"]').val(),
                    schedule: $('#selected-date').val(),
                    paymentMethod: $('#payment-method option:selected').text(),
                    // Add other booking details here
                };
                displayBookingInfo(bookingDetails);
            }, 2000);
        }
    });

    function simulatePaymentCompletion() {
        // Dummy implementation: Simulate completion of payment
        setTimeout(function () {
            alert_toast("Payment Completed Successfully.");
            // You can add additional code here for further actions after payment completion
        }, 2000); // Simulate a delay as if completing the payment
    }

    // Function to show a custom modal
    function showCustomModal(title, message, type) {
        var modal = `
            <div class="custom-modal">
                <div class="custom-modal-content ${type}">
                    <h2>${title}</h2>
                    <p>${message}</p>
                </div>
            </div>
        `;
        $('body').append(modal);
        setTimeout(function () {
            $('.custom-modal').remove();
        }, 2000); // Remove the modal after 2 seconds
    }

    // Function to display booking info
    function displayBookingInfo(details) {
        var infoMessage = `
            Package ID: ${details.packageID}\n
            Schedule: ${details.schedule}\n
            Payment Method: ${details.paymentMethod}\n
            // Add other booking details here
        `;
        alert(infoMessage); // Display booking details in an alert
    }
    
    // AJAX Form Submission for Booking
    $('#book-form').submit(function(e){
        e.preventDefault();
        start_loader()
        $.ajax({
            url:_base_url_+"classes/Master.php?f=book_tour",
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            error:err=>{
                console.log(err)
                alert_toast("an error occured",'error')
                end_loader()
            },
            success:function(resp){
                if(typeof resp == 'object' && resp.status == 'success'){
                    alert_toast("Book Request Successfully sent.")
                    $('.modal').modal('hide')
                }else{
                    console.log(resp)
                    alert_toast("an error occured",'error')
                }
                end_loader()
            }
        })
    });
});
</script>

