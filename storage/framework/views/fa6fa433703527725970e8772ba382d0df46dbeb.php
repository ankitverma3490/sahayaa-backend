<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Booking Invoice - <?php echo e($booking->order_id ?? $booking->id); ?></title>
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
        .customer-info, .booking-info { margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>BOOKING INVOICE</h1>
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
                    <strong>Customer Information:</strong><br>
                    <?php echo e($booking->customer->name ?? 'N/A'); ?><br>
                    Email: <?php echo e($booking->customer->email ?? 'N/A'); ?><br>
                    Customer ID: <?php echo e($booking->customer_id); ?>

                </td>
                <td width="50%" align="right">
                    <strong>Vendor Information:</strong><br>
                    <?php echo e($booking->vendor->name ?? 'N/A'); ?><br>
                    Vendor ID: <?php echo e($booking->vendor_id); ?><br><br>

                    <strong>Invoice Details:</strong><br>
                    <?php if($booking->order_id): ?>
                        <strong>Order ID:</strong> <?php echo e($booking->order_id); ?><br>
                    <?php endif; ?>
                    <strong>Booking ID:</strong> <?php echo e($booking->id); ?><br>
                    <strong>Date:</strong> <?php echo e($booking->created_at->format('M d, Y')); ?><br>
                    <strong>Status:</strong> <?php echo e(ucfirst($booking->status)); ?>

                </td>
            </tr>
        </table>
    </div>

    <div class="booking-info">
        <strong>Service Details:</strong><br>
        Service: <?php echo e($booking->service->name ?? 'N/A'); ?><br>
        <?php if($booking->schedule_time): ?>
            <strong>Scheduled Time:</strong> 
            <?php if(is_array($booking->schedule_time)): ?>
                <?php echo e(implode(', ', $booking->schedule_time)); ?>

            <?php else: ?>
                <?php echo e($booking->schedule_time); ?>

            <?php endif; ?>
            <br>
        <?php endif; ?>
        <?php if($booking->reschedule_time): ?>
            <strong>Rescheduled Time:</strong> <?php echo e($booking->reschedule_time->format('M d, Y H:i')); ?><br>
        <?php endif; ?>
        <?php if($booking->note): ?>
            <strong>Note:</strong> <?php echo e($booking->note); ?><br>
        <?php endif; ?>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Description</th>
                <th>Amount</th>
                <th>Tax</th>
                <th>Platform Fee</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Booking Service - <?php echo e($booking->service->name ?? 'N/A'); ?></td>
                <td>$<?php echo e(number_format($booking->amount, 2)); ?></td>
                <td>$<?php echo e(number_format($booking->tax, 2)); ?></td>
                <td>$<?php echo e(number_format($booking->platform_fee, 2)); ?></td>
                <td><strong>$<?php echo e(number_format($booking->amount + $booking->tax + $booking->platform_fee, 2)); ?></strong></td>
            </tr>
        </tbody>
    </table>

    <div class="total-section">
        <strong>Subtotal: $<?php echo e(number_format($booking->amount, 2)); ?></strong><br>
        <strong>Tax: $<?php echo e(number_format($booking->tax, 2)); ?></strong><br>
        <strong>Platform Fee: $<?php echo e(number_format($booking->platform_fee, 2)); ?></strong><br>
        <strong style="font-size: 14px;">Grand Total: $<?php echo e(number_format($booking->amount + $booking->tax + $booking->platform_fee, 2)); ?></strong>
    </div>

    <?php if($booking->promo_code_id): ?>
    <div class="promo-info">
        <strong>Promo Code Applied:</strong> <?php echo e($booking->promo_code_id); ?>

    </div>
    <?php endif; ?>

    <div class="footer">
        <p>This is a computer-generated booking invoice. No signature required.</p>
        <p>Generated on: <?php echo e(now()->format('M d, Y H:i:s')); ?></p>
        <?php if($booking->is_paid_key): ?>
        <p>Payment Status: Paid</p>
        <?php else: ?>
        <p>Payment Status: Pending</p>
        <?php endif; ?>
    </div>
</body>
</html><?php /**PATH /home/u480685225/domains/quickmyslot.com/public_html/resources/views/pdf/booking_invoice.blade.php ENDPATH**/ ?>