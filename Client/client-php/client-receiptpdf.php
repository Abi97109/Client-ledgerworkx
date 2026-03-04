<?php
$serviceTitle = isset($_GET['title']) ? $_GET['title'] : 'Service Payment';
$requestId = isset($_GET['request']) ? $_GET['request'] : 'N/A';
$amount = isset($_GET['amount']) ? $_GET['amount'] : 'AED 0';
$paidDate = date('Y-m-d');
$paidTime = date('h:i A');
$transactionId = 'TXN-' . date('YmdHis');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt PDF - <?php echo htmlspecialchars($requestId); ?></title>
    <link rel="stylesheet" href="../client-css/client-receiptpdf.css">
    <link rel="stylesheet" href="../client-css/client-breadcrumb.css?v=<?php echo filemtime(__DIR__ . '/../client-css/client-breadcrumb.css'); ?>">
</head>

<body>
    <div class="toolbar">
        <button type="button" onclick="window.print()">Download / Save PDF</button>
    </div>

    <main class="sheet">
        <nav class="breadcrumb portal-breadcrumb" aria-label="Breadcrumb"><a href="client-dashboard.php">Dashboard</a><span class="crumb-sep">/</span><a href="client-payments.php">Payments</a><span class="crumb-sep">/</span><span class="current">Receipt PDF</span></nav>
        <div class="top">
            <div>
                <h1 class="title">PAYMENT RECEIPT</h1>
                <p class="paid-badge">Payment Completed</p>
            </div>
            <div class="meta">
                <div><strong>Receipt Date:</strong> <?php echo htmlspecialchars($paidDate); ?></div>
                <div><strong>Receipt Time:</strong> <?php echo htmlspecialchars($paidTime); ?></div>
                <div><strong>Transaction ID:</strong> <?php echo htmlspecialchars($transactionId); ?></div>
            </div>
        </div>

        <div class="section">
            <div class="label">Service</div>
            <div class="value"><?php echo htmlspecialchars($serviceTitle); ?></div>
        </div>

        <div class="section">
            <div class="label">Request ID</div>
            <div class="value"><?php echo htmlspecialchars($requestId); ?></div>
        </div>

        <div class="section">
            <div class="label">Payment Method</div>
            <div class="value">Online Payment Gateway</div>
        </div>

        <div class="total">
            <div class="label">Amount Paid</div>
            <div class="value"><?php echo htmlspecialchars($amount); ?></div>
        </div>

        <p class="foot">This is a system-generated receipt. You can save this page as PDF using the button above.</p>
    </main>
</body>

</html>


