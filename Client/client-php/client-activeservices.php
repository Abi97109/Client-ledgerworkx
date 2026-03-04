<?php
$userName = 'John Doe';
$profileName = 'John Doe';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LedgerWorx - Active Services</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../client-css/client-activeservices.css">
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
        <nav class="breadcrumb portal-breadcrumb" aria-label="Breadcrumb"><a href="client-dashboard.php">Dashboard</a><span class="crumb-sep">/</span><span class="current">Active Services</span></nav>
        <div class="page-header">
            <h1 class="page-title">Active Services</h1>
            <p class="page-subtitle">Services currently active for your account</p>
        </div>

        <div class="services-grid">
            <a href="#" class="service-link" data-service-id="business-setup-government">
                <article class="service-tile">
                    <div class="tile-head">
                        <div class="tile-icon"><i class="fas fa-building"></i></div>
                        <span class="status-chip">Active</span>
                    </div>
                    <h3 class="tile-title">Business Setup & Government</h3>
                    <p class="tile-meta">Started: 08 Feb 2026</p>
                </article>
            </a>

            <a href="#" class="service-link" data-service-id="accounting-finance-cfo">
                <article class="service-tile">
                    <div class="tile-head">
                        <div class="tile-icon"><i class="fas fa-chart-line"></i></div>
                        <span class="status-chip">Active</span>
                    </div>
                    <h3 class="tile-title">Accounting, Finance & CFO</h3>
                    <p class="tile-meta">Started: 02 Feb 2026</p>
                </article>
            </a>

            <a href="#" class="service-link" data-service-id="taxation-compliance">
                <article class="service-tile">
                    <div class="tile-head">
                        <div class="tile-icon"><i class="fas fa-file-invoice-dollar"></i></div>
                        <span class="status-chip">Active</span>
                    </div>
                    <h3 class="tile-title">Taxation & Compliance</h3>
                    <p class="tile-meta">Started: 29 Jan 2026</p>
                </article>
            </a>

            <a href="#" class="service-link" data-service-id="legal-secretarial">
                <article class="service-tile">
                    <div class="tile-head">
                        <div class="tile-icon"><i class="fas fa-gavel"></i></div>
                        <span class="status-chip">Active</span>
                    </div>
                    <h3 class="tile-title">Legal & Secretarial</h3>
                    <p class="tile-meta">Started: 20 Jan 2026</p>
                </article>
            </a>

            <a href="#" class="service-link" data-service-id="audit-documentation">
                <article class="service-tile">
                    <div class="tile-head">
                        <div class="tile-icon"><i class="fas fa-clipboard-check"></i></div>
                        <span class="status-chip">Active</span>
                    </div>
                    <h3 class="tile-title">Audit & Documentation</h3>
                    <p class="tile-meta">Started: 16 Jan 2026</p>
                </article>
            </a>

            <a href="#" class="service-link" data-service-id="advisory-strategy">
                <article class="service-tile">
                    <div class="tile-head">
                        <div class="tile-icon"><i class="fas fa-lightbulb"></i></div>
                        <span class="status-chip">Active</span>
                    </div>
                    <h3 class="tile-title">Advisory & Strategy</h3>
                    <p class="tile-meta">Started: 10 Jan 2026</p>
                </article>
            </a>

            <a href="#" class="service-link" data-service-id="technology-integration">
                <article class="service-tile">
                    <div class="tile-head">
                        <div class="tile-icon"><i class="fas fa-laptop-code"></i></div>
                        <span class="status-chip">Active</span>
                    </div>
                    <h3 class="tile-title">Technology Integration</h3>
                    <p class="tile-meta">Started: 04 Jan 2026</p>
                </article>
            </a>

            <a href="#" class="service-link" data-service-id="hr-payroll-support">
                <article class="service-tile">
                    <div class="tile-head">
                        <div class="tile-icon"><i class="fas fa-users"></i></div>
                        <span class="status-chip">Active</span>
                    </div>
                    <h3 class="tile-title">HR & Payroll Support</h3>
                    <p class="tile-meta">Started: 02 Jan 2026</p>
                </article>
            </a>
        </div>
    </div>

    <div class="service-modal" id="serviceDetailModal" aria-hidden="true">
        <div class="service-modal-box" role="dialog" aria-modal="true" aria-labelledby="serviceModalTitle">
            <div class="service-modal-head">
                <h2 class="service-modal-title" id="serviceModalTitle">Service Detail</h2>
                <button class="service-modal-close" id="serviceModalClose" aria-label="Close">&times;</button>
            </div>
            <div class="service-modal-meta">
                <span class="service-chip status" id="serviceModalStatus">Active</span>
                <span class="service-chip date" id="serviceModalDate">Started: -</span>
            </div>
            <p class="service-modal-text" id="serviceModalText"></p>
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
    <script src="../client-js/client-activeservices.js"></script>
    <script src="../client-js/dark-mode.js"></script>
</body>

</html>










