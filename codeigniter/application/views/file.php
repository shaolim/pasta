<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
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
	</style>
</head>
<body style="background-color:#dfdfdf;">
	<nav class="navbar navbar-default" style="background-color:#6fc6a6;">
	  	<div class="container-fluid">
	    	<div class="navbar-header">
	    		<a class="navbar-brand" href="/codeigniter/">Pasta!</a>
	    	</div>
	    	<div>
	      		<ul class="nav navbar-nav">
	        		<li class="active"><a href="/codeigniter/">Home</a></li>
	        		<li><a href="#">Page 1</a></li>
	      		</ul>
	    	</div>
	 	</div>
	</nav>
	
	<div id="container" style="background-color:white;">
		<h1>Get your paste now!</h1>
		<p id="paste" style="padding-left:10px; padding-right:10px; border:1px;" name="data"><?php foreach($content as $row) {echo $row->data;}?></p>	
		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
	</div>

</body>
</html>