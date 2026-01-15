<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayTR Payment</title>
</head>
<body>
    <form action="https://www.paytr.com/odeme" method="post">
        <!-- Card details -->
        <label for="cc_owner">Card Owner Name:</label>
        <input type="text" name="cc_owner" value="TEST KARTI"><br>

        <label for="card_number">Card Number:</label>
        <input type="text" name="card_number" value="9792030394440796"><br>

        <label for="expiry_month">Expiration Month:</label>
        <input type="text" name="expiry_month" value="12"><br>

        <label for="expiry_year">Expiration Year:</label>
        <input type="text" name="expiry_year" value="99"><br>

        <label for="cvv">CVV:</label>
        <input type="text" name="cvv" value="000"><br>

        <!-- Hidden Fields with Data from Controller -->
        <input type="hidden" name="merchant_id" value="<?php echo e($data['merchant_id']); ?>">
        <input type="hidden" name="user_ip" value="<?php echo e($data['user_ip']); ?>">
        <input type="hidden" name="merchant_oid" value="<?php echo e($data['merchant_oid']); ?>">
        <input type="hidden" name="email" value="<?php echo e($data['email']); ?>">
        <input type="hidden" name="payment_type" value="<?php echo e($data['payment_type']); ?>">
        <input type="hidden" name="payment_amount" value="<?php echo e($data['payment_amount']); ?>">
        <input type="hidden" name="currency" value="<?php echo e($data['currency']); ?>">
        <input type="hidden" name="installment_count" value="<?php echo e($data['installment_count']); ?>">
        <input type="hidden" name="test_mode" value="<?php echo e($data['test_mode']); ?>">
        <input type="hidden" name="non_3d" value="<?php echo e($data['non_3d']); ?>">
        <input type="hidden" name="merchant_ok_url" value="<?php echo e($data['merchant_ok_url']); ?>">
        <input type="hidden" name="merchant_fail_url" value="<?php echo e($data['merchant_fail_url']); ?>">
        <input type="hidden" name="callback_url" value="<?php echo e($data['callback_url']); ?>">
        <input type="hidden" name="paytr_token" value="<?php echo e($data['paytr_token']); ?>">
        <input type="hidden" name="user_name" value="<?php echo e($data['user_name']); ?>">
        <input type="hidden" name="user_address" value="<?php echo e($data['user_address']); ?>">
        <input type="hidden" name="user_basket" value="<?php echo e($data['user_basket']); ?>">

        <input type="submit" value="Submit Payment">
    </form>
</body>
</html>
<?php /**PATH /home/ayva/web/ayva.stage04.obdemo.com/public_html/resources/views/payment/form.blade.php ENDPATH**/ ?>