<head>
<link rel="stylesheet" href="styles.css">
</head>


<div id='header'>
	/gd/ - Graphic Design
</div>

<div id='container'>

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
            $post = "";
            }
            $img = $thread->tim;

    	echo "<div class='thread'>";
    		echo "<div class='trd-fade'></div>";
				
			echo "<div class='trd-img'>";
				echo "<img src='http://t.4cdn.org/gd/" . $img . "s.jpg'>";
			echo "</div>";
			echo "<div class='trd-info'>X / Y / Z</div>";
			echo "<div class='trd-title'>";
				echo $title;
			echo "</div>";
            
			echo"<div class='trd-post'>";
				echo $post;
            
			echo "</div>";
echo "</div>";
        }
    }
}



?>

</div>