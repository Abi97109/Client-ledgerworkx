<?php
$userName = 'John Carter';
$profileName = 'John Carter';
$email = 'accounts@cartertrading.ae';
$phone = '+971 50 123 4567';
$clientType = 'Business Client';
$clientSince = 'January 15, 2024';
$company = 'Carter Trading LLC';
$servicePlan = 'Pro Business Plan';
$clientId = 'CL-2024-1187';
$billingCycle = 'Monthly';
$location = 'Dubai, UAE';
$lastLogin = 'Today at 9:45 AM';
$timeZone = 'GST (UTC +4)';
$language = 'English';
$status = 'Active';

$parts = preg_split('/\s+/', trim($profileName));
$initials = '';
foreach ($parts as $part) {
    if ($part !== '') {
        $initials .= strtoupper(substr($part, 0, 1));
    }
}
$initials = substr($initials, 0, 2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LedgerWorx - Profile Settings</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../client-css/client-profile-settings.css">
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

    <main class="container">
        <nav class="breadcrumb portal-breadcrumb" aria-label="Breadcrumb"><a href="client-dashboard.php">Dashboard</a><span class="crumb-sep">/</span><span class="current">Profile Settings</span></nav>
        <h1 class="page-title">Client Profile</h1>

        <section class="panel">
            <div class="profile-summary">
                <div class="avatar-wrap">
                    <div class="avatar" id="avatarBox">
                        <span class="avatar-initials" id="avatarInitials"><?php echo htmlspecialchars($initials); ?></span>
                        <img src="" alt="Client profile photo" id="avatarPreview">
                    </div>
                    <button type="button" class="photo-btn" id="changePhotoBtn"><i class="fas fa-camera"></i> Change Photo</button>
                    <input type="file" id="photoInput" accept="image/*" hidden>
                </div>
                <div class="identity">
                    <h2><?php echo htmlspecialchars($profileName); ?></h2>
                    <p class="meta"><?php echo htmlspecialchars($clientType); ?> Account - <span class="status-dot"><?php echo htmlspecialchars($status); ?></span></p>
                    <p class="line"><i class="fas fa-envelope"></i> <span id="identityEmailText"><?php echo htmlspecialchars($email); ?></span></p>
                    <p class="line"><i class="fas fa-building"></i> <?php echo htmlspecialchars($company); ?></p>
                </div>
            </div>

            <div class="settings-grid">
                <div class="setting-box">
                    <div class="setting-label"><i class="fas fa-building"></i> Business Name</div>
                    <div class="setting-value"><?php echo htmlspecialchars($company); ?></div>
                </div>
                <div class="setting-box">
                    <div class="setting-label"><i class="fas fa-envelope"></i> Business Email</div>
                    <button type="button" class="setting-edit-btn" id="editEmailBtn" aria-label="Edit Business Email"><i class="fas fa-pen"></i></button>
                    <div class="setting-value" id="businessEmailValue"><?php echo htmlspecialchars($email); ?></div>
                </div>
                <div class="setting-box">
                    <div class="setting-label"><i class="fas fa-phone"></i> Primary Contact Number</div>
                    <button type="button" class="setting-edit-btn" id="editPhoneBtn" aria-label="Edit Primary Contact Number"><i class="fas fa-pen"></i></button>
                    <div class="setting-value" id="contactPhoneValue"><?php echo htmlspecialchars($phone); ?></div>
                </div>
                <div class="setting-box">
                    <div class="setting-label"><i class="fas fa-user-tie"></i> Client Type</div>
                    <div class="setting-value"><?php echo htmlspecialchars($clientType); ?></div>
                </div>
                <div class="setting-box">
                    <div class="setting-label"><i class="fas fa-calendar"></i> Client Since</div>
                    <div class="setting-value"><?php echo htmlspecialchars($clientSince); ?></div>
                </div>
                <div class="setting-box">
                    <div class="setting-label"><i class="fas fa-layer-group"></i> Service Plan</div>
                    <div class="setting-value"><?php echo htmlspecialchars($servicePlan); ?></div>
                </div>
                <div class="setting-box">
                    <div class="setting-label"><i class="fas fa-map-marker-alt"></i> Business Location</div>
                    <div class="setting-value"><?php echo htmlspecialchars($location); ?></div>
                </div>
                <div class="setting-box">
                    <div class="setting-label"><i class="fas fa-globe"></i> Preferred Language</div>
                    <div class="setting-value"><?php echo htmlspecialchars($language); ?></div>
                </div>
            </div>
        </section>

        <section class="panel">
            <h2 class="section-title">Notification Preferences</h2>
            <p class="section-subtitle">Manage how your business receives service updates, document requests, and billing alerts.</p>

            <div class="preference-group">
                <h4>Communication Channels</h4>
                <label class="pref-item">
                    <input type="checkbox" checked data-default-checked="true">
                    <span>
                        <span class="title"><i class="fas fa-envelope"></i> Email Notifications</span>
                        <span class="desc">Receive updates for service milestones, required documents, invoices, and account activities.</span>
                    </span>
                </label>
                <label class="pref-item">
                    <input type="checkbox" checked data-default-checked="true">
                    <span>
                        <span class="title"><i class="fas fa-comment-dots"></i> SMS Notifications</span>
                        <span class="desc">Get urgent alerts for payment reminders, compliance deadlines, and support escalations.</span>
                    </span>
                </label>
                <label class="pref-item">
                    <input type="checkbox" checked data-default-checked="true">
                    <span>
                        <span class="title"><i class="fab fa-whatsapp"></i> WhatsApp Notifications</span>
                        <span class="desc">Receive quick WhatsApp messages for urgent approvals, reminders, and status changes.</span>
                    </span>
                </label>
                <label class="pref-item">
                    <input type="checkbox" checked data-default-checked="true">
                    <span>
                        <span class="title"><i class="fas fa-bell"></i> Push Notifications</span>
                        <span class="desc">Get real-time notifications on your client portal dashboard.</span>
                    </span>
                </label>
            </div>

            <div class="preference-group">
                <h4>Notification Frequency</h4>
                <label class="pref-item">
                    <input type="checkbox" checked data-default-checked="true">
                    <span>
                        <span class="title"><i class="fas fa-calendar-day"></i> Daily Summary</span>
                        <span class="desc">Daily summary of open tasks, completed services, and billing highlights.</span>
                    </span>
                </label>
                <label class="pref-item">
                    <input type="checkbox" data-default-checked="false">
                    <span>
                        <span class="title"><i class="fas fa-chart-line"></i> Weekly Service Report</span>
                        <span class="desc">Weekly recap of active services, deliverables, and pending action items.</span>
                    </span>
                </label>
                <label class="pref-item">
                    <input type="checkbox" checked data-default-checked="true">
                    <span>
                        <span class="title"><i class="fas fa-file-invoice"></i> Invoice Due Alerts</span>
                        <span class="desc">Reminder notifications before invoice due date with payment options.</span>
                    </span>
                </label>
            </div>

            <div class="preference-group">
                <h4>Display Options</h4>
                <label class="pref-item">
                    <input type="radio" name="displayTheme" value="light" checked data-default-checked="true">
                    <span>
                        <span class="title"><i class="fas fa-sun"></i> Light Mode</span>
                        <span class="desc">Use the standard bright interface for daytime work and readability.</span>
                    </span>
                </label>
                <label class="pref-item">
                    <input type="radio" name="displayTheme" value="dark" data-default-checked="false">
                    <span>
                        <span class="title"><i class="fas fa-moon"></i> Dark Mode</span>
                        <span class="desc">Use a darker interface that is easier on the eyes in low-light environments.</span>
                    </span>
                </label>
            </div>

            <div class="actions">
                <button type="button" class="btn btn-primary" id="saveSettingsBtn">Save Settings</button>
                <button type="button" class="btn btn-secondary" id="resetSettingsBtn">Reset</button>
            </div>
        </section>

        <section class="panel">
            <h2 class="section-title"><i class="fas fa-info-circle"></i> Account Information</h2>
            <div class="account-grid">
                <div class="account-item">
                    <div class="k">Last Login</div>
                    <div class="v"><?php echo htmlspecialchars($lastLogin); ?></div>
                </div>
                <div class="account-item">
                    <div class="k">Account Status</div>
                    <div class="v"><span class="status-dot"><?php echo htmlspecialchars($status); ?></span></div>
                </div>
                <div class="account-item">
                    <div class="k">Client ID</div>
                    <div class="v"><?php echo htmlspecialchars($clientId); ?></div>
                </div>
                <div class="account-item">
                    <div class="k">Billing Cycle</div>
                    <div class="v"><?php echo htmlspecialchars($billingCycle); ?></div>
                </div>
                <div class="account-item">
                    <div class="k">Time Zone</div>
                    <div class="v"><?php echo htmlspecialchars($timeZone); ?></div>
                </div>
                <div class="account-item">
                    <div class="k">Preferred Language</div>
                    <div class="v"><?php echo htmlspecialchars($language); ?></div>
                </div>
            </div>
            <p class="account-note"><i class="fas fa-lock"></i> Account Security: Legal and billing identity details are protected. Contact support for verified profile updates.</p>
        </section>

        <section class="panel logout-box">
            <button type="button" class="btn btn-logout" id="logoutBtn">Logout</button>
        </section>
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

    <div id="contactEditModal" class="modal" aria-hidden="true">
        <div class="modal-content">
            <button class="modal-close" id="contactEditClose" aria-label="Close">&times;</button>
            <h3 id="contactEditTitle">Edit Value</h3>
            <div class="edit-form-wrap">
                <label id="contactEditLabel" for="contactEditInput">New Value</label>
                <input type="text" id="contactEditInput">
            </div>
            <div class="modal-actions">
                <button type="button" class="primary" id="contactEditConfirm">Confirm</button>
                <button type="button" class="secondary" id="contactEditCancel">Cancel</button>
            </div>
        </div>
    </div>

    <div id="otpModal" class="modal" aria-hidden="true">
        <div class="modal-content">
            <button class="modal-close" id="otpClose" aria-label="Close">&times;</button>
            <h3>Enter OTP</h3>
            <div class="edit-form-wrap">
                <label for="otpInput">Enter OTP</label>
                <input type="text" id="otpInput" inputmode="numeric" maxlength="6" placeholder="6-digit OTP">
            </div>
            <p class="otp-meta" id="otpMetaText">Enter the OTP sent to your registered contact.</p>
            <p class="otp-timer-wrap">Time left: <span class="timer" id="otpTimer">02:00</span></p>
            <div class="modal-actions">
                <button type="button" class="secondary" id="otpEditBtn">Edit Number</button>
                <button type="button" class="primary" id="otpResendBtn">Resend OTP</button>
                <button type="button" class="secondary" id="otpCancelBtn">Cancel</button>
            </div>
        </div>
    </div>

    <script src="../client-js/client-profile-settings.js"></script>
    <script src="../client-js/dark-mode.js"></script>
</body>

</html>





