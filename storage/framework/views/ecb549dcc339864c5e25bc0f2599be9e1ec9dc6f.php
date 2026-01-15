<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Form</title>
</head>
<body>
    <div>
        <h1>Payment Form</h1>
        <form action="<?php echo e(route('payment.process')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <button type="submit">Proceed to Payment</button>
        </form>
    </div>
</body>
</html><?php /**PATH /home/ayva/web/ayva.stage04.obdemo.com/public_html/resources/views/paytr/form.blade.php ENDPATH**/ ?>