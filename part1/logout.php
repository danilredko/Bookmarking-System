
<!DOCTYPE html>
<html>
<body>

<?php
session_start();

session_destroy();
header('Location: bookmarks.php');

?>

</body>
</html>
