<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="index.css">
<title>Hot List!</title>
</head>
  <body>
   <div id="container">
  	<header id="main">
      Hot List!
    <ul class="menu">
      <?php 
      $menu = array(
        'HOME'=>'index.php', 
        'SUBMISSION'=>'submit',
        "AUTHOR'S INDEX"=>'authind');
        foreach ($menu as $tab => $link) {
        echo '<li class="tab"><a href="'. $link .'">' . $tab . '</a></li>';
      }
      ?>
    </ul>
    </header>
	   <?php    
	$connection = mysql_connect('23.92.19.55', 'root', '');
	mysql_select_db('henry_blog');

  //   $connection = mysql_connect('127.0.0.1', 'root', '');
  // mysql_select_db('henry_blog');

	  if (!$connection) {	
      die('Unable to connect: ' . mysql_errno());
      }

      if ($connection) {
      $result = mysql_query('SELECT title, author, body, id FROM articles ORDER BY id DESC');
	  }

	  while ($article = mysql_fetch_array($result)) {
		    print '<article>';
    	  print '<h1><a href="article.php?id=' . $article['id'] . '">' . $article['title'] . '</a></h1>';
   		  print '<p class="byline">by, ' . $article['author'] . '</p>';
    	  print '<p>' . $article['body'] . '</p>';
		    print '</article>';
      }

	  mysql_close($connection);
      ?>
      <footer>
        <hr/>
      </footer>
    </div>
  </body>
</html>
