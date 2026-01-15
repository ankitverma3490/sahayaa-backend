<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice - <?php echo e($transaction->order_number); ?></title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #333; padding-bottom: 20px; }
        .company-info { margin-bottom: 20px; }
        .invoice-details { margin-bottom: 30px; }
        .table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .table th { background-color: #f5f5f5; }
        .total-section { text-align: right; margin-top: 20px; }
        .footer { margin-top: 50px; text-align: center; font-size: 10px; color: #666; }
    </style>
</head>
<body>
    <div class="header">
        <h1>INVOICE</h1>
        <div class="company-info">
            <strong><?php echo e($company['name']); ?></strong><br>
            <?php echo e($company['address']); ?><br>
            Phone: <?php echo e($company['phone']); ?> | Email: <?php echo e($company['email']); ?>

        </div>
    </div>

    <div class="invoice-details">
        <table width="100%">
            <tr>
                <td width="50%">
                    <strong>Bill To:</strong><br>
                    <?php echo e($transaction->user->name ?? 'N/A'); ?><br>
                    <?php echo e($transaction->user->email ?? 'N/A'); ?>

                </td>
                <td width="50%" align="right">
                    <strong>Invoice Number:</strong> <?php echo e($transaction->order_number); ?><br>
                    <strong>Date:</strong> <?php echo e($transaction->created_at->format('M d, Y')); ?><br>
                    <strong>Transaction ID:</strong> <?php echo e($transaction->transaction_id ?? 'N/A'); ?>

                </td>
            </tr>
        </table>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Description</th>
                <th>Order Number</th>
                <th>Payment Mode</th>
                <th>Currency</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo e(ucfirst($transaction->type)); ?> Transaction</td>
                <td><?php echo e($transaction->order_number); ?></td>
                <td><?php echo e($transaction->payment_mode ?? 'N/A'); ?></td>
                <td><?php echo e($transaction->currency); ?></td>
                <td><?php echo e(number_format($transaction->amount, 2)); ?></td>
                <td><?php echo e(ucfirst($transaction->payment_status)); ?></td>
            </tr>
        </tbody>
    </table>

    <div class="total-section">
        <strong>Total Amount: <?php echo e($transaction->currency); ?> <?php echo e(number_format($transaction->amount, 2)); ?></strong>
    </div>

    <div class="footer">
        <p>This is a computer-generated invoice. No signature required.</p>
        <p>Generated on: <?php echo e(now()->format('M d, Y H:i:s')); ?></p>
    </div>
</body>
</html><?php /**PATH /home/u480685225/domains/quickmyslot.com/public_html/resources/views/pdf/invoice.blade.php ENDPATH**/ ?>