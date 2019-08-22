
<!DOCTYPE html>
<html>
<body>

<?php
session_start();

session_destroy();
header('Location: welcome_page.php');

?>

</body>
</html>
