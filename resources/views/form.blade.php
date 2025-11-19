<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Customer Information Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: #f5f7fa; }
        .section-box {
            background: white;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        .section-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #eee;
            color: #0d6efd;
        }
        .form-label { font-weight: 600; }
        .required:after { content: " *"; color: red; }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="col-lg-10 mx-auto">

        <div class="text-center mb-4">
            <h2 class="fw-bold text-primary">Customer Registration Form</h2>
            <p class="text-muted">Please complete all required fields below</p>
        </div>

        <form id="myForm">
            @csrf

            <!-- SECTION 1 -->
            <div class="section-box">
                <div class="section-title">Company Details</div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Company Name</label>
                        <input type="text" name="company_name" class="form-control">
                        <span class="text-danger small" id="error_company_name"></span>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Telephone Number</label>
                        <input type="text" name="telephone" class="form-control">
                        <span class="text-danger small" id="error_telephone"></span>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Contact Name</label>
                        <input type="text" name="contact_name" class="form-control">
                        <span class="text-danger small" id="error_contact_name"></span>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Contact Email</label>
                        <input type="text" name="contact_email" class="form-control">
                        <span class="text-danger small" id="error_contact_email"></span>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label required">Delivery Address</label>
                        <textarea name="delivery_address" class="form-control" rows="2"></textarea>
                        <span class="text-danger small" id="error_delivery_address"></span>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Special Delivery Instructions</label>
                        <textarea name="special_instructions" class="form-control" rows="2"></textarea>
                        <span class="text-danger small" id="error_special_instructions"></span>
                    </div>
                </div>
            </div>

            <!-- SECTION 2 -->
            <div class="section-box">
                <div class="section-title">Accounts & Billing Details</div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Accounts Contact</label>
                        <input type="text" name="accounts_contact" class="form-control">
                        <span class="text-danger small" id="error_accounts_contact"></span>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Accounts Telephone</label>
                        <input type="text" name="accounts_telephone" class="form-control">
                        <span class="text-danger small" id="error_accounts_telephone"></span>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Accounts Email</label>
                        <input type="text" name="accounts_email" class="form-control">
                        <span class="text-danger small" id="error_accounts_email"></span>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Invoice Email Address</label>
                        <input type="text" name="invoice_email" class="form-control">
                        <span class="text-danger small" id="error_invoice_email"></span>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Invoicing Address</label>
                        <textarea name="invoicing_address" class="form-control" rows="2"></textarea>
                        <span class="text-danger small" id="error_invoicing_address"></span>
                    </div>
                </div>
            </div>

            <!-- SECTION 3 -->
            <div class="section-box">
                <div class="section-title">Additional Information</div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Purchase Order Required?</label>
                        <select name="po_required" class="form-select">
                            <option value="">Select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                        <span class="text-danger small" id="error_po_required"></span>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label required">How did you hear about us?</label>
                        <select name="source" class="form-select">
                            <option value="">Select</option>
                            <option value="Google">Google</option>
                            <option value="Word of mouth">Word of mouth</option>
                            <option value="Crystal representative">Crystal representative</option>
                            <option value="Other">Other</option>
                        </select>
                        <span class="text-danger small" id="error_source"></span>
                    </div>
                </div>
            </div>

            <!-- SUBMIT BUTTON -->
            <div class="text-center mb-5">
                <button type="submit" class="btn btn-primary btn-lg px-5" id="submitBtn">
                    <span id="btnText">Submit</span>
                    <span id="btnSpinner" class="spinner-border spinner-border-sm d-none"></span>
                </button>
            </div>

        </form>
    </div>
</div>

<!-- TOAST -->
<div class="position-fixed bottom-0 end-0 p-3">
    <div id="successToast" class="toast text-bg-success border-0">
        <div class="d-flex">
            <div class="toast-body" id="toastBody">
                Form submitted successfully!
            </div>
            <button type="button" class="btn-close btn-close-white me-2" data-bs-dismiss="toast"></button>
        </div>
    </div>
</div>

<!-- SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>

// CSRF FIX (must be before any AJAX)
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

// VALIDATION FUNCTIONS
function isValidUKPhone(phone){
    return /^(\+44\s?7\d{3}|\(?07\d{3}\)?)\s?\d{3}\s?\d{3}$/.test(phone);
}

function isValidEmail(email){
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function validateField(field){
    let val = field.val().trim();
    let name = field.attr('name');
    let error = $("#error_" + name);

    if(val === ""){
        error.text("This field is required");
        return;
    } else { error.text(""); }

    if(name.includes("email")){
        if(!isValidEmail(val)){
            error.text("Enter a valid email address");
            return;
        }
    }

    if(name === "telephone" || name === "accounts_telephone"){
        if(!isValidUKPhone(val)){
            error.text("Enter a valid UK mobile number");
            return;
        }
    }
}

$("input, textarea, select").on("input change", function(){
    validateField($(this));
});

// AJAX SUBMIT
$("#myForm").on("submit", function (e) {
    e.preventDefault();

    let valid = true;

    $("input, textarea, select").each(function(){
        validateField($(this));
        if($("#error_" + $(this).attr("name")).text() !== ""){
            valid = false;
        }
    });

    if(!valid) return;

    $("#btnText").text("Submitting...");
    $("#btnSpinner").removeClass("d-none");
    $("#submitBtn").prop("disabled", true);

    $.ajax({
        url: "{{ route('form.store') }}",
        type: "POST",
        data: $(this).serialize(),
        success: function(res){
            $("#toastBody").text(res.message);
            new bootstrap.Toast(document.getElementById('successToast')).show();
            $("#myForm")[0].reset();
        },
        error: function(err){
            if(err.status === 422){
                $.each(err.responseJSON.errors, function(key, value){
                    $("#error_" + key).text(value[0]);
                });
            }
        },
        complete: function(){
            $("#btnText").text("Submit");
            $("#btnSpinner").addClass("d-none");
            $("#submitBtn").prop("disabled", false);
        }
    });
});

</script>

</body>
</html>
