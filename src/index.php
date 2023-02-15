
<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h1>test29_API01_PHP</h1>
<div class="menu">
<?php
$pages = [
    'create.php',
    'getAll.php',
];

foreach ($pages as $page) {
    echo "<a href='$page'>$page</a> | ";
}

?>
    </div>
</body>
</html>
