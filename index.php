<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="stylesheets/screen.css">
  <script src="scripts/jquery-1.11.1.min.js"></script>
  <script src="scripts/blog.js"></script>
  <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
  <title>Hot List!</title>
</head>

<body>
    <!--START HEADER-->
  	<header id="main">
      <h1>Hot List!</h1>
      <nav class="menu">
        <?php 
        $menu = array(
          'HOME'=>'index.php'; 
          // "AUTHOR'S INDEX"=>'authind');
          foreach ($menu as $tab => $link) {
          echo '<a class="tab" href="'. $link .'"><span>' . $tab . '</span></a>';
        }
        ?>
      </nav>
    </header>
    <!--END HEADER-->

    <!--START MAIN CONTENT-->
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
      $result = mysql_query('SELECT title, author, body, id FROM articles ORDER BY id DESC');
	  }

	  while ($article = mysql_fetch_array($result)) {
		    print '<article>';
    	  print '<h2><a href="article.php?id=' . $article['id'] . '">' . $article['title'] . '</a></h2>';
   		  print '<p class="byline">by, <strong>' . $article['author'] . '</strong></p>';
    	  print '<p class="body">' . $article['body'] . '</p>';
		    print '</article>';
      }

	  mysql_close($connection);
      ?> 

      </div>
    <!--END MAIN CONTENT-->

      <footer>
      </footer>
    </div>
  </body>
</html>
