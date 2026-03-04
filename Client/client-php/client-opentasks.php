<?php
$userName = 'John Doe';
$profileName = 'John Doe';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LedgerWorx - Open Tasks</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../client-css/client-opentasks.css">
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
        <nav class="breadcrumb portal-breadcrumb" aria-label="Breadcrumb"><a href="client-dashboard.php">Dashboard</a><span class="crumb-sep">/</span><span class="current">Open Tasks</span></nav>
        <h1 class="page-title">Open Tasks</h1>
        <p class="page-subtitle">Track pending and completed tasks. Click a task to view details.</p>

        <div class="task-list" id="taskList">
            <article class="task-item" data-title="Upload Emirates ID for KYC Verification" data-status="Pending" data-detail="Upload a clear copy of Emirates ID to complete KYC verification and continue account processing." data-target="client-documents.php" data-target-label="Go to Documents">
                <div>
                    <h3 class="task-title">Upload Emirates ID for KYC Verification</h3>
                    <p class="task-meta">Due: 15 Feb 2026</p>
                </div>
                <span class="status pending">Pending</span>
                <span class="task-target">Documents</span>
            </article>

            <article class="task-item" data-title="Review Contract Draft and Approve" data-status="Pending" data-detail="Review contract clauses and confirm approval after final legal edits are completed." data-target="client-documents.php" data-target-label="Go to Documents">
                <div>
                    <h3 class="task-title">Review Contract Draft and Approve</h3>
                    <p class="task-meta">Due: 16 Feb 2026</p>
                </div>
                <span class="status pending">Pending</span>
                <span class="task-target">Documents</span>
            </article>

            <article class="task-item" data-title="Confirm Payment Advice for Invoice LW-INV-2031" data-status="Pending" data-detail="Open pending invoice LW-INV-2031 and complete payment confirmation to avoid late processing." data-target="client-payments.php" data-target-label="Go to Payments">
                <div>
                    <h3 class="task-title">Confirm Payment Advice for Invoice LW-INV-2031</h3>
                    <p class="task-meta">Due: 17 Feb 2026</p>
                </div>
                <span class="status pending">Pending</span>
                <span class="task-target">Payments</span>
            </article>

            <article class="task-item" data-title="Upload Passport Copy" data-status="Completed" data-detail="Passport copy was uploaded successfully and verified by operations." data-target="client-documents.php" data-target-label="Open Documents">
                <div>
                    <h3 class="task-title">Upload Passport Copy</h3>
                    <p class="task-meta">Completed: 10 Feb 2026</p>
                </div>
                <span class="status completed">Completed</span>
                <span class="task-target">Documents</span>
            </article>
        </div>
    </div>

    <div class="detail-modal" id="taskDetailModal" aria-hidden="true">
        <div class="detail-box" role="dialog" aria-modal="true" aria-labelledby="taskModalTitle">
            <div class="detail-head">
                <h2 class="detail-title" id="taskModalTitle">Task Detail</h2>
                <button class="detail-close" id="taskModalClose" aria-label="Close">&times;</button>
            </div>
            <p class="detail-text" id="taskModalText"></p>
            <div class="detail-actions">
                <button class="btn btn-secondary" id="taskModalCancel">Close</button>
                <button class="btn btn-primary" id="taskModalGo">Go</button>
            </div>
        </div>
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
    <script src="../client-js/client-opentasks.js"></script>
    <script src="../client-js/dark-mode.js"></script>
</body>

</html>









