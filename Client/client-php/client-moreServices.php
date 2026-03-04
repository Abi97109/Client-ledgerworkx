<?php
$userName = 'John Doe';
$profileName = 'John Doe';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LedgerWorx - More Services</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../client-css/client-moreServices.css">
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
        <nav class="breadcrumb portal-breadcrumb" aria-label="Breadcrumb"><a href="client-dashboard.php">Dashboard</a><span class="crumb-sep">/</span><span class="current">More Services</span></nav>
        <h1 class="page-title">More Services</h1>
        <p class="page-subtitle">Explore additional service offerings</p>

        <div class="services-grid">
            <a href="client-subServices.php?category=business-setup" class="service-link"><article class="service-tile"><div class="tile-head"><span class="tile-icon"><i class="fas fa-building"></i></span><span class="tile-tag">Business</span></div><h3 class="tile-title">Business Setup & Government Services</h3><p class="tile-meta">End-to-end support for setup, licensing, approvals, and government process handling.</p></article></a>
            <a href="client-subServices.php?category=accounting-finance" class="service-link"><article class="service-tile"><div class="tile-head"><span class="tile-icon"><i class="fas fa-chart-line"></i></span><span class="tile-tag">Finance</span></div><h3 class="tile-title">Accounting, Finance & CFO Services</h3><p class="tile-meta">Bookkeeping, reporting, and CFO-level guidance for operational and financial clarity.</p></article></a>
            <a href="client-subServices.php?category=taxation-compliance" class="service-link"><article class="service-tile"><div class="tile-head"><span class="tile-icon"><i class="fas fa-file-invoice-dollar"></i></span><span class="tile-tag">Compliance</span></div><h3 class="tile-title">Taxation & Regulatory Compliance</h3><p class="tile-meta">Tax filing, statutory compliance, and periodic regulatory adherence checks.</p></article></a>
            <a href="client-subServices.php?category=audit-risk-governance" class="service-link"><article class="service-tile"><div class="tile-head"><span class="tile-icon"><i class="fas fa-clipboard-check"></i></span><span class="tile-tag">Audit</span></div><h3 class="tile-title">Audit, Risk & Governance</h3><p class="tile-meta">Audit readiness, risk controls, and governance process enhancement.</p></article></a>
            <a href="client-subServices.php?category=legal-secretarial" class="service-link"><article class="service-tile"><div class="tile-head"><span class="tile-icon"><i class="fas fa-gavel"></i></span><span class="tile-tag">Legal</span></div><h3 class="tile-title">Legal, Secretarial & Documentation</h3><p class="tile-meta">Contracts, corporate secretarial actions, and formal business documentation.</p></article></a>
            <a href="client-subServices.php?category=technology-digital" class="service-link"><article class="service-tile"><div class="tile-head"><span class="tile-icon"><i class="fas fa-laptop-code"></i></span><span class="tile-tag">Technology</span></div><h3 class="tile-title">Technology & Digital Enablement</h3><p class="tile-meta">System integration and digital process enablement for better efficiency.</p></article></a>
            <a href="client-subServices.php?category=advisory-strategy-retainer" class="service-link"><article class="service-tile"><div class="tile-head"><span class="tile-icon"><i class="fas fa-lightbulb"></i></span><span class="tile-tag">Advisory</span></div><h3 class="tile-title">Advisory, Strategy & Retainer Services</h3><p class="tile-meta">Strategic business advisory and retainer-based expert support.</p></article></a>
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
    <script src="../client-js/client-moreServices.js"></script>
    <script src="../client-js/dark-mode.js"></script>
</body>

</html>







