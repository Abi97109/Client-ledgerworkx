<?php
$packageName = isset($_POST['package_name']) ? $_POST['package_name'] : 'Selected Package';
$packagePrice = isset($_POST['package_price']) ? $_POST['package_price'] : 'Amount will be confirmed';
$fullName = isset($_POST['full_name']) ? $_POST['full_name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$companyName = isset($_POST['company_name']) ? $_POST['company_name'] : '';
$notes = isset($_POST['notes']) ? $_POST['notes'] : '';
$plan = isset($_POST['plan']) ? $_POST['plan'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Payment Gateway</title>
    <link rel="stylesheet" href="../client-css/client-payment-gateway.css">
    <link rel="stylesheet" href="../client-css/client-breadcrumb.css?v=<?php echo filemtime(__DIR__ . '/../client-css/client-breadcrumb.css'); ?>">
</head>
<body>
    <main class="gateway">
        <nav class="breadcrumb portal-breadcrumb" aria-label="Breadcrumb"><a href="client-dashboard.php">Dashboard</a><span class="crumb-sep">/</span><a href="client-payments.php">Payments</a><span class="crumb-sep">/</span><span class="current">Payment Gateway</span></nav>
        <header class="gateway-head">
            <h1>Secure Payment Gateway</h1>
            <p>Your request has been captured. Review details and continue payment.</p>
        </header>
        <section class="gateway-body">
            <div class="row">
                <span class="label">Package</span>
                <div class="value"><?php echo htmlspecialchars($packageName); ?></div>
            </div>
            <div class="row">
                <span class="label">Full Name</span>
                <div class="value"><?php echo htmlspecialchars($fullName); ?></div>
            </div>
            <div class="row">
                <span class="label">Email</span>
                <div class="value"><?php echo htmlspecialchars($email); ?></div>
            </div>
            <div class="row">
                <span class="label">Phone</span>
                <div class="value"><?php echo htmlspecialchars($phone); ?></div>
            </div>
            <div class="row">
                <span class="label">Company</span>
                <div class="value"><?php echo htmlspecialchars($companyName); ?></div>
            </div>
            <div class="row">
                <span class="label">Notes</span>
                <div class="value"><?php echo nl2br(htmlspecialchars($notes)); ?></div>
            </div>
            <div class="paybar">
                <div>
                    <span class="label">Amount</span>
                    <div class="amount"><?php echo htmlspecialchars($packagePrice); ?></div>
                </div>
                <button class="pay-btn" type="button" onclick="alert('Payment gateway session started successfully.')">Pay Securely</button>
            </div>
        </section>
    </main>
</body>
</html>


