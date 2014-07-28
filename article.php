<html>
<head>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<div id="container">
    <header id="main">
      Hot List!
    <nav class="menu">
      <?php 
      $menu = array(
        'HOME'=>'index.php', 
        'SUBMISSION'=>'submit',
        "AUTHOR'S INDEX"=>'authind');
        foreach ($menu as $tab => $link) {
        echo '<a class="tab" href="'. $link .'">' . $tab . '</a>';
      }
      ?>
    </nav>
    </header>
	<?php 
	$connection = mysql_connect('23.92.19.55', 'root', '');
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
    	print '<h1><a href="article.php?id=' . $article['id'] . '">' . $article['title'] . '</a></h1>';
   		print '<p class="byline">by, ' . $article['author'] . '</p>';
    	print '<p>' . $article['body'] . '</p>';
		print '</article>';

	mysql_close($connection);
	?>
</div>
</body>
</html>
