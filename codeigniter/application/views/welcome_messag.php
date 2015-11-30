<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<meta charset="utf-8">
	<title>Pasta!</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #333333;
		background-color: transparent;
		font-weight: normal;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		border-radius: 10px;
		padding-left: 60px;
		padding-right: 60px;
		margin-left: 80px;
		margin-right: 80px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}

	textarea {
		width: 100%;
		height: 380px;
	}
	.myButton {
		-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
		-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
		box-shadow:inset 0px 1px 0px 0px #ffffff;
		background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #f9f9f9), color-stop(1, #e9e9e9));
		background:-moz-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
		background:-webkit-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
		background:-o-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
		background:-ms-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
		background:linear-gradient(to bottom, #f9f9f9 5%, #e9e9e9 100%);
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f9f9f9', endColorstr='#e9e9e9',GradientType=0);
		background-color:#d9d9d9;
		-moz-border-radius:3px;
		-webkit-border-radius:3px;
		border-radius:3px;
		border:1px solid #cccccc;
		display:inline-block;
		cursor:pointer;
		color:#666666;
		font-family:Arial;
		font-size:15px;
		font-weight:bold;
		padding:6px 24px;
		text-decoration:none;
		text-shadow:0px 1px 0px #ffffff;
	}
	.myButton:hover {
		background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #e9e9e9), color-stop(1, #f9f9f9));
		background:-moz-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
		background:-webkit-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
		background:-o-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
		background:-ms-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
		background:linear-gradient(to bottom, #e9e9e9 5%, #f9f9f9 100%);
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#e9e9e9', endColorstr='#f9f9f9',GradientType=0);
		background-color:#e9e9e9;
	}
	.myButton:active {
		position:relative;
		top:1px;
	}

	</style>
</head>
<body style="background-color:#dfdfdf;">
	<nav class="navbar navbar-default"  style="background-color:#6fc6a6;">
	  	<div class="container-fluid">
	    	<div class="navbar-header">
	    		<a class="navbar-brand" href="/codeigniter/">Pasta!</a>
	    	</div>
	    	<div>
	      		<ul class="nav navbar-nav" style="float:left;">
	        		<li class="active"><a href="/codeigniter/">Home</a></li>
	        		<li><a href="#">History</a></li>
	      		</ul>
	      		<ul class="nav navbar-nav" style="float:right;">
	      			<li><a href="#">About</a></li>
	      			<li><a href="#">Contact Us</a></li>
	      		</ul>
	    	</div>
	 	</div>
	</nav>
	
<div id="container" style="background-color:white;">
	<div style="padding-top: 10px;">
		<p style="float:left; color:#0000ff;">Type & get your paste now!</p>
		<select style="float:right; padding-right:10px;" name="type">
			<option value="Plain Text">Plain Text</option>
			<option value="Plain Text">HTML5</option>
			<option value="Plain Text">CSS</option>
			<option value="Plain Text">JS</option>
			<option value="Plain Text">PHP</option>			
		</select>
	</div>
	<?php echo form_open('paste'); ?>
	<textarea id="paste" name="data" style="color:black;"></textarea><br>
	<input class="myButton" style="float:right;" type="submit" value="Add Paste"><br>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></>
</div>

</body>
</html>