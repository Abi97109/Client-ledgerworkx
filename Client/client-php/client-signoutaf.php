<?php
$signedOutAt = date('F j, Y g:i A');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LedgerWorx - Signed Out</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../client-css/client-signoutaf.css">
    <link rel="stylesheet" href="../client-css/client-breadcrumb.css?v=<?php echo filemtime(__DIR__ . '/../client-css/client-breadcrumb.css'); ?>">
</head>

<body>
    <div class="top-brand">
        <a href="client-dashboard.php" aria-label="Login Again"><img src="../client-assets/logo.png" alt="Ledger Workx logo" class="logo-img"></a>
    </div>

    <main class="wrap">
        <nav class="breadcrumb portal-breadcrumb" aria-label="Breadcrumb"><a href="client-dashboard.php">Dashboard</a><span class="crumb-sep">/</span><span class="current">Sign Out</span></nav>
        <section class="logout-card">
            <div class="icon"><i class="fas fa-right-from-bracket"></i></div>
            <h1>You Are Signed Out</h1>
            <p class="sub">Your session has been ended successfully. For security, close the browser if you are on a shared device.</p>
            <p class="meta"><i class="fas fa-clock"></i> Signed out on <?php echo htmlspecialchars($signedOutAt); ?></p>
            <div class="actions">
                <a href="client-dashboard.php" class="btn btn-primary"><i class="fas fa-right-to-bracket"></i> Login Again</a>
                <a href="client-support.php" class="btn btn-secondary"><i class="fas fa-headset"></i> Contact Support</a>
            </div>
        </section>
    </main>
</body>

</html>


