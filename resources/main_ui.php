<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>QUERA</title>
<link rel="stylesheet" href="../public/css/main.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>