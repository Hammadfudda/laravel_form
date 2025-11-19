📄 Customer Registration Form – Laravel + AJAX (Real-Time Validation)

This project is a Laravel-based customer registration form featuring:

✅ Real-time front-end validation (jQuery)
✅ Backend validation using Laravel FormRequest
✅ AJAX form submission
✅ CSRF-secured requests (no page refresh)
✅ Clean Bootstrap 5 UI with sectioned layout
✅ Toast success notifications
✅ Fully responsive design
✅ No database required (pure validation demo)

🚀 Features
💡 1. Real-Time Validation

Instant validation while typing

Email format check

UK telephone number regex validation

Required field indicators

Live error messages under each field

🔐 2. Secure AJAX Submission

CSRF token included in meta + AJAX headers

No 419 errors

Cross-domain safe

Returns JSON response

🎨 3. Modern UI/UX

Sectioned form layout

Clean spacing and styling

Professional Bootstrap 5 design

Highlighted section titles

Smooth and modern visual appearance

🧪 4. Laravel FormRequest Validation

Backend validates:

Company details

Contact details

Accounts and billing info

Purchase order requirement

Source of reference

📁 Project Structure
app/
 ├── Http/
 │   ├── Controllers/
 │   │   └── FormController.php
 │   └── Requests/
 │       └── FormRequest.php

resources/
 └── views/
     └── form.blade.php

routes/
 └── web.php

🛠 Technologies Used

Laravel 10/11

PHP 8+

jQuery 3.6

Bootstrap 5

AJAX

FormRequest Validation
