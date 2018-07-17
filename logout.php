<?php
session_start();
?>
<!DOVTYPE html>
<html>
<body>
<?php
session_unset();
session_destroy();
header('location:http://localhost/trialproj/index.php');
?>
</body>
</html>