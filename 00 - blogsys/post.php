<?php
//initialize db connection, hmu with that getPost function
include("./db.php");
DB::connect();

//heres the magic function
function getPost($id) {
    $sql = 'SELECT id, title, postbody FROM blog_post WHERE id = ' . $id;
    return DB::$connection->query($sql);
}
?>

<head><link rel="stylesheet" href="styles.css"></head>

<div class='column-left'>
test
</div>


<?php foreach(getPost($_GET['id']) as $post): ?>
    <div class="test">
    <div class="titlerice">
    <b><a href="/blogsys/post.php?id=<?= $post['id']; ?>">
    <?= $post['title']; ?>
    </a></br></b></div>
    <?= $post['postbody']?>
   <br/></div>
    <?php endforeach; ?>

<div class="goBackButton">
<a href="/blogsys/index.php"><- Let's go back!</a>
</div>