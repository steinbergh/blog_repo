<!DOCTYPE html>

<html>
<head>
<link rel="stylesheet" type="text/css" href="index.css">
<title>Hot List!</title>
</head>
<body>
<div id="container">
  	<header id="main">Hot List!</header>
	<?php 
	$connection = mysql_connect('23.92.19.55', 'root', '');
	mysql_select_db('henry_blog');

	  if (!$connection) {	
      die('Unable to connect: ' . mysql_errno());
      }

      if ($connection) {
      $result = mysql_query('SELECT title, author, body, id FROM articles ORDER BY id DESC');
	  }

	  while ($article = mysql_fetch_array($result)) {
		  print '<div>';
    	  print '<h2><a href="article.php?id=' . $article['id'] . '">' . $article['title'] . '</a></h2>';
   		  print '<p class="byline">by, ' . $article['author'] . '</p>';
    	  print '<p>' . $article['body'] . '</p>';
		  print '</div>';
      }


	  mysql_close($connection);
      ?>
</div>
  </body>
</html>
