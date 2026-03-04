<?php
$invoiceId = isset($_GET['id']) ? $_GET['id'] : 'INV-0000';
$invoiceDate = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
$invoiceTime = isset($_GET['time']) ? $_GET['time'] : date('h:i A');
$invoiceAmount = isset($_GET['amount']) ? $_GET['amount'] : 'AED 0';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice PDF - <?php echo htmlspecialchars($invoiceId); ?></title>
    <link rel="stylesheet" href="../client-css/client-invoicepdf.css">
    <link rel="stylesheet" href="../client-css/client-breadcrumb.css?v=<?php echo filemtime(__DIR__ . '/../client-css/client-breadcrumb.css'); ?>">
</head>
<body>
    <div class="toolbar">
        <button type="button" onclick="window.print()">Download / Save PDF</button>
    </div>

    <main class="invoice-sheet">
        <nav class="breadcrumb portal-breadcrumb" aria-label="Breadcrumb"><a href="client-dashboard.php">Dashboard</a><span class="crumb-sep">/</span><a href="client-invoices.php">Invoices</a><span class="crumb-sep">/</span><span class="current">Invoice PDF</span></nav>
        <div class="head">
            <div>
                <div class="title">INVOICE</div>
                <div class="section-title">LedgerWorx Services</div>
            </div>
            <div class="meta">
                <div><strong>Invoice #:</strong> <?php echo htmlspecialchars($invoiceId); ?></div>
                <div><strong>Date:</strong> <?php echo htmlspecialchars($invoiceDate); ?></div>
                <div><strong>Time:</strong> <?php echo htmlspecialchars($invoiceTime); ?></div>
            </div>
        </div>

        <div class="block">
            <div class="section-title">Bill To</div>
            <div>John Doe</div>
            <div>Client Account - LedgerWorx</div>
        </div>

        <div class="block">
            <div class="section-title">Description</div>
            <div>Professional service fee and associated processing for the selected billing cycle.</div>
        </div>

        <div class="amount-box">
            <div class="label">Total Amount</div>
            <div class="value"><?php echo htmlspecialchars($invoiceAmount); ?></div>
        </div>

        <p class="footer-note">
            This is a system-generated invoice preview. Use the "Download / Save PDF" button to save as PDF.
        </p>
    </main>
</body>
</html>


