<?php
$userName = 'John Doe';
$profileName = 'John Doe';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LedgerWorx - Notifications</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../client-css/clinet-notification.css">
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
        <nav class="breadcrumb portal-breadcrumb" aria-label="Breadcrumb"><a href="client-dashboard.php">Dashboard</a><span class="crumb-sep">/</span><span class="current">Notifications</span></nav>
        <div class="page-header">
            <h1 class="page-title">Notifications</h1>
            <p class="page-subtitle">Track all important updates in one place</p>
        </div>

        <div class="toolbar">
            <div class="search-wrap">
                <i class="fas fa-search"></i>
                <input type="text" id="searchInput" class="search-input" placeholder="Search notifications...">
            </div>
            <div class="sort-wrap">
                <i class="fas fa-sort"></i>
                <select id="sortSelect" class="sort-select">
                    <option value="latest">Sort: Latest</option>
                    <option value="oldest">Sort: Oldest</option>
                    <option value="title">Sort: Title (A-Z)</option>
                </select>
            </div>
        </div>

                <div id="notificationGrid" class="notification-grid">
            <article class="notification-tile" data-id="payment-received" data-title="Payment Received" data-time="2026-02-12T10:35:00" data-seen="false">
                <div class="tile-top">
                    <div class="tile-title-row"><span class="notification-dot unseen"></span><h3 class="tile-title">Payment Received</h3></div>
                </div>
                <span class="tile-time">10:35 AM</span>
                <p class="tile-msg">Your payment for Request ID LW-REQ-024 has been successfully received.</p>
                <span class="tile-tag">Payments</span>
            </article>

            <article class="notification-tile" data-id="document-approved" data-title="Document Approved" data-time="2026-02-12T08:40:00" data-seen="false">
                <div class="tile-top">
                    <div class="tile-title-row"><span class="notification-dot unseen"></span><h3 class="tile-title">Document Approved</h3></div>
                </div>
                <span class="tile-time">08:40 AM</span>
                <p class="tile-msg">Trade License Copy has been reviewed and marked as approved.</p>
                <span class="tile-tag">Documents</span>
            </article>

            <article class="notification-tile" data-id="request-status-updated" data-title="Request Status Updated" data-time="2026-02-11T17:15:00" data-seen="true">
                <div class="tile-top">
                    <div class="tile-title-row"><span class="notification-dot seen"></span><h3 class="tile-title">Request Status Updated</h3></div>
                </div>
                <span class="tile-time">Yesterday</span>
                <p class="tile-msg">Your request LW-REQ-031 moved to the In Progress stage.</p>
                <span class="tile-tag">Requests</span>
            </article>

            <article class="notification-tile" data-id="pending-documents-reminder" data-title="Reminder: Upload Pending Documents" data-time="2026-02-11T09:00:00" data-seen="false">
                <div class="tile-top">
                    <div class="tile-title-row"><span class="notification-dot unseen"></span><h3 class="tile-title">Reminder: Upload Pending Documents</h3></div>
                </div>
                <span class="tile-time">Yesterday</span>
                <p class="tile-msg">Please upload Bank Statement and Business Plan to continue verification.</p>
                <span class="tile-tag">Reminder</span>
            </article>

            <article class="notification-tile" data-id="contract-draft-ready" data-title="Contract Draft Ready" data-time="2026-02-10T15:25:00" data-seen="true">
                <div class="tile-top">
                    <div class="tile-title-row"><span class="notification-dot seen"></span><h3 class="tile-title">Contract Draft Ready</h3></div>
                </div>
                <span class="tile-time">10 Feb</span>
                <p class="tile-msg">A new contract draft is ready for your review in the documents section.</p>
                <span class="tile-tag">Legal</span>
            </article>

            <article class="notification-tile" data-id="support-message" data-title="Support Message" data-time="2026-02-09T12:05:00" data-seen="true">
                <div class="tile-top">
                    <div class="tile-title-row"><span class="notification-dot seen"></span><h3 class="tile-title">Support Message</h3></div>
                </div>
                <span class="tile-time">09 Feb</span>
                <p class="tile-msg">Our support team has replied to your question about VAT filing timelines.</p>
                <span class="tile-tag">Support</span>
            </article>
        </div>
        <div id="emptyState" class="empty-state">No notifications found for your search.</div>
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
    <script src="../client-js/clinet-notification.js"></script>
    <script src="../client-js/dark-mode.js"></script>
</body>

</html>















