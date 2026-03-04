<?php
$userName = 'John Doe';
$profileName = 'John Doe';

$invoices = [
    ['id' => 'INV-3021', 'date' => '2026-02-12', 'time' => '10:15 AM', 'amount' => 'AED 2,350'],
    ['id' => 'INV-3017', 'date' => '2026-02-08', 'time' => '03:40 PM', 'amount' => 'AED 1,980'],
    ['id' => 'INV-3009', 'date' => '2026-02-03', 'time' => '11:05 AM', 'amount' => 'AED 4,200'],
    ['id' => 'INV-2998', 'date' => '2026-01-28', 'time' => '06:20 PM', 'amount' => 'AED 3,100'],
    ['id' => 'INV-2986', 'date' => '2026-01-19', 'time' => '09:30 AM', 'amount' => 'AED 2,760']
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LedgerWorx - Invoices</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../client-css/client-invoices.css">
    <link rel="stylesheet" href="../client-css/dark-mode.css">
    <link rel="stylesheet" href="../client-css/client-breadcrumb.css?v=<?php echo filemtime(__DIR__ . '/../client-css/client-breadcrumb.css'); ?>">
</head>
<body>
    <header class="navbar">
        <div class="brand">
            <a href="client-dashboard.php" aria-label="Go to Dashboard"><img src="../client-assets/logo.png" alt="Ledger Workx logo" class="logo-img"></a>
        </div>

        <button class="nav-toggle" aria-label="Toggle menu"><i class="fas fa-bars"></i></button>

        <nav class="nav-links">
            <a href="client-dashboard.php">Dashboard</a>
            <a href="client-request.php">My Requests</a>
            <a href="client-payments.php">Payments</a>
            <a href="client-documents.php">Documents</a>
            <a href="clinet-notification.php">Notifications</a>
        </nav>

        <div class="profile">
            <span class="profile-name" id="profileNameBtn"><?php echo htmlspecialchars($profileName); ?></span>
            <img src="https://i.pravatar.cc/40" alt="profile" class="profile-img" id="profileToggle">
            <i class="fas fa-chevron-down profile-arrow" id="profileArrow"></i>
            <div class="profile-dropdown" id="profileDropdown">
                <a href="client-profile-settings.php"><i class="fas fa-cog"></i> Settings</a>
                <button class="signout" id="signoutBtn"><i class="fas fa-sign-out-alt"></i> Sign Out</button>
            </div>
        </div>
    </header>

    <div class="container">
        <nav class="breadcrumb portal-breadcrumb" aria-label="Breadcrumb"><a href="client-dashboard.php">Dashboard</a><span class="crumb-sep">/</span><span class="current">Invoices</span></nav>
        <h1 class="page-title">Invoices</h1>
        <p class="page-subtitle">List of generated invoices with date and time.</p>

        <ul class="invoice-list">
            <?php foreach ($invoices as $invoice): ?>
                <a class="invoice-item" href="client-invoicepdf.php?<?php echo http_build_query($invoice); ?>">
                    <div>
                        <div class="invoice-label">Invoice ID</div>
                        <div class="invoice-id"><?php echo htmlspecialchars($invoice['id']); ?></div>
                    </div>
                    <div>
                        <div class="invoice-label">Generated Date</div>
                        <div class="invoice-value"><?php echo htmlspecialchars($invoice['date']); ?></div>
                    </div>
                    <div>
                        <div class="invoice-label">Generated Time</div>
                        <div class="invoice-value"><?php echo htmlspecialchars($invoice['time']); ?></div>
                    </div>
                    <div>
                        <div class="invoice-label">Amount</div>
                        <div class="invoice-value"><?php echo htmlspecialchars($invoice['amount']); ?></div>
                    </div>
                </a>
            <?php endforeach; ?>
        </ul>
    </div>

    <div id="modal" class="modal" aria-hidden="true">
        <div class="modal-content">
            <button class="modal-close" aria-label="Close">&times;</button>
            <h3 id="modal-title">Confirm</h3>
            <p id="modal-body">Are you sure?</p>
            <div class="modal-actions">
                <button class="primary modal-confirm">Confirm</button>
                <button class="secondary modal-cancel">Cancel</button>
            </div>
        </div>
    </div>

    <script src="../client-js/client-invoices.js"></script>
    <script src="../client-js/dark-mode.js"></script>
</body>
</html>





