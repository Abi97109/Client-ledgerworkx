<?php
$userName = 'John Doe';
$profileName = 'John Doe';

$planKey = isset($_GET['plan']) ? strtolower(trim($_GET['plan'])) : '';
$packageMap = [
    'basic' => [
        'name' => 'Basic Package',
        'tagline' => 'Essential coverage for early-stage operations.',
        'monthly_price' => 'AED 4,500/month',
        'annual_price' => 'AED 54,000/year',
        'services_limit' => 'Up to 2 active services',
        'support' => 'Business hours email support (response within 24 hours)',
        'reports' => 'Monthly essential report pack',
        'turnaround' => 'Standard turnaround timelines',
        'onboarding' => 'One-time onboarding and account setup',
        'included_services' => [
            'Business registration guidance',
            'Core bookkeeping assistance',
            'Basic tax compliance reminders',
            'Document checklist support'
        ],
        'deliverables' => [
            'Monthly summary report',
            'Compliance calendar',
            'Service request tracking access'
        ],
        'not_included' => [
            'Priority queue handling',
            'Dedicated account manager',
            'Advanced MIS analytics'
        ]
    ],
    'pro' => [
        'name' => 'Pro Package',
        'tagline' => 'Balanced plan for growing teams needing faster support.',
        'monthly_price' => 'AED 7,500/month',
        'annual_price' => 'AED 90,000/year',
        'services_limit' => 'Up to 5 active services',
        'support' => 'Priority email and phone support (same-business-day response)',
        'reports' => 'Advanced monthly report pack with KPI sections',
        'turnaround' => 'Accelerated turnaround on standard requests',
        'onboarding' => 'Onboarding plus process-alignment workshop',
        'included_services' => [
            'Everything in Basic',
            'Management reporting and MIS setup',
            'VAT and corporate tax filing support',
            'Contract/document review assistance',
            'Quarterly advisory review call'
        ],
        'deliverables' => [
            'Advanced MIS report',
            'Quarterly compliance review',
            'Issue escalation handling'
        ],
        'not_included' => [
            'Full retainer strategic board advisory',
            'Dedicated on-site resource'
        ]
    ],
    'ultimate' => [
        'name' => 'Ultimate Package',
        'tagline' => 'Comprehensive premium service with strategic advisory.',
        'monthly_price' => 'AED 12,000/month',
        'annual_price' => 'AED 144,000/year',
        'services_limit' => 'Up to 8 active services',
        'support' => 'Dedicated relationship manager and priority SLA support',
        'reports' => 'Detailed executive reports, dashboards, and recommendations',
        'turnaround' => 'Fast-track handling across all covered service categories',
        'onboarding' => 'Full onboarding, governance setup, and roadmap planning',
        'included_services' => [
            'Everything in Pro',
            'Virtual CFO oversight and strategic planning',
            'Internal audit and risk advisory support',
            'Board-ready reporting packs',
            'Retainer-based strategy and leadership advisory'
        ],
        'deliverables' => [
            'Executive monthly dashboard',
            'Quarterly strategy and performance workshop',
            'Governance and risk action tracker',
            'Customized service roadmap'
        ],
        'not_included' => [
            'Out-of-scope legal representation',
            'Government fees paid to external authorities'
        ]
    ]
];

$selectedPlan = isset($packageMap[$planKey]) ? $packageMap[$planKey] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LedgerWorx - Package Details</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../client-css/client-package.css?v=<?php echo filemtime(__DIR__ . '/../client-css/client-package.css'); ?>">
    <link rel="stylesheet" href="../client-css/dark-mode.css?v=<?php echo filemtime(__DIR__ . '/../client-css/dark-mode.css'); ?>">
    <link rel="stylesheet" href="../client-css/client-breadcrumb.css?v=<?php echo filemtime(__DIR__ . '/../client-css/client-breadcrumb.css'); ?>">
</head>
<body data-selected-plan-name="<?php echo htmlspecialchars($selectedPlan ? $selectedPlan['name'] : '', ENT_QUOTES, 'UTF-8'); ?>">
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
        <nav class="breadcrumb portal-breadcrumb" aria-label="Breadcrumb"><a href="client-dashboard.php">Dashboard</a><span class="crumb-sep">/</span><span class="current"><?php echo htmlspecialchars($selectedPlan ? $selectedPlan['name'] : 'Package Details'); ?></span></nav>

        <?php if ($selectedPlan): ?>
            <h1 class="title"><?php echo htmlspecialchars($selectedPlan['name']); ?></h1>
            <p class="subtitle"><?php echo htmlspecialchars($selectedPlan['tagline']); ?></p>

            <section class="card hero">
                <div class="meta-box">
                    <div class="meta-label">Monthly Price</div>
                    <div class="meta-value"><?php echo htmlspecialchars($selectedPlan['monthly_price']); ?></div>
                </div>
                <div class="meta-box">
                    <div class="meta-label">Annual Price</div>
                    <div class="meta-value"><?php echo htmlspecialchars($selectedPlan['annual_price']); ?></div>
                </div>
                <div class="meta-box">
                    <div class="meta-label">Service Coverage</div>
                    <div class="meta-value"><?php echo htmlspecialchars($selectedPlan['services_limit']); ?></div>
                </div>
                <div class="meta-box">
                    <div class="meta-label">Support Model</div>
                    <div class="meta-value"><?php echo htmlspecialchars($selectedPlan['support']); ?></div>
                </div>
                <div class="meta-box">
                    <div class="meta-label">Reporting</div>
                    <div class="meta-value"><?php echo htmlspecialchars($selectedPlan['reports']); ?></div>
                </div>
                <div class="meta-box">
                    <div class="meta-label">Turnaround</div>
                    <div class="meta-value"><?php echo htmlspecialchars($selectedPlan['turnaround']); ?></div>
                </div>
                <div class="meta-box">
                    <div class="meta-label">Onboarding</div>
                    <div class="meta-value"><?php echo htmlspecialchars($selectedPlan['onboarding']); ?></div>
                </div>
            </section>

            <section class="card">
                <h2 class="section-title">Included Services</h2>
                <ul class="list">
                    <?php foreach ($selectedPlan['included_services'] as $item): ?>
                        <li><?php echo htmlspecialchars($item); ?></li>
                    <?php endforeach; ?>
                </ul>
            </section>

            <section class="card">
                <h2 class="section-title">Deliverables</h2>
                <ul class="list">
                    <?php foreach ($selectedPlan['deliverables'] as $item): ?>
                        <li><?php echo htmlspecialchars($item); ?></li>
                    <?php endforeach; ?>
                </ul>
            </section>

            <section class="card">
                <h2 class="section-title">Not Included</h2>
                <ul class="list">
                    <?php foreach ($selectedPlan['not_included'] as $item): ?>
                        <li><?php echo htmlspecialchars($item); ?></li>
                    <?php endforeach; ?>
                </ul>
                <div class="actions">
                    <button type="button" class="btn btn-primary" id="openRequestModal">Proceed with Request</button>
                    <a class="btn btn-secondary" href="client-dashboard.php#packages">Compare Other Packages</a>
                </div>
            </section>
        <?php else: ?>
            <div class="empty">
                <strong>Package not found.</strong>
                <p>Please return to the dashboard and select Basic, Pro, or Ultimate.</p>
            </div>
        <?php endif; ?>
    </main>

    <div id="requestModal" class="modal" aria-hidden="true">
        <div class="modal-content" role="dialog" aria-modal="true" aria-labelledby="requestModalTitle">
            <button class="modal-close" id="closeRequestModal" aria-label="Close">&times;</button>
            <h3 class="modal-title" id="requestModalTitle">Package Request Form</h3>
            <p class="modal-subtitle">Fill the details below and continue to the payment gateway.</p>
            <form id="requestForm" class="request-form" method="post" action="client-payment-gateway.php">
                <div>
                    <label for="requestPackage">Selected Package</label>
                    <input type="text" id="requestPackage" name="package_name" readonly>
                </div>
                <input type="hidden" id="requestPlan" name="plan" value="<?php echo htmlspecialchars($planKey); ?>">
                <input type="hidden" id="requestPrice" name="package_price" value="<?php echo htmlspecialchars($selectedPlan ? $selectedPlan['monthly_price'] : ''); ?>">
                <div>
                    <label for="requestName">Full Name</label>
                    <input type="text" id="requestName" name="full_name" required>
                </div>
                <div>
                    <label for="requestEmail">Email Address</label>
                    <input type="email" id="requestEmail" name="email" required>
                </div>
                <div>
                    <label for="requestPhone">Phone Number</label>
                    <input type="tel" id="requestPhone" name="phone" required>
                </div>
                <div>
                    <label for="requestCompany">Company Name</label>
                    <input type="text" id="requestCompany" name="company_name" required>
                </div>
                <div>
                    <label for="requestNotes">Additional Notes</label>
                    <textarea id="requestNotes" name="notes" placeholder="Any special request or details"></textarea>
                </div>
                <div class="modal-actions">
                    <button type="button" class="btn btn-secondary" id="cancelRequestModal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Proceed to Payment Gateway</button>
                </div>
            </form>
        </div>
    </div>

    <script src="../client-js/client-package.js?v=<?php echo filemtime(__DIR__ . '/../client-js/client-package.js'); ?>"></script>

    <script src="../client-js/dark-mode.js?v=<?php echo filemtime(__DIR__ . '/../client-js/dark-mode.js'); ?>"></script>
</body>
</html>


