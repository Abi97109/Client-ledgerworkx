<?php
$userName = 'John Doe';
$profileName = 'John Doe';

$notificationKey = isset($_GET['id']) ? $_GET['id'] : '';

$notificationMap = [
    'payment-received' => [
        'title' => 'Payment Received',
        'time' => '12 Feb 2026, 10:35 AM',
        'category' => 'Payments',
        'detail' => 'Your payment for Request ID LW-REQ-024 was received successfully. The finance team has updated your request status and your receipt is now available in the Payments page.'
    ],
    'document-approved' => [
        'title' => 'Document Approved',
        'time' => '12 Feb 2026, 08:40 AM',
        'category' => 'Documents',
        'detail' => 'Trade License Copy has been verified and approved by the reviewer. No further action is needed for this document right now.'
    ],
    'request-status-updated' => [
        'title' => 'Request Status Updated',
        'time' => '11 Feb 2026, 05:15 PM',
        'category' => 'Requests',
        'detail' => 'Your request LW-REQ-031 has moved to In Progress. The assigned consultant has started processing and the next update will appear after initial checks are completed.'
    ],
    'pending-documents-reminder' => [
        'title' => 'Reminder: Upload Pending Documents',
        'time' => '11 Feb 2026, 09:00 AM',
        'category' => 'Reminder',
        'detail' => 'Please upload the pending Bank Statement and Business Plan. Submission of these files is required to continue compliance verification.'
    ],
    'contract-draft-ready' => [
        'title' => 'Contract Draft Ready',
        'time' => '10 Feb 2026, 03:25 PM',
        'category' => 'Legal',
        'detail' => 'A new contract draft has been prepared and shared in your document section. Review the clauses and confirm if changes are needed.'
    ],
    'support-message' => [
        'title' => 'Support Message',
        'time' => '09 Feb 2026, 12:05 PM',
        'category' => 'Support',
        'detail' => 'Support has responded to your VAT filing timeline query. You can proceed with this month filing before the due date without penalties.'
    ]
];

$notification = isset($notificationMap[$notificationKey]) ? $notificationMap[$notificationKey] : [
    'title' => 'Notification Not Found',
    'time' => 'N/A',
    'category' => 'General',
    'detail' => 'The selected notification could not be found. Please return to the notifications page and choose an available item.'
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LedgerWorx - Notification Detail</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../client-css/client-notificationex.css">
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
            <a href="clinet-notification.php" class="active">Notifications</a>
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
        <nav class="breadcrumb portal-breadcrumb" aria-label="Breadcrumb"><a href="client-dashboard.php">Dashboard</a><span class="crumb-sep">/</span><a href="clinet-notification.php">Notifications</a><span class="crumb-sep">/</span><span class="current">Notification Detail</span></nav>

        <article class="detail-card">
            <h1 class="detail-title"><?php echo htmlspecialchars($notification['title']); ?></h1>
            <div class="meta-row">
                <span class="meta-chip"><i class="fas fa-clock"></i> <?php echo htmlspecialchars($notification['time']); ?></span>
                <span class="meta-chip"><?php echo htmlspecialchars($notification['category']); ?></span>
            </div>
            <p class="detail-text"><?php echo htmlspecialchars($notification['detail']); ?></p>
        </article>
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
    <script src="../client-js/client-notificationex.js"></script>
    <script src="../client-js/dark-mode.js"></script>
</body>

</html>










