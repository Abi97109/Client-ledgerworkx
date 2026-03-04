<?php
$userName = 'John Doe';
$profileName = 'John Doe';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LedgerWorx - My Requests</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../client-css/client-request.css">
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
            <a href="client-request.php" class="active">My Requests</a>
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
        <nav class="breadcrumb portal-breadcrumb" aria-label="Breadcrumb"><a href="client-dashboard.php">Dashboard</a><span class="crumb-sep">/</span><span class="current">My Requests</span></nav>

        <h2 class="page-title">Request Status</h2>
        <p class="subtitle">Track the progress of all your service requests</p>

        <!-- REQUEST ITEM 1 -->
        <div class="request-card" onclick="openRequestModal(0)">

            <div class="left">
                <div class="icon-box orange"><i class="fas fa-briefcase"></i></div>
                <div class="request-info">
                    <h4>Business Setup - Trade License Issuance</h4>
                    <small>Request ID: LW-REQ-024 | Submitted 12 Jan 2026</small>
                </div>
            </div>

            <div class="right">
                <div class="status-text">Status: In Progress</div>

                <div class="progress">
                    <div class="step active"></div>
                    <div class="line active"></div>
                    <div class="step active"></div>
                    <div class="line active"></div>
                    <div class="step active"></div>
                    <div class="line"></div>
                    <div class="step"></div>
                    <div class="line"></div>
                    <div class="step"></div>
                </div>

                <div class="labels">
                    <span>Submitted</span>
                    <span>Review</span>
                    <span>Processing</span>
                    <span>Pending</span>
                    <span>Completed</span>
                </div>
            </div>

            <div class="arrow"><i class="fas fa-chevron-right"></i></div>

        </div>

        <!-- REQUEST ITEM 2 -->

        <div class="request-card" onclick="openRequestModal(1)">
            <div class="left">
                <div class="icon-box green"><i class="fas fa-file-invoice"></i></div>
                <div class="request-info">
                    <h4>Accounting & Finance - Monthly Bookkeeping</h4>
                    <small>Request ID: LW-REQ-018 | Submitted 8 Jan 2026</small>
                </div>
            </div>

            <div class="right">
                <div class="status-text">Status: Under Review</div>
                <div class="progress">
                    <div class="step active"></div>
                    <div class="line active"></div>
                    <div class="step active"></div>
                    <div class="line"></div>
                    <div class="step"></div>
                    <div class="line"></div>
                    <div class="step"></div>
                    <div class="line"></div>
                    <div class="step"></div>
                </div>
                <div class="labels">
                    <span>Submitted</span>
                    <span>Review</span>
                    <span>Processing</span>
                    <span>Pending</span>
                    <span>Completed</span>
                </div>
            </div>
            <div class="arrow"><i class="fas fa-chevron-right"></i></div>
        </div>

        <!-- REQUEST ITEM 3 -->

        <div class="request-card" onclick="openRequestModal(2)">
            <div class="left">
                <div class="icon-box purple"><i class="fas fa-calculator"></i></div>
                <div class="request-info">
                    <h4>Taxation - VAT Filing</h4>
                    <small>Request ID: LW-REQ-015 | Submitted 5 Jan 2026</small>
                </div>
            </div>

            <div class="right">
                <div class="status-text">Status: Completed</div>
                <div class="progress">
                    <div class="step active"></div>
                    <div class="line active"></div>
                    <div class="step active"></div>
                    <div class="line active"></div>
                    <div class="step active"></div>
                    <div class="line active"></div>
                    <div class="step active"></div>
                    <div class="line active"></div>
                    <div class="step active"></div>
                </div>
                <div class="labels">
                    <span>Submitted</span>
                    <span>Review</span>
                    <span>Processing</span>
                    <span>Approved</span>
                    <span>Completed</span>
                </div>
            </div>
            <div class="arrow"><i class="fas fa-chevron-right"></i></div>
        </div>

    </div>

    <!-- REQUEST DETAIL MODAL -->
    <div class="modal-overlay" id="requestModal">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <div class="modal-header-icon" id="modalIcon">
                    <i class="fas fa-briefcase"></i>
                </div>
                <div class="modal-header-title">
                    <h2 id="modalTitle">Request Title</h2>
                </div>
                <button class="modal-close-btn" onclick="closeRequestModal()">&times;</button>
            </div>

            <!-- Progress Tracker -->
            <div class="progress-tracker">
                <div class="progress-steps" id="progressSteps">
                    <!-- Dynamically populated -->
                </div>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Request Info -->
                <div class="modal-section">
                    <div class="modal-info-row">
                        <span class="modal-info-label">Due by:</span>
                        <span class="modal-info-value" id="modalDueDate">Apr 25, 2024</span>
                    </div>
                    <div class="modal-info-row">
                        <span class="modal-info-label">Category:</span>
                        <span class="modal-category-badge" id="modalCategory">Accounting</span>
                    </div>
                </div>

                <!-- Overview -->
                <div class="modal-section">
                    <h3>Overview</h3>
                    <p class="modal-description" id="modalOverview">Request description goes here.</p>
                </div>

                <!-- Instructions -->
                <div class="modal-section">
                    <h3>Instructions</h3>
                    <ul class="modal-list" id="modalInstructions">
                        <li>Instruction item 1</li>
                        <li>Instruction item 2</li>
                    </ul>
                </div>

                <div class="modal-section">
                    <h3>Uploaded Documents</h3>
                    <ul class="modal-list" id="modalUploadedDocuments">
                        <li class="uploaded-doc-empty">No documents uploaded yet.</li>
                    </ul>
                </div>

                <!-- Assigned Staff -->
                <div class="modal-section">
                    <h3>Assigned Staff</h3>
                    <div class="modal-staff">
                        <img src="https://i.pravatar.cc/48" alt="Staff" class="modal-staff-img">
                        <div class="modal-staff-info">
                            <h4 id="modalStaffName">Jane Smith</h4>
                            <p id="modalStaffRole">Senior Accountant</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button class="modal-btn modal-btn-secondary" onclick="closeRequestModal()">Close</button>
                <button class="modal-btn modal-btn-primary" id="modalActionBtn">Submit Report</button>
            </div>
            <input type="file" id="requestDocumentInput" class="hidden-file-input" accept=".pdf,.doc,.docx,.xls,.xlsx,.png,.jpg,.jpeg" multiple>
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
    <script src="../client-js/client-request.js"></script>

    <script src="../client-js/dark-mode.js"></script>
</body>

</html>











