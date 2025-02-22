// const paymentForm = document.getElementById('paymentForm');
// paymentForm.addEventListener("submit", payWithPaystack, false);
// function payWithPaystack(e) {
//   e.preventDefault();

//   let handler = PaystackPop.setup({
//     key: 'pk_test_001b0f7f731db2aa5232fada369ce570698eb377', // Replace with your public key
//     email: document.getElementById("email").value,

//     matric_no: document.getElementById("matric_no").value,
//     faculty: document.getElementById("faculty").value,
//     department: document.getElementById("department").value,
//     programme: document.getElementById("programme").value,
//     level: document.getElementById("level").value,
//     payment_name: document.getElementById("payment_name").value,


//     amount: document.getElementById("amount_paid").value * 100,
//     name: document.getElementById("name").value,
//     currency: 'NGN',
//     ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
//     // label: "Optional string that replaces customer email"
    
//     callback: function(response){
//       let message = fullname + 'you\'ve successfully complete your payment! Reference: ' + response.reference;
//       alert(message);
//     },
//     onClose: function(){
//       // alert('Window closed.');
//       window.location.href='/payment_successful?refId=' + reference;
//     },
    
//   });

//   handler.openIframe();
// }













document.addEventListener("DOMContentLoaded", function () {
    const paymentForm = document.getElementById("paymentForm");

    paymentForm.addEventListener("submit", payWithPaystack, false);

    function payWithPaystack(e) {
        e.preventDefault();

        let handler = PaystackPop.setup({
            key: "pk_test_001b0f7f731db2aa5232fada369ce570698eb377", // Replace with your Paystack public key
            email: document.getElementById("email").value,
            amount: document.getElementById("amount_paid").value * 100, // Convert Naira to Kobo
            currency: "NGN",
            ref: "TXN_" + Math.floor(Math.random() * 1000000000 + 1), // Unique reference
            callback: function (response) {
                alert("Payment successful! Reference: " + response.reference);

                // Send payment details to Laravel using AJAX
                $.ajax({
                    url: "http://127.0.0.1:8000/payment_successful",
                    type: "POST",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr("content"), // CSRF Token
                        matric_no: $("#matric_no").val(),
                        name: $("#name").val(),
                        email: $("#email").val(),
                        faculty: $("#faculty").val(),
                        department: $("#department").val(),
                        programme: $("#programme").val(),
                        level: $("#level").val(),
                        payment_name: $("#payment_name").val(),
                        academic_section: $("#academic_section").val(),
                        amount_paid: $("#amount_paid").val(),
                        reference_no: response.reference, // Paystack transaction reference
                    },
                    success: function (data) {
                        if (data.success) {
                            alert("Payment saved successfully!");
                            // window.location.href = "/payment_successful/" + response.reference; // Redirect to receipt page
                        } else {
                            alert("Payment saving failed: " + data.message);
                        }
                    },
                    error: function (xhr) {
                        alert("An error occurred: " + xhr.responseText);
                    },
                });
            },
            onClose: function () {
                alert("Transaction cancelled.");
            },
        });

        handler.openIframe();
    }
});
