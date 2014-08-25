<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="stylesheets/screen.css">
  <script src="scripts/jquery-1.11.1.min.js"></script>
  <script src="scripts/blog.js"></script>

</head>
<body>
    <header id="main">
      <h1>Hot List!</h1>
    <nav class="menu">
      <?php 
      $menu = array(
        'HOME'=>'index.php', 
        'SUBMISSION'=>'add-article.php');
        // "AUTHOR'S INDEX"=>'authind');
        foreach ($menu as $tab => $link) {
        echo '<a class="tab" href="'. $link .'">' . $tab . '</a>';
      }
      ?>
    </nav>
    </header>
    <div id="content-wrap">

	<?php 
	$connection = mysql_connect('23.92.19.55', 'root', '');
	mysql_select_db('henry_blog');

  // $connection = mysql_connect('127.0.0.1', 'root', '');
  // mysql_select_db('henry_blog');

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
   		print '<p class="byline">by, <strong>' . $article['author'] . '</strong></p>';
    	print '<p class="body">' . $article['body'] . '</p>';
		print '</article>';

	mysql_close($connection);
	?>
</div>
      <div id="resize">
        <a href="#">
        <span class="small">A</span> 
        <span class="large">A</span>
        </a>
      </div>

</body>
</html>
