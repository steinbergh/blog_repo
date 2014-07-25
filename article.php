<html>
<head>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<div id="container">
	<header id="main">Hot List!</header>
	<?php 
	$connection = mysql_connect('127.0.0.1', 'root', '');
	mysql_select_db('henry_blog');

	if (!$connection) {	
    die('Unable to connect: ' . mysql_errno());
    }

    if ($connection) {
    $ID = $_GET['id'];
    $result = mysql_query("SELECT * FROM articles WHERE id = ' " . $ID . " ' ");
    }

    $article = mysql_fetch_array($result);
    	print '<article>';
    	print '<h2><a href="article.php?id=' . $article['id'] . '">' . $article['title'] . '</a></h2>';
   		print '<p class="byline">by, ' . $article['author'] . '</p>';
    	print '<p>' . $article['body'] . '</p>';
		print '</article>';

	mysql_close($connection);
	?>
	<a href="http://henry_blog/index.php"><div class="button">back</div></a>
</div>
</body>
</html>