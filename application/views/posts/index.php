<h2> <?= $title ?> </h2><br/>

<?php 
foreach ($posts as $post) : 
	/*
	$postString = strip_tags($post['body']);
	if (strlen($postString) > 330) {

	    // truncate postString
	    $postStringCut = substr($postString, 0, 330);
	    $endPoint = strrpos($postStringCut, ' ');

	    //if the postString doesn't contain any space then it will cut without word basis.
	    $postString = $endPoint? substr($postStringCut, 0, $endPoint) : substr($postStringCut, 0);
	    $postString .= '...';
	}
	*/
	echo '<h4>'. $post['title'] .'</h4>
	<small class=\'post-date\'> Posted on:'. $post['created_at'] .'<span class="poster"<em>Posted by: '. $post['poster'] .'</em></span></small> <br/>';
	
	echo word_limiter($post['body'], 60); 	
	//echo $postString;
?>

	<br/>
	<p><a class="btn btn-info" href="<?php echo site_url('/posts/'. $post['slug']); ?>">Read More</a></p> <hr/>

<?php endforeach; ?>