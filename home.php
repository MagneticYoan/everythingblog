<?php include('header.php') ?>
		<!--MAIN CONTENT-->
		<main>
		    <div class="form">
		    <section class="articles">
    		    <?php
    		        foreach($articles as $article) {
    		            echo '<article>
    		            <h3>' . htmlspecialchars($article['title']) . '</h3>
    		            <p>' . htmlspecialchars(substr($article['content'], 0, 200)) . ' <a href="article_see.php?articleid='. $article['id'] . '">[lire la suite]</a></p>
    		            <p>Written by '. htmlspecialchars($article['firstname']) . ' '. htmlspecialchars($article['lastname']) . '</p>'. '<p>' . $article['publication_date'] . '.</p>
    		            <p class="' . $article['name'] . '">'. $article['name']. '</p>
    		            </article>';
    		        }
    		    ?>
		    </section>
		    <section class="authors">
		        <article class="author_article">
		        <h2>Ours Authors</h2>
		        <?php
		            foreach($authors as $author) {
		                echo '<h4>'
		                . htmlspecialchars($author['firstname']) . ' '
		                . htmlspecialchars($author['lastname']) . ' </h4><p>'
		                . htmlspecialchars($author['biography']) . '</p>';
		            };
		        ?>
		        </article>
		    </section>
		    </div>
		</main>
<?php include('footer.php') ?>
