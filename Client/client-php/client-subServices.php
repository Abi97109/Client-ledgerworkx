<?php
$userName = 'John Doe';
$profileName = 'John Doe';

$category = isset($_GET['category']) ? $_GET['category'] : '';
$serviceMap = [
    'business-setup' => [
        'title' => 'Business Setup & Government Services',
        'items' => [
            [
                'name' => 'Company Incorporation',
                'description' => 'Complete support for legal setup, registration workflow, and authority submissions for a new company.',
                'amount' => 'AED 6,500',
                'years' => '1 Year'
            ],
            [
                'name' => 'Trade License Issuance',
                'description' => 'Preparation and processing of all required documents for obtaining your initial trade license.',
                'amount' => 'AED 4,200',
                'years' => '1 Year'
            ],
            [
                'name' => 'PRO and Government Liaison Services',
                'description' => 'Dedicated PRO coordination for renewals, attestations, and government-facing formalities.',
                'amount' => 'AED 3,800',
                'years' => '1 Year'
            ],
            [
                'name' => 'Visa and Immigration Processing',
                'description' => 'Application handling for investor or employee visas including filing and follow-up support.',
                'amount' => 'AED 2,900',
                'years' => '2 Years'
            ],
            [
                'name' => 'Economic Substance and UBO Filings',
                'description' => 'Regulatory filing support for ESR and UBO declarations with compliance review.',
                'amount' => 'AED 1,750',
                'years' => '1 Year'
            ]
        ]
    ],
    'accounting-finance' => [
        'title' => 'Accounting, Finance & CFO Services',
        'items' => [
            [
                'name' => 'Bookkeeping and Accounting Management',
                'description' => 'Monthly bookkeeping, reconciliations, and ledger maintenance for financial accuracy.',
                'amount' => 'AED 2,400',
                'years' => '1 Year'
            ],
            [
                'name' => 'Management Reporting and MIS',
                'description' => 'Periodic management reporting packs with KPI tracking and business insights.',
                'amount' => 'AED 2,100',
                'years' => '1 Year'
            ],
            [
                'name' => 'Virtual CFO Advisory',
                'description' => 'Strategic financial leadership for planning, controls, and executive decision support.',
                'amount' => 'AED 8,500',
                'years' => '1 Year'
            ],
            [
                'name' => 'Cash Flow Planning and Forecasting',
                'description' => 'Cash flow model creation and rolling forecast support for liquidity management.',
                'amount' => 'AED 3,300',
                'years' => '1 Year'
            ],
            [
                'name' => 'Budgeting and Financial Controls',
                'description' => 'Budget framework setup and control mechanisms to improve cost discipline.',
                'amount' => 'AED 2,950',
                'years' => '1 Year'
            ]
        ]
    ],
    'taxation-compliance' => [
        'title' => 'Taxation & Regulatory Compliance',
        'items' => [
            [
                'name' => 'VAT Registration and Return Filing',
                'description' => 'VAT registration, return preparation, and submission support on scheduled timelines.',
                'amount' => 'AED 1,850',
                'years' => '1 Year'
            ],
            [
                'name' => 'Corporate Tax Advisory and Filing',
                'description' => 'Tax planning guidance and annual filing preparation aligned with regulatory obligations.',
                'amount' => 'AED 3,450',
                'years' => '1 Year'
            ],
            [
                'name' => 'Compliance Health Checks',
                'description' => 'Periodic review of filings and records to identify and fix compliance gaps early.',
                'amount' => 'AED 1,500',
                'years' => '1 Year'
            ],
            [
                'name' => 'Regulatory Reporting',
                'description' => 'Preparation of required statutory and authority reports with filing coordination.',
                'amount' => 'AED 2,250',
                'years' => '1 Year'
            ],
            [
                'name' => 'Tax Documentation Support',
                'description' => 'Compilation and review of tax documents for audits, assessments, and submissions.',
                'amount' => 'AED 1,650',
                'years' => '1 Year'
            ]
        ]
    ],
    'audit-risk-governance' => [
        'title' => 'Audit, Risk & Governance',
        'items' => [
            [
                'name' => 'Internal Audit Services',
                'description' => 'Risk-based internal audits to assess control effectiveness and process integrity.',
                'amount' => 'AED 4,900',
                'years' => '1 Year'
            ],
            [
                'name' => 'Risk Assessment and Controls',
                'description' => 'Business risk assessment and control design for stronger operational resilience.',
                'amount' => 'AED 3,100',
                'years' => '1 Year'
            ],
            [
                'name' => 'External Audit Coordination',
                'description' => 'Audit readiness support and coordination with external auditors for smooth closure.',
                'amount' => 'AED 2,700',
                'years' => '1 Year'
            ],
            [
                'name' => 'Governance Framework Design',
                'description' => 'Design of governance structures, reporting lines, and accountability framework.',
                'amount' => 'AED 3,950',
                'years' => '2 Years'
            ],
            [
                'name' => 'Policy and SOP Development',
                'description' => 'Drafting of internal policies and SOPs to standardize processes and controls.',
                'amount' => 'AED 2,250',
                'years' => '2 Years'
            ]
        ]
    ],
    'legal-secretarial' => [
        'title' => 'Legal, Secretarial & Documentation',
        'items' => [
            [
                'name' => 'Contract Drafting and Review',
                'description' => 'Preparation and review of commercial contracts to reduce legal and commercial risk.',
                'amount' => 'AED 2,800',
                'years' => 'Per Contract (Up to 1 Year Support)'
            ],
            [
                'name' => 'Corporate Secretarial Compliance',
                'description' => 'End-to-end compliance for statutory registers, annual filings, and corporate records.',
                'amount' => 'AED 2,450',
                'years' => '1 Year'
            ],
            [
                'name' => 'Board Resolutions and Minutes',
                'description' => 'Drafting and formatting of resolutions, meeting agendas, and board minutes.',
                'amount' => 'AED 1,650',
                'years' => '1 Year'
            ],
            [
                'name' => 'Shareholder Documentation',
                'description' => 'Support for shareholder agreements, amendments, and ownership-related documentation.',
                'amount' => 'AED 2,050',
                'years' => '1 Year'
            ],
            [
                'name' => 'Legal Notice and Agreement Support',
                'description' => 'Legal notice drafting and agreement assistance for standard business requirements.',
                'amount' => 'AED 1,900',
                'years' => '1 Year'
            ]
        ]
    ],
    'technology-digital' => [
        'title' => 'Technology & Digital Enablement',
        'items' => [
            [
                'name' => 'ERP and Accounting System Setup',
                'description' => 'Configuration and deployment of ERP or accounting systems with initial onboarding.',
                'amount' => 'AED 7,200',
                'years' => '3 Years'
            ],
            [
                'name' => 'Workflow Automation',
                'description' => 'Automation of repetitive business processes to improve speed and reduce manual effort.',
                'amount' => 'AED 4,600',
                'years' => '2 Years'
            ],
            [
                'name' => 'Business Intelligence Dashboards',
                'description' => 'Custom dashboard setup for finance and operations performance tracking.',
                'amount' => 'AED 3,700',
                'years' => '2 Years'
            ],
            [
                'name' => 'Data Migration and Cleanup',
                'description' => 'Structured data migration with validation and cleanup before go-live.',
                'amount' => 'AED 2,950',
                'years' => 'One-Time + 6 Months Support'
            ],
            [
                'name' => 'Digital Process Optimization',
                'description' => 'Optimization of existing digital workflows for better turnaround and control.',
                'amount' => 'AED 2,500',
                'years' => '1 Year'
            ]
        ]
    ],
    'advisory-strategy-retainer' => [
        'title' => 'Advisory, Strategy & Retainer Services',
        'items' => [
            [
                'name' => 'Business Growth Strategy Consulting',
                'description' => 'Strategic roadmap support for market growth, profitability, and expansion planning.',
                'amount' => 'AED 5,900',
                'years' => '1 Year'
            ],
            [
                'name' => 'Operational Efficiency Advisory',
                'description' => 'Improvement plans for process efficiency, cost reduction, and performance uplift.',
                'amount' => 'AED 3,850',
                'years' => '1 Year'
            ],
            [
                'name' => 'Quarterly Strategy Reviews',
                'description' => 'Quarterly leadership review sessions with strategic performance recommendations.',
                'amount' => 'AED 2,750',
                'years' => '1 Year'
            ],
            [
                'name' => 'Retainer-Based Advisory Support',
                'description' => 'Ongoing advisory retainer with priority response and monthly executive support.',
                'amount' => 'AED 4,400',
                'years' => '1 Year'
            ],
            [
                'name' => 'Board and Leadership Advisory',
                'description' => 'Senior-level advisory for governance, board readiness, and executive alignment.',
                'amount' => 'AED 6,200',
                'years' => '1 Year'
            ]
        ]
    ]
];

$selected = isset($serviceMap[$category]) ? $serviceMap[$category] : [
    'title' => 'All Sub Services',
    'items' => [
        [
            'name' => 'No service category selected',
            'description' => 'Please open More Services and click a category tile to view available sub services.',
            'amount' => 'N/A',
            'years' => 'N/A'
        ]
    ]
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LedgerWorx - Sub Services</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../client-css/client-subServices.css">
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
        <nav class="breadcrumb portal-breadcrumb" aria-label="Breadcrumb"><a href="client-dashboard.php">Dashboard</a><span class="crumb-sep">/</span><a href="client-moreServices.php">More Services</a><span class="crumb-sep">/</span><span class="current"><?php echo htmlspecialchars($selected['title']); ?></span></nav>
        <h1 class="page-title"><?php echo htmlspecialchars($selected['title']); ?></h1>
        <p class="page-subtitle">Sub services available in this category</p>

        <ul class="subservice-list">
            <?php foreach ($selected['items'] as $index => $item): ?>
                <li class="subservice-item">
                    <button
                        type="button"
                        class="subservice-trigger"
                        data-name="<?php echo htmlspecialchars($item['name'], ENT_QUOTES); ?>"
                        data-description="<?php echo htmlspecialchars($item['description'], ENT_QUOTES); ?>"
                        data-amount="<?php echo htmlspecialchars($item['amount'], ENT_QUOTES); ?>"
                        data-years="<?php echo htmlspecialchars($item['years'], ENT_QUOTES); ?>">
                        <span class="subservice-name"><?php echo htmlspecialchars($item['name']); ?></span>
                        <span class="subservice-index"><?php echo $index + 1; ?></span>
                    </button>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div id="subserviceModal" class="modal" aria-hidden="true">
        <div class="modal-content">
            <button class="modal-close" id="subserviceClose" aria-label="Close">&times;</button>
            <h3 id="subserviceTitle">Sub Service</h3>
            <p id="subserviceDescription" class="subservice-modal-details"></p>
            <div class="subservice-meta">
                <div class="subservice-meta-row"><strong>Amount:</strong> <span id="subserviceAmount"></span></div>
                <div class="subservice-meta-row"><strong>Duration:</strong> <span id="subserviceYears"></span></div>
            </div>
            <div class="subservice-actions">
                <button type="button" class="btn-proceed" id="subserviceProceed">Proceed</button>
                <button type="button" class="btn-cancel" id="subserviceCancel">Cancel</button>
            </div>
        </div>
    </div>

    <div id="subserviceFormModal" class="modal" aria-hidden="true">
        <div class="modal-content">
            <button class="modal-close" id="subserviceFormClose" aria-label="Close">&times;</button>
            <h3 id="subserviceFormTitle">Request Service</h3>
            <form id="subserviceRequestForm" class="request-form">
                <div>
                    <label for="reqName">Full Name</label>
                    <input type="text" id="reqName" required>
                </div>
                <div>
                    <label for="reqEmail">Email</label>
                    <input type="email" id="reqEmail" required>
                </div>
                <div>
                    <label for="reqPhone">Phone</label>
                    <input type="text" id="reqPhone" required>
                </div>
                <div>
                    <label for="reqNotes">Notes</label>
                    <textarea id="reqNotes" placeholder="Add any specific requirement..."></textarea>
                </div>
                <div class="subservice-actions">
                    <button type="submit" class="btn-proceed">Submit</button>
                    <button type="button" class="btn-cancel" id="subserviceFormCancel">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal" class="modal" aria-hidden="true">
        <div class="modal-content">
            <button class="modal-close" id="signoutClose" aria-label="Close">&times;</button>
            <h3 id="modal-title">Confirm</h3>
            <p id="modal-body">Are you sure?</p>
            <div class="modal-actions">
                <button class="primary" id="modalConfirm">Confirm</button>
                <button class="secondary" id="modalCancel">Cancel</button>
            </div>
        </div>
    </div>

    <script src="../client-js/client-subServices.js"></script>
    <script src="../client-js/dark-mode.js"></script>
</body>

</html>





