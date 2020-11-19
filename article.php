<?php include('header.php') ?>
		<!--MAIN CONTENT-->
		<main>
		    <div class="form">
		    <section class="this_article">
    		    <?php
    		            //show the article
    		            echo '<article>';
    		            if ($articles['image'] != null) {
    		            	echo '<img class="article_img" src="' . $image_url . '"';
    		            	if(htmlspecialchars($articles['image_alt']) != null) {
    		            		echo ' alt="' . htmlspecialchars($articles['image_alt']) . '"';
    		            	}
    		            	
    		            	echo '/>';
    		            };
    		            
    		           
    		            echo '<p class="' . htmlspecialchars($articles['name']) . '">'. htmlspecialchars($articles['name']). '</p>
    		            <h3>' . htmlspecialchars($articles['title']) . '</h3>
    		            <p>' . htmlspecialchars($articles['content']) . '</p>
    		            <p>Written by '. htmlspecialchars($articles['firstname']) . ' '. htmlspecialchars($articles['lastname']) . '</p>'. '<p>' . $articles['publication_date'] . '.</p>
    		            
    		            <div class="comment_section"><h4>Comments section</h4>'; 
    		            
    		            //show the comments
    		            if($comments == null){
    		            	echo '<p class="nocommenthere">No comments here yet. Post yours !</p>';	
    		            }
    		            
    		            else {
	    		            foreach($comments as $comment) {
	    		                echo '<div class="comment"><p><span class="nickname">' . htmlspecialchars($comment['firstname']). ' '. htmlspecialchars($comment['lastname']) . '</span> le ' . $comment['date_post'] . '</p>
	    		                <p>' . htmlspecialchars($comment['com_content']) . '</p>';
	    		                if(!empty($_SESSION)) { echo '<p>
	    		                	<a href="vote.php?vote=up&article='. $articles['id'] . '&comment=' . $comment['com_id'] . '">
	    		                	<button><i class="fa fa-thumbs-up"></i></button></a>
	    		                	<a href="vote.php?vote=down&article='. $articles['id'] . '&comment=' . $comment['com_id'] . '">
	    		                	<button><i class="fa fa-thumbs-down"></i></button></a>';}
	    		                echo $comment['totalvote'] .'</p></div>';
	    		            };
    		            
    		            }
    		            echo '</div></article>';?>
    		            
    		            <?php //show the form for putting on comments
    		            if(!empty($_SESSION)) { 
    		            
    		            echo '<article><form action="submit_comment.php" method="post">
							<fieldset>
								<legend>New Comment</legend>
								<input type="hidden" name="author_id" value="' . $_SESSION['id'] .'"> 
								<label for="com_content">Content</label>
								<textarea id="com_content" name="com_content" placeholder="Your comment here ..." ></textarea>
								<!--<input type="hidden" value="<?php echo $get; ?>" name="articleid">-->
								<input type="hidden" value="' . $get . '" name="article_id">
								<button type="submit">Send</button>
							</fieldset>
 						</article>';} ?>
		    </section>
		    <section class="authors">
		        <article class="author_article">
		        <h2>Plus d'articles ici</h2>
		        <?php
    		        foreach($seeotherarticles as $article) {
    		        	
    		            echo '<article>
    		            <h3><a href="article_see.php?articleid='. $article['id'] . '">' . htmlspecialchars($article['title']) . '</a></h3>
    		            <p>' . htmlspecialchars(substr($article['content'], 0, 100)) . '<a href="article_see.php?articleid='. $article['id'] . '">[...]</a></p>
    		            <p>Written by '. htmlspecialchars($article['firstname']) . ' '. htmlspecialchars($article['lastname']) . '</p>
    		            <p>' . $article['publication_date'] . '.</p>
    		            <p class="' . htmlspecialchars($article['name']) . '">'. htmlspecialchars($article['name']). '</p>
    		            </article>';
    		        	
    		        }
    		    ?>
    		    </article>
		    </section>
		    </div>
		</main>
<?php include('footer.php') ?>
