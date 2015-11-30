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
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
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
		border-top: 1px solid #D0D0D0;
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
	td {
		padding-left: 3px;
		padding-right: 3px;
	}

	#nav ul li .active {
   		border-bottom:3px #FFF solid;
   	}
	</style>
</head>
<!--<body>
 <div id="container">
  <h1>Countries</h1>
  <div id="body">
<?php
//foreach($results as $data) {
    //echo $data->ID . " - " . $data->filename . "<br>";
//}
?>
   <p><?//php echo $links; ?></p>
  </div>
  <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
 </div>
</body>-->

<body>
<body style="background-color:#dfdfdf;">
	<nav class="navbar navbar-default"  style="background-color:#6fc6a6;">
	  	<div class="container-fluid">
	    	<div class="navbar-header">
	    		<a class="navbar-brand" href="<?= base_url() ?>index.php">Pasta!</a>
	    	</div>
	    	<div>
	      		<ul class="nav navbar-nav" style="float:left;">
	        		<li><a href="<?= base_url() ?>index.php">Home</a></li>
	        		<li class="active"><a href="<?= base_url() ?>index.php/paste/history">History</a></li>
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
		<h1>History</h1>
		<div id="body">
			<?php foreach ($results	as $row){?>
						<a href="<?= base_url() ?>index.php/paste/code/<?= $row->filename ?>"> <p style="float:left;"><?= $row->data ?></a>
						<p style="text-align:right;">Created At: <?= $row->time_update ?></p>
			<?php }?>

			<!--table border="1">
				<thead>
					<tr>
						<th>Data</th>
						<th>Filename</th>
						<th>Language</th>
						<th>Update</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						//Kita akan melakukan looping sesuai dengan data yang dimiliki
						//$i = 1; //nantinya akan digunakan untuk pengisian Nomor
						foreach ($results as $row) {
					?>
					<tr>
						<td><?= $row->data ?></td> 
						<td><?= $row->filename ?></td>
						<td><?= $row->language ?></td>
						<td><?= $row->time_update ?></td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table-->
		</div>
		<p><?php echo $links; ?></p>
		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
	</div>

<script src="<?= base_url() ?>application/views/js/jquery.js"></script>
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
</body>

</html>

