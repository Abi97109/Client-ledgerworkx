<?php
$userName = 'John Doe';
$profileName = 'John Doe';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LedgerWorx - Documents</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../client-css/client-documents.css">
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
            <a href="client-documents.php" class="active">Documents</a>
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
        <div class="page-header">
            <h1 class="page-title">Documents</h1>
            <p class="page-subtitle">Manage uploaded, pending, company-shared, and invoice documents</p>
        </div>

        <div class="document-layout">
            <section class="doc-section">
                <div class="section-head">
                    <h2 class="section-title"><i class="fa-solid fa-circle-check"></i> Uploaded</h2>
                    <a class="more-docs-link" href="client-dashboarddocument.php?section=uploaded">More Documents</a>
                </div>
                <div class="doc-grid" id="uploadedGrid">
                    <article class="doc-tile">
                        <div class="doc-top">
                            <span class="doc-title">Trade License Copy</span>
                            <i class="fa-solid fa-circle-check doc-status uploaded" aria-label="uploaded"></i>
                        </div>
                        <div class="doc-meta">Updated: 10 Feb 2026</div>
                        <div class="doc-actions">
                            <button class="btn btn-view">View</button>
                            <button class="btn btn-delete">Delete</button>
                            <button class="btn btn-reupload">Reupload</button>
                        </div>
                    </article>

                    <article class="doc-tile">
                        <div class="doc-top">
                            <span class="doc-title">Passport Copy</span>
                            <i class="fa-solid fa-circle-check doc-status uploaded" aria-label="uploaded"></i>
                        </div>
                        <div class="doc-meta">Updated: 09 Feb 2026</div>
                        <div class="doc-actions">
                            <button class="btn btn-view">View</button>
                            <button class="btn btn-delete">Delete</button>
                            <button class="btn btn-reupload">Reupload</button>
                        </div>
                    </article>

                    <article class="doc-tile">
                        <div class="doc-top">
                            <span class="doc-title">VAT Registration Certificate</span>
                            <i class="fa-solid fa-circle-check doc-status uploaded" aria-label="uploaded"></i>
                        </div>
                        <div class="doc-meta">Updated: 08 Feb 2026</div>
                        <div class="doc-actions">
                            <button class="btn btn-view">View</button>
                            <button class="btn btn-delete">Delete</button>
                            <button class="btn btn-reupload">Reupload</button>
                        </div>
                    </article>

                    <article class="doc-tile">
                        <div class="doc-top">
                            <span class="doc-title">Memorandum of Association</span>
                            <i class="fa-solid fa-circle-check doc-status uploaded" aria-label="uploaded"></i>
                        </div>
                        <div class="doc-meta">Updated: 07 Feb 2026</div>
                        <div class="doc-actions">
                            <button class="btn btn-view">View</button>
                            <button class="btn btn-delete">Delete</button>
                            <button class="btn btn-reupload">Reupload</button>
                        </div>
                    </article>
                </div>
            </section>

            <section class="doc-section">
                <div class="section-head">
                    <h2 class="section-title"><i class="fa-solid fa-hourglass-half"></i> Pending</h2>
                    <a class="more-docs-link" href="client-dashboarddocument.php?section=pending">More Documents</a>
                </div>
                <div class="doc-grid" id="pendingGrid">
                    <article class="doc-tile">
                        <div class="doc-top">
                            <span class="doc-title">Emirates ID</span>
                            <i class="fa-solid fa-hourglass-half doc-status pending" aria-label="pending"></i>
                        </div>
                        <div class="doc-meta">Required for KYC review</div>
                        <div class="doc-actions">
                            <button class="btn btn-upload">Upload</button>
                            <button class="btn btn-delete">Delete</button>
                        </div>
                    </article>

                    <article class="doc-tile">
                        <div class="doc-top">
                            <span class="doc-title">Address Proof</span>
                            <i class="fa-solid fa-hourglass-half doc-status pending" aria-label="pending"></i>
                        </div>
                        <div class="doc-meta">Required for account update</div>
                        <div class="doc-actions">
                            <button class="btn btn-upload">Upload</button>
                            <button class="btn btn-delete">Delete</button>
                        </div>
                    </article>

                    <article class="doc-tile">
                        <div class="doc-top">
                            <span class="doc-title">Bank Statement</span>
                            <i class="fa-solid fa-hourglass-half doc-status pending" aria-label="pending"></i>
                        </div>
                        <div class="doc-meta">Required for financial review</div>
                        <div class="doc-actions">
                            <button class="btn btn-upload">Upload</button>
                            <button class="btn btn-delete">Delete</button>
                        </div>
                    </article>

                    <article class="doc-tile">
                        <div class="doc-top">
                            <span class="doc-title">Business Plan</span>
                            <i class="fa-solid fa-hourglass-half doc-status pending" aria-label="pending"></i>
                        </div>
                        <div class="doc-meta">Required for approval process</div>
                        <div class="doc-actions">
                            <button class="btn btn-upload">Upload</button>
                            <button class="btn btn-delete">Delete</button>
                        </div>
                    </article>
                </div>
            </section>

            <section class="doc-section company-docs-wrap">
            <div class="section-head">
                <h2 class="section-title"><i class="fa-solid fa-building"></i> Shared by Company</h2>
                <a class="more-docs-link" href="client-dashboarddocument.php?section=company-shared">More Documents</a>
            </div>
            <div class="doc-grid" id="companyGrid">
                <article class="doc-tile">
                    <div class="doc-top">
                        <span class="doc-title">Corporate Registry Certificate</span>
                        <i class="fa-solid fa-circle-check doc-status company" aria-label="company-shared"></i>
                    </div>
                    <div class="doc-meta">Shared: 06 Feb 2026</div>
                    <div class="doc-actions">
                        <button class="btn btn-view">View</button>
                        <button class="btn btn-download">Download</button>
                    </div>
                </article>

                <article class="doc-tile">
                    <div class="doc-top">
                        <span class="doc-title">Service Agreement Draft</span>
                        <i class="fa-solid fa-circle-check doc-status company" aria-label="company-shared"></i>
                    </div>
                    <div class="doc-meta">Shared: 04 Feb 2026</div>
                    <div class="doc-actions">
                        <button class="btn btn-view">View</button>
                        <button class="btn btn-download">Download</button>
                    </div>
                </article>

                <article class="doc-tile">
                    <div class="doc-top">
                        <span class="doc-title">Monthly Management Report - Jan 2026</span>
                        <i class="fa-solid fa-circle-check doc-status company" aria-label="company-shared"></i>
                    </div>
                    <div class="doc-meta">Shared: 01 Feb 2026</div>
                    <div class="doc-actions">
                        <button class="btn btn-view">View</button>
                        <button class="btn btn-download">Download</button>
                    </div>
                </article>

                <article class="doc-tile">
                    <div class="doc-top">
                        <span class="doc-title">Invoice Statement - January 2026</span>
                        <i class="fa-solid fa-circle-check doc-status company" aria-label="company-shared"></i>
                    </div>
                    <div class="doc-meta">Shared: 31 Jan 2026</div>
                    <div class="doc-actions">
                        <button class="btn btn-view">View</button>
                        <button class="btn btn-download">Download</button>
                    </div>
                </article>
            </div>
            </section>

            <section class="doc-section">
                <div class="section-head">
                    <h2 class="section-title"><i class="fa-solid fa-file-invoice-dollar"></i> Invoices</h2>
                    <a class="more-docs-link" href="client-invoices.php">More Documents</a>
                </div>
                <div class="doc-grid" id="invoiceGrid">
                    <article class="doc-tile">
                        <div class="doc-top">
                            <span class="doc-title">Invoice LW-INV-2031</span>
                            <i class="fa-solid fa-file-invoice-dollar doc-status invoice" aria-label="invoice"></i>
                        </div>
                        <div class="doc-meta">Issued: 12 Feb 2026</div>
                        <div class="doc-actions">
                            <button class="btn btn-view">View</button>
                            <button class="btn btn-download">Download</button>
                        </div>
                    </article>

                    <article class="doc-tile">
                        <div class="doc-top">
                            <span class="doc-title">Invoice LW-INV-2028</span>
                            <i class="fa-solid fa-file-invoice-dollar doc-status invoice" aria-label="invoice"></i>
                        </div>
                        <div class="doc-meta">Issued: 05 Feb 2026</div>
                        <div class="doc-actions">
                            <button class="btn btn-view">View</button>
                            <button class="btn btn-download">Download</button>
                        </div>
                    </article>

                    <article class="doc-tile">
                        <div class="doc-top">
                            <span class="doc-title">Receipt LW-RCT-1204</span>
                            <i class="fa-solid fa-file-invoice-dollar doc-status invoice" aria-label="invoice"></i>
                        </div>
                        <div class="doc-meta">Issued: 01 Feb 2026</div>
                        <div class="doc-actions">
                            <button class="btn btn-view">View</button>
                            <button class="btn btn-download">Download</button>
                        </div>
                    </article>

                    <article class="doc-tile">
                        <div class="doc-top">
                            <span class="doc-title">Invoice Summary - Jan 2026</span>
                            <i class="fa-solid fa-file-invoice-dollar doc-status invoice" aria-label="invoice"></i>
                        </div>
                        <div class="doc-meta">Issued: 31 Jan 2026</div>
                        <div class="doc-actions">
                            <button class="btn btn-view">View</button>
                            <button class="btn btn-download">Download</button>
                        </div>
                    </article>
                </div>
            </section>
        </div>
    </div>

    <input type="file" id="docFileInput" hidden>

    <div class="confirm-modal" id="deleteConfirmModal" aria-hidden="true">
        <div class="confirm-box" role="dialog" aria-modal="true" aria-labelledby="confirmDeleteTitle">
            <h3 class="confirm-title" id="confirmDeleteTitle">Delete Document</h3>
            <p class="confirm-text">Are you sure you want to delete <strong id="deleteDocName">this document</strong>?</p>
            <div class="confirm-actions">
                <button class="btn btn-cancel" id="cancelDeleteBtn" type="button">Cancel</button>
                <button class="btn btn-confirm-delete" id="confirmDeleteBtn" type="button">Delete</button>
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
    <script src="../client-js/client-documents.js"></script>
    <script src="../client-js/dark-mode.js"></script>
</body>

</html>

























