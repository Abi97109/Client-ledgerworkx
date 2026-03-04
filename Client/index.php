<?php
// Root entry point: forward to the client dashboard page.
header('Location: client-php/client-dashboard.php');
exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="0;url=client-php/client-dashboard.php">
    <title>Redirecting...</title>
</head>
<body>
    <p>Redirecting to dashboard. <a href="client-php/client-dashboard.php">Continue</a>.</p>
</body>
</html>
