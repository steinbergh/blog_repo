<?php
try {
    $connection = new PDO('mysql:host=127.0.0.1;port=3306;dbname=henry_blog', 'root', '');
    //print "success";
} catch (PDOException $e) {
    print "Error!: "  . $e->getMessage() . "<br />";
    die();
}
?>

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
    // $connection = mysql_connect('23.92.19.55', 'root', '');
    // mysql_select_db('henry_blog');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['title'] != "" && $_POST['author'] != "" && $_POST['body'] != "") {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $body = $_POST['body'];
        $sql = 'INSERT INTO articles VALUES(:title, :author, :body)';
        $stmt = $connection->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $result = $stmt->execute(array(':title' => $title, ':author' => $author, ':body' => $body));
        if ($result) {
            $host = $_SERVER['HTTP_HOST'];
            $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'index.php';
            header("Location: http://$host$uri/$extra");
        } else {
?>
            <p class="error">Error creating article</p>
<?php
        }
    } else {
?>
            <p class="error">Please fill in all form inputs!!</p>

<?php
    }
?>

<?php

} else {
?>

<div class="form_area">
    <form role="form" action="" method="post">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" name="author" id="author">
        </div>
        <textarea id="" name="body" cols="30" rows="10" class="form-control"></textarea>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>

<?php
}
?>
</div>
</body>
</html>