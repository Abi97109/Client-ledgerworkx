<?php
$userName = 'John Doe';
$profileName = 'John Doe';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LedgerWorx - Payments</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../client-css/client-payments.css">
    <link rel="stylesheet" href="../client-css/dark-mode.css">
    <link rel="stylesheet" href="../client-css/client-breadcrumb.css?v=<?php echo filemtime(__DIR__ . '/../client-css/client-breadcrumb.css'); ?>">
</head>

<body>

    <!-- NAVBAR -->
    <header class="navbar">
        <div class="brand">
            <a href="client-dashboard.php" aria-label="Go to Dashboard"><img src="../client-assets/logo.png" alt="Ledger Workx logo" class="logo-img"></a>
        </div>

        <button class="nav-toggle" aria-label="Toggle menu"><i class="fas fa-bars"></i></button>

        <nav class="nav-links">
            <a href="client-dashboard.php">Dashboard</a>
            <a href="client-request.php">My Requests</a>
            <a href="client-payments.php" class="active">Payments</a>
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

    <!-- MAIN CONTENT -->
    <div class="container">
        <nav class="breadcrumb portal-breadcrumb" aria-label="Breadcrumb"><a href="client-dashboard.php">Dashboard</a><span class="crumb-sep">/</span><span class="current">Payments</span></nav>
        <div class="page-header">
            <h1 class="page-title">Payments</h1>
            <p class="page-subtitle">View and complete your payments</p>
        </div>

        <!-- PAYMENT SUMMARY CARDS -->
        <div class="payment-summary">
            <!-- Due Now -->
            <div class="payment-card due-now">
                <div class="payment-card-content">
                    <div class="payment-card-title">Due Now</div>
                    <div class="payment-card-amount">AED 12,800</div>
                    <div class="payment-card-sub">Request ID: LW-REQ-024</div>
                </div>
                <button class="payment-card-button">Pay Now</button>
            </div>

            <!-- Upcoming -->
            <div class="payment-card upcoming">
                <div class="payment-card-content">
                    <div class="payment-card-title">Upcoming</div>
                    <div class="payment-card-amount">AED 8,600</div>
                    <div class="payment-card-sub">Due in 5 days</div>
                </div>
                <button class="payment-card-button">View Details</button>
            </div>

            <!-- Paid -->
            <div class="payment-card paid">
                <div class="payment-card-content">
                    <div class="payment-card-title">Paid</div>
                    <div class="payment-card-amount">AED 12,000</div>
                    <div class="payment-card-sub"><i class="fas fa-check-circle"></i> Completed</div>
                </div>
                <button class="payment-card-button">View Receipt</button>
            </div>
        </div>

        <!-- SEARCH SECTION -->
        <div class="search-section">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search">
                <i class="fas fa-arrow-right"></i>
            </div>
        </div>

        <!-- PAYMENT ITEMS LIST -->
        <div class="payment-items">
            <!-- Item 1 -->
            <div class="payment-item">
                <div class="payment-item-icon orange"><i class="fas fa-briefcase"></i></div>
                <div class="payment-item-info">
                    <div class="payment-item-title">Business Setup - Trade License Issuance</div>
                    <div class="payment-item-request-id">Request ID: LW-REQ-024</div>
                </div>
                <div class="payment-item-amount">AED 12,800</div>
                <div class="payment-item-status">
                    <span class="status-badge payment-required"><i class="fas fa-exclamation-circle"></i> Payment Required</span>
                </div>
                <div class="payment-item-action">
                    <button class="action-btn">Pay Now</button>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="payment-item">
                <div class="payment-item-icon orange"><i class="fas fa-file-alt"></i></div>
                <div class="payment-item-info">
                    <div class="payment-item-title">VAT Filing</div>
                    <div class="payment-item-request-id">Request ID: LW-REQ-015</div>
                </div>
                <div class="payment-item-amount">AED 8,600</div>
                <div class="payment-item-status">
                    <span class="status-badge upcoming"><i class="fas fa-calendar"></i> Due in 5 days</span>
                </div>
                <div class="payment-item-action">
                    <button class="action-btn secondary">View Details</button>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="payment-item">
                <div class="payment-item-icon blue"><i class="fas fa-cube"></i></div>
                <div class="payment-item-info">
                    <div class="payment-item-title">ERP Setup</div>
                    <div class="payment-item-request-id">Request ID: LW-REQ-028</div>
                </div>
                <div class="payment-item-amount">AED 12,000</div>
                <div class="payment-item-status">
                    <span class="status-badge paid"><i class="fas fa-check-circle"></i> Paid</span>
                </div>
                <div class="payment-item-action">
                    <button class="action-btn secondary">View Receipt</button>
                </div>
            </div>

            <!-- Item 4 -->
            <div class="payment-item">
                <div class="payment-item-icon gray"><i class="fas fa-file-contract"></i></div>
                <div class="payment-item-info">
                    <div class="payment-item-title">Contract Drafting</div>
                    <div class="payment-item-request-id">Request ID: LW-REQ-012</div>
                </div>
                <div class="payment-item-amount">AED 7,500</div>
                <div class="payment-item-status">
                    <span class="status-badge not-completed"><i class="fas fa-times-circle"></i> Payment Not Completed</span>
                </div>
                <div class="payment-item-action">
                    <button class="action-btn">Retry Payment</button>
                </div>
            </div>

            <!-- Item 5 -->
            <div class="payment-item">
                <div class="payment-item-icon purple"><i class="fas fa-file-contract"></i></div>
                <div class="payment-item-info">
                    <div class="payment-item-title">Contract Drafting</div>
                    <div class="payment-item-request-id">Request ID: LW-REQ-012</div>
                </div>
                <div class="payment-item-amount">AED 7,500</div>
                <div class="payment-item-status">
                    <span class="status-badge upcoming"><i class="fas fa-calendar"></i> Due in 5 days</span>
                </div>
                <div class="payment-item-action">
                    <button class="action-btn secondary">View Details</button>
                </div>
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
    <div id="paymentDetailsModal" class="modal" aria-hidden="true">
        <div class="modal-content">
            <button class="modal-close" id="paymentDetailsClose" aria-label="Close">&times;</button>
            <h3 id="paymentDetailsTitle">Payment Details</h3>
            <div class="payment-details-grid">
                <div class="payment-detail">
                    <div class="payment-detail-label">Service</div>
                    <div class="payment-detail-value" id="paymentDetailService">N/A</div>
                </div>
                <div class="payment-detail">
                    <div class="payment-detail-label">Request ID</div>
                    <div class="payment-detail-value" id="paymentDetailRequest">N/A</div>
                </div>
                <div class="payment-detail">
                    <div class="payment-detail-label">Amount</div>
                    <div class="payment-detail-value" id="paymentDetailAmount">N/A</div>
                </div>
                <div class="payment-detail">
                    <div class="payment-detail-label">Status</div>
                    <div class="payment-detail-value" id="paymentDetailStatus">N/A</div>
                </div>
            </div>
            <p class="payment-detail-note" id="paymentDetailNote">Review the payment details and choose how you want to proceed.</p>
            <div class="modal-actions">
                <button type="button" class="btn-pay-now" id="paymentDetailPayNow">Pay Now</button>
                <button type="button" class="btn-pay-later" id="paymentDetailPayLater">Pay Later</button>
                <button type="button" class="btn-cancel" id="paymentDetailCancel">Cancel</button>
            </div>
        </div>
    </div>
        <script src="../client-js/client-payments.js"></script>

    <script src="../client-js/dark-mode.js"></script>
</body>

</html>












