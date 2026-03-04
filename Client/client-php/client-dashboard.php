<?php
$userName = 'John Anderson';
$profileName = 'John Doe';
$clientEmail = 'accounts@cartertrading.ae';
$clientPhone = '+971 50 123 4567';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ledger Workx Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../client-css/client-dashboard.css?v=<?php echo filemtime(__DIR__ . '/../client-css/client-dashboard.css'); ?>">
    <link rel="stylesheet" href="../client-css/dark-mode.css?v=<?php echo filemtime(__DIR__ . '/../client-css/dark-mode.css'); ?>">
</head>

<body data-profile-name="<?php echo htmlspecialchars($profileName, ENT_QUOTES, 'UTF-8'); ?>" data-client-email="<?php echo htmlspecialchars($clientEmail, ENT_QUOTES, 'UTF-8'); ?>" data-client-phone="<?php echo htmlspecialchars($clientPhone, ENT_QUOTES, 'UTF-8'); ?>">

    <header class="navbar">
        <div class="brand">
            <a href="client-dashboard.php" aria-label="Go to Dashboard"><img src="../client-assets/logo.png" alt="Ledger Workx logo" class="logo-img"></a>
        </div>

        <button class="nav-toggle" aria-label="Toggle menu"><i class="fas fa-bars"></i></button>

        <nav class="nav-links">
            <a href="client-dashboard.php" class="active">Dashboard</a>
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
            
                <main class="container">
                    <section class="welcome">
                        <h1>Welcome back, <?php echo htmlspecialchars($userName); ?></h1>
                        <p>Here's what's happening with your account today</p>
                    </section>
            
                    <section class="packages" id="packages">
                        <article class="card" data-plan="Basic" data-href="client-package.php?plan=basic">
                            <h3>BASIC</h3>
                            <div class="price">AED 4,500/month</div>
                            <ul>
                                <li>Up to 2 Services</li>
                                <li>Essential Reports</li>
                                <li>Basic Support</li>
                            </ul>
                        </article>
            
                        <article class="card" data-plan="Pro" data-href="client-package.php?plan=pro">
                            <h3>PRO</h3>
                            <div class="price">AED 7,500/month</div>
                            <ul>
                                <li>Up to 5 Services</li>
                                <li>Advanced Reports</li>
                                <li>Priority Support</li>
                            </ul>
                        </article>
            
                        <article class="card" data-plan="Ultimate" data-href="client-package.php?plan=ultimate">
                            <h3>ULTIMATE</h3>
                            <div class="price">AED 12,000/month</div>
                            <ul>
                                <li>Comprehensive Premium Services</li>
                                <li>Up to 8 Services</li>
                                <li>Detailed Reports</li>
                            </ul>
                        </article>
                    </section>
            
                    <section class="stats">
                        <a href="client-activeservices.php" class="stat-box stat-link">
                            <span class="stat-label">Active Services</span>
                            <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
                            <h2>8</h2>
                        </a>
                        <a href="client-opentasks.php" class="stat-box stat-link">
                            <span class="stat-label">Open Tasks</span>
                            <div class="stat-icon"><i class="fas fa-tasks"></i></div>
                            <h2>3</h2>
                        </a>
                        <a href="client-dashboarddocument.php" class="stat-box stat-link">
                            <span class="stat-label">Documents Available</span>
                            <div class="stat-icon"><i class="fas fa-file-alt"></i></div>
                            <h2>24</h2>
                        </a>
                        <div class="stat-box">
                            <span class="stat-label">Payments Due</span>
                            <h2>AED 12,800</h2>
                            <div class="pay-now" style="margin-top: 14px;">
                                <button class="primary pay-btn">Pay Now</button>
                                <button class="secondary">Download Invoice</button>
                            </div>
                        </div>
                    </section>
            
                    <section class="services-section">
                        <div class="services-header">
                            <h3>Services</h3>
                            <a href="client-moreServices.php" class="more-services">More Services <i class="fas fa-arrow-right"></i></a>
                        </div>
                        <div class="services">
                            <a href="client-subServices.php?category=business-setup" class="service-box">
                                <div class="service-left">
                                    <div class="service-icon">
                                        <i class="fas fa-building"></i>
                                    </div>
                                    <span>Business Setup & Government</span>
                                </div>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                            <a href="client-subServices.php?category=accounting-finance" class="service-box">
                                <div class="service-left">
                                    <div class="service-icon">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                    <span>Accounting, Finance & CFO</span>
                                </div>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                            <a href="client-subServices.php?category=taxation-compliance" class="service-box">
                                <div class="service-left">
                                    <div class="service-icon">
                                        <i class="fas fa-file-invoice-dollar"></i>
                                    </div>
                                    <span>Taxation & Compliance</span>
                                </div>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                            <a href="client-subServices.php?category=legal-secretarial" class="service-box">
                                <div class="service-left">
                                    <div class="service-icon">
                                        <i class="fas fa-gavel"></i>
                                    </div>
                                    <span>Legal & Secretarial</span>
                                </div>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                            <a href="client-subServices.php?category=audit-risk-governance" class="service-box">
                                <div class="service-left">
                                    <div class="service-icon">
                                        <i class="fas fa-clipboard-check"></i>
                                    </div>
                                    <span>Audit & Documentation</span>
                                </div>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                            <a href="client-subServices.php?category=advisory-strategy-retainer" class="service-box">
                                <div class="service-left">
                                    <div class="service-icon">
                                        <i class="fas fa-lightbulb"></i>
                                    </div>
                                    <span>Advisory & Strategy</span>
                                </div>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </section>
            
                    <div class="bottom-section">
                        <div class="recent">
                            <h3>Recent Activity</h3>
                            <div class="activity-grid">
                                <div class="activity-tile">
                                    <div class="title">Invoice #2847 Generated</div>
                                    <div class="meta">2 hours ago</div>
                                </div>
                                <div class="activity-tile">
                                    <div class="title">Payment Received</div>
                                    <div class="meta">1 day ago</div>
                                </div>
                                <div class="activity-tile">
                                    <div class="title">Invoice #2821 Generated</div>
                                    <div class="meta">3 days ago</div>
                                </div>
                            </div>
                        </div>
            
                        <aside class="side">
                            <h3>Quick Links</h3>
                            <div class="quick-links">
                                <div id="quickBlogLink">Blog</div>
                                <a href="client-invoices.php">My Invoices</a>
                                <a href="client-support.php">Support</a>
                                <a href="client-profile-settings.php">Profile Settings</a>
                            </div>
            
                            <h3>Latest Notifications</h3>
                            <div class="notifications">
                                <p>Monthly Report Approved</p>
                                <p>ID Proof Document Uploaded</p>
                                <p>New message from Sarah</p>
                            </div>
                        </aside>
                    </div>
            
                </main>
            
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
            
                <script src="../client-js/client-dashboard.js?v=<?php echo filemtime(__DIR__ . '/../client-js/client-dashboard.js'); ?>"></script>
    <script src="../client-js/dark-mode.js?v=<?php echo filemtime(__DIR__ . '/../client-js/dark-mode.js'); ?>"></script>
</body>

</html>












