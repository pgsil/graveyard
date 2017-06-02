<html>
<head>
<link rel="stylesheet" href="styles.css">
</head>

<?php
$jsonurl = "http://a.4cdn.org/gd/catalog.json";
$json = file_get_contents($jsonurl);
$json_output = json_decode($json);
?>
<?php 
foreach ($json_output as $page) {
    foreach($page->threads as $thread) {
        if (isset($thread->sub)) {
            $title = $thread->sub;
            if(!empty($thread->com)){
            $post  = $thread->com;
            }
            else{
            $post = "no text";
            }
            $img = $thread->tim;

            echo $title . ', post message: <br/>' . $post . '<br /><br />';
        }
    }
}
?>
</html>