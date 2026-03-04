<?php
$userName = 'John Doe';
$profileName = 'John Doe';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LedgerWorx - Available Documents</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../client-css/client-dashboarddocument.css">
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
        <nav class="breadcrumb portal-breadcrumb" aria-label="Breadcrumb"><a href="client-dashboard.php">Dashboard</a><span class="crumb-sep">/</span><span class="current">Documents</span></nav>
        <h1 class="page-title">All Available Documents</h1>
        <p class="page-subtitle">Documents currently available for your account</p>

        <div class="doc-grid">
            <article class="doc-tile"><div class="doc-head"><span class="doc-icon"><i class="fas fa-file-alt"></i></span><i class="fas fa-check-circle doc-status"></i></div><h3 class="doc-title">Trade License Copy</h3><p class="doc-meta">Updated: 10 Feb 2026</p></article>
            <article class="doc-tile"><div class="doc-head"><span class="doc-icon"><i class="fas fa-file-alt"></i></span><i class="fas fa-check-circle doc-status"></i></div><h3 class="doc-title">Passport Copy</h3><p class="doc-meta">Updated: 09 Feb 2026</p></article>
            <article class="doc-tile"><div class="doc-head"><span class="doc-icon"><i class="fas fa-file-alt"></i></span><i class="fas fa-check-circle doc-status"></i></div><h3 class="doc-title">VAT Registration Certificate</h3><p class="doc-meta">Updated: 08 Feb 2026</p></article>
            <article class="doc-tile"><div class="doc-head"><span class="doc-icon"><i class="fas fa-file-alt"></i></span><i class="fas fa-check-circle doc-status"></i></div><h3 class="doc-title">Memorandum of Association</h3><p class="doc-meta">Updated: 07 Feb 2026</p></article>
            <article class="doc-tile"><div class="doc-head"><span class="doc-icon"><i class="fas fa-file-alt"></i></span><i class="fas fa-check-circle doc-status"></i></div><h3 class="doc-title">Corporate Registry Certificate</h3><p class="doc-meta">Updated: 06 Feb 2026</p></article>
            <article class="doc-tile"><div class="doc-head"><span class="doc-icon"><i class="fas fa-file-alt"></i></span><i class="fas fa-check-circle doc-status"></i></div><h3 class="doc-title">Trade License Certificate</h3><p class="doc-meta">Updated: 05 Feb 2026</p></article>
            <article class="doc-tile"><div class="doc-head"><span class="doc-icon"><i class="fas fa-file-alt"></i></span><i class="fas fa-check-circle doc-status"></i></div><h3 class="doc-title">Business Plan Attachment</h3><p class="doc-meta">Updated: 04 Feb 2026</p></article>
            <article class="doc-tile"><div class="doc-head"><span class="doc-icon"><i class="fas fa-file-alt"></i></span><i class="fas fa-check-circle doc-status"></i></div><h3 class="doc-title">Bank Statement</h3><p class="doc-meta">Updated: 03 Feb 2026</p></article>
        </div>
    </div>

    <div class="doc-modal" id="docModal" aria-hidden="true">
        <div class="doc-modal-box" role="dialog" aria-modal="true" aria-labelledby="docModalTitle">
            <div class="doc-modal-head">
                <h2 class="doc-modal-title" id="docModalTitle">Document</h2>
                <button class="doc-modal-close" id="docModalClose" aria-label="Close">&times;</button>
            </div>
            <div class="doc-preview" id="docPreview">
                <i class="fas fa-file-lines"></i>
                Document preview is shown here.
            </div>
            <p class="doc-modal-meta" id="docModalMeta"></p>
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
    <script src="../client-js/client-dashboarddocument.js"></script>
    <script src="../client-js/dark-mode.js"></script>
</body>

</html>









