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

	<br>
	<u>New Post</u>
	<?php echo validation_errors(); ?>
	<?php echo form_open('home'); ?>
		<input type="text" name="title" placeholder="Title" value="<?php echo set_value('title'); ?>"><br>
		<textarea name="text" placeholder="Text"><?php echo set_value('text'); ?></textarea><br>
		<input type="submit" value="Post!">
	</form>
	<hr>
	<br><br>
	<u>My Posts</u>

	<?php foreach($posts as $row) { ?>
	<a href="<?php echo site_url("home/full/$row->id"); ?>"><p><b><?php echo $row->title; ?></b></p></a>
	<p><?php echo $row->text; ?></p>
	<?php } ?>
	<br><br>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. </p>
</body>
</html>