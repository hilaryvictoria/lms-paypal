<script src="https://www.paypal.com/sdk/js?client-id=|paypal-client-id|&currency=|currency||paypal-disabled-options|">
</script>

<script>
    // variable used for server errors
    var serverErrorPaypal = "server_error_occured_paypal";
    // variable used to save form data and to post to validation
    var basicFormPaypal;
    paypal.Buttons({
        // here we create the order and define how much the customer has to pay and in which currency and if shipping is available
        createOrder: function(data, actions) {
            // payPalAmount extract the total value from the formdata, we call the get function and we are getting the value under the key total
            var paypalAmount = basicFormPaypal.get("total");
            // adjusting the amount for the right currency (es. HUF must be an integer value)
            var adjustedAmount = adjustPaypalAmount(paypalAmount, chosenCurrency);
            // we call actions.order.create and we have to return it so the js SDK will create the order
            return actions.order.create({
                // declaring the purchase units
                purchase_units: [{
                    amount: {
                        currency_code: chosenCurrency,
                        value: adjustedAmount
                    }
                }],
                application_context: {
                    // we don't need the checkbox for the shipping address
                    shipping_preference: 'NO_SHIPPING'
                }
            });
        },
        // event that runs when user cancels payment
        onCancel: function(data) {
            // function that re-enables the form fields
            resetFieldsAfterPayFail();
        },
        // event that runs when payment is successful after createOrder
        onApprove: function(data, actions) {
            // the actions parameter is very important to the anonymous function we created because we have to return actions.order.capture(), so we are capturing the funds and then there is the then handler that has another anonymous function with the details parameter on it: this is going to be an object that has informations about the transaction
            return actions.order.capture().then(function(details) {
                // here there is everything we do after we captured the funds
                // we show the progress modal so the customer knows some process is still running
                $("#processingModal").modal('show');
                // we load data into the hidden form that is inside the checkout view and we are going to post into the route checkout.fulfill.order after the successful payment, so the customer can have access to the course
                // we are echoing the value $course->id into the input field with course_paypal id
                document.querySelector('#course_paypal').value = "{{ $course->id }}";
                // we put the id of the transaction into the hidden transaction_paypal field, we get the data from the details parameter of the then handler
                document.querySelector('#transaction_paypal').value = details.purchase_units[0].payments.captures[0].id;
                // we call the appendPaymentData function and we pass the formdata from the validation and the string _paypal 
                appendPaymentData(basicFormPaypal, "_paypal");
                // we get the form with payment-form-paypal-smart id
                var paypalForm = document.querySelector("#payment-form-paypal-smart");
                // we submit the form
                paypalForm.submit();
            });
        },
        // onclick event where we put validation, we automatically get the parameter actions from the paypal sdk, on this event we can call the reject or resolve method
        onClick: function(data, actions) {
            // Checking if terms are accepted, the function checkTermsAcceptance is in the checkout-js.blade.php file
            var termsAreChecked = checkTermsAcceptance();
            if (termsAreChecked == false) {
                // the validations failed and we can not proceed to the payment
                return actions.reject();
            }
            changeFieldsAfterPayStart();
            basicFormPaypal = new FormData();
            appendBasicData(basicFormPaypal);
            // posting basicFormPaypal data into the checkout route. Validating the form data with the fetch api. When we post to this URL we are hitting the method prePaymentValidation on the CheckoutController and it returns a json response
            // it is important to put return before fetch to return the actions to the paypal sdk
            return fetch("{{ url('checkout/validate') }}" + "/" + "{{ $course->id }}" + "/" +
                "{{ $course->slug }}", {
                    method: "POST",
                    body: basicFormPaypal
                    // the then handler runs after the method returns a response object. The response object has a ok property
                }).then(function(res) {
                // if there are some problems 
                if (!res.ok) {
                    // we return the variable serverErrorPaypal that we have defined at the top of the file. Using the fetch api we are returning that variable to the next then handler
                    return serverErrorPaypal;
                } else {
                    return res.json();
                }
            }).then(function(data) {
                // the data parameter is what we returned in the previous then handler
                if (data == serverErrorPaypal) {
                    // if the data parameter is equal to serverErrorPaypal a server error occurred during payment, then we are showing an error message 
                    showErrorAndScrollUp("Unknown error occured during PayPal Smart payment");
                    // we are returning actions.reject() so the paypal payment will be stopped
                    return actions.reject();
                } else if (data.successful_validation) {
                    // the validations were ok and we can proceed to the payment
                    return actions.resolve();
                } else {
                    // validation errors occurred
                    // we declare a beautifiedError variable and we pass the data after calling JSON.stringify. The beautifyJson function is declared into the checkout-js file and it repacles json characters that we don't want to show to the user
                    var beautifiedError = beautifyJson(JSON.stringify(data));
                    showErrorAndScrollUp(beautifiedError);
                    return actions.reject();
                }
            });
            // we render the paypal buttons into the div with tm-paypal-smart-placement id
        }
    }).render('#tm-paypal-smart-placement');

    // function specific to paypal. In this 3 currencies we have to return an integer amount in order to make the payment work
    function adjustPaypalAmount(amountForPaypal, paypalCurrency) {
        if ((paypalCurrency == "HUF") || (paypalCurrency == "JPY") || (paypalCurrency == "TWD")) {
            return parseInt(amountForPaypal);
        }
        return amountForPaypal;
    }
</script>
