<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My Blog</title>
</head>
<body>
	<h1>Welcome to My Blog</h1>

	<?php foreach($content as $row){ ?>
	Title: <?php echo $row->title; ?>
	<br>
	Text: <?php echo $row->text; ?>
	<?php } ?>
	<br><br>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. </p>
</body>
</html>