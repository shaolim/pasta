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

	#nav ul li .active {
   		border-bottom:3px #FFF solid;
   	}
   	p .max {
   		width:100%;
   	}
	</style>
</head>
<body style="background-color:#dfdfdf;">
	<nav class="navbar navbar-default" style="background-color:#6fc6d6;">
	  	<div class="container-fluid">
	    	<div class="navbar-header">
	    		<a class="navbar-brand" href="<?= base_url() ?>index.php">Pasta!</a>
	    	</div>
	    	<div>
	      		<ul class="nav navbar-nav">
	        		<li class="active"><a href="<?= base_url() ?>index.php">Home</a></li>
	        		<li><a href="<?= base_url() ?>index.php/paste/history">History</a></li>
	      		</ul>
	      		<ul class="nav navbar-nav" style="float:right;">
	      			<li><a href="#page1" id="about">About</a></li>
	      			<li><a href="#page2" id="contact">Contact Us</a></li>
	      		</ul>
	    	</div>
	 	</div>
	</nav>
	
	<div id="container" style="background-color:white;">
	<div id="pageContent1" style="clear:both;"></div>
	<div id="pageContent2"></div>
	<div style="padding-top: 10px;">
		<p style="float:left; color:#0000ff;">Type & get your paste now!</p>
		<select style="float:right; padding-right:10px;" name="type">
			<option value="Plain Text">Plain Text</option>
			<option value="HTML5">HTML5</option>
			<option value="CSS">CSS</option>
			<option value="JS">JS</option>
			<option value="PHP">PHP</option>			
		</select>
	</div>
	<div style="clear: both;">
		<pre class="highlight"><p class="max" id="paste" style="padding-left:10px; padding-right:10px; border:1px;" name="data"><?php foreach($content as $row) {echo $row->data;}?></p></pre>	
		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
	</div>

<script>
	$(document).ready(function(){	//executed after the page has loaded

		$("#about").click(function(){
		        $("#pageContent1").fadeIn();
		    });
		$("#contact").click(function(){
		        $("#pageContent2").fadeIn();
		    });
		checkURL();	//check if the URL has a reference to a page and load it

		$('a').click(function (e){	//traverse through all our navigation links..

			checkURL(this.hash);	//.. and assign them a new onclick event, using their own hash as a parameter (#page1 for example)

		});

		setInterval("checkURL()",250);	//check for a change in the URL every 250 ms to detect if the history buttons have been used

	});

	var lasturl="";	//here we store the current URL hash
	function checkURL(hash)
	{
		if(!hash) hash=window.location.hash;	//if no parameter is provided, use the hash value from the current address

		if(hash != lasturl)	// if the hash value has changed
		{
			lasturl=hash;	//update the current hash
			loadPage(hash);	// and load the new page
		}
	}

	function loadPage(url)	//the function that loads pages via AJAX
	{
		url=url.replace('#page','');	//strip the #page part of the hash and leave only the page number

		

		$.ajax({	//create an ajax request to load_page.php
			type: "POST",
			url: "<?= base_url() ?>/application/views/load_file.php",
			data: 'page='+url,	//with the page number as a parameter
			dataType: "html",	//expect html to be returned
			success: function(msg){
				if(parseInt(msg)!=0)	//if no errors
				{
					$('#pageContent'+url).html(msg);	//load the returned html into pageContet
					
				}
			}

		});

	}
</script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="http://balupton.github.com/jquery-syntaxhighlighter/scripts/jquery.syntaxhighlighter.min.js"></script>
<script type="text/javascript">$.SyntaxHighlighter.init();</script>
</body>
</html>