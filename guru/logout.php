
<?php

	error_reporting (E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
	session_start();
	session_destroy();
	echo "<meta http-equiv='refresh' content='0; url=../index.php'>";

?>