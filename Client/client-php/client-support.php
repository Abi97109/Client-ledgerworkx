<?php
$userName = 'John Doe';
$profileName = 'John Doe';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LedgerWorx - Customer Support</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../client-css/client-support.css">
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
        <nav class="breadcrumb portal-breadcrumb" aria-label="Breadcrumb"><a href="client-dashboard.php">Dashboard</a><span class="crumb-sep">/</span><span class="current">Support</span></nav>
        <h1 class="page-title">Customer Support</h1>
        <p class="page-subtitle">Contact us through phone, email, or office location details.</p>

        <div class="support-grid">
            <article class="support-card">
                <h3>Phone Numbers</h3>
                <div class="support-item">
                    <i class="fas fa-phone"></i>
                    <div>
                        <div>+971 4 123 4567</div>
                        <div class="support-meta">Main Support Line</div>
                    </div>
                </div>
                <div class="support-item">
                    <i class="fas fa-mobile-alt"></i>
                    <div>
                        <div>+971 50 987 6543</div>
                        <div class="support-meta">Priority Client Support</div>
                    </div>
                </div>
            </article>

            <article class="support-card">
                <h3>Email Addresses</h3>
                <div class="support-item">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <div>support@ledgerworx.com</div>
                        <div class="support-meta">General Support</div>
                    </div>
                </div>
                <div class="support-item">
                    <i class="fas fa-envelope-open-text"></i>
                    <div>
                        <div>care@ledgerworx.com</div>
                        <div class="support-meta">Customer Care</div>
                    </div>
                </div>
            </article>

            <article class="support-card">
                <h3>Office Location</h3>
                <div class="support-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <div>LedgerWorx Business Center</div>
                        <div>Sheikh Zayed Road, Dubai, UAE</div>
                        <div class="support-meta">Mon - Fri, 9:00 AM to 6:00 PM</div>
                    </div>
                </div>
            </article>
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

    <script src="../client-js/client-support.js"></script>
    <script src="../client-js/dark-mode.js"></script>
</body>
</html>





