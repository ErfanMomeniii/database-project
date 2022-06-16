<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>QUERA</title>
<link rel="stylesheet" href="../public/css/main.css">
<link rel="icon" type="image/x-icon" href="../public/images/apple-touch-icon.2-2887f2aad086.png">
<meta name="apple-mobile-web-app-title" content="Quera">
<meta name="application-name" content="Quera">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-config" content="/static/images/logo/favicon/browserconfig.2-0049c1f5e338.xml">
<meta name="theme-color" content="#09c">
</head>
<body>
<?php include 'header.php';?>
<?php
if(isset($_GET['data'])){
    echo '<hr>'.$_GET['data'];
}
?>
<?php include 'footer.php';?>
</body>
</html>