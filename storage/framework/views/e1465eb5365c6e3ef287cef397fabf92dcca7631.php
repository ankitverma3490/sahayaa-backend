<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PayTR Payment</title>
</head>
<body>
    <h1>Payment Form</h1>
    <form action="/paytr/payment/submit" method="POST">
        <!-- Hidden input data for PayTR -->
        <?php echo csrf_field(); ?>

        <!-- Submit Button -->
        <input type="submit" value="Proceed to Payment">
    </form>
</body>
</html>
<?php /**PATH /home/ayva/web/ayva.stage04.obdemo.com/public_html/resources/views/paytr/payment_form.blade.php ENDPATH**/ ?>