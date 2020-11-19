<?php include('header.php') ?>
		<!--MAIN CONTENT-->
		<main class="admin">
		    <section class="parameter_menu">
		        <h3>Menus</h3>
		        <ul>
    		        <li><a href="admin_request.php?parameter=articles">Articles</a></li>
    		        <li><a href="admin_request.php?parameter=comments">Comments</a></li>
    		        <li><a href="admin_request.php?parameter=parameter">Parameters</a></li>
    		        <li><a href="disconnect.php">Disconnect</a></li>
		        </ul>
		    </section>
		    <section class="admin_main">
			<?php
			    
			    if($get == 'articles') {
			        echo '<h2>Moderation of the Articles</h2>
			        <p class="link_new"><a href="main.php">Write a new article</a></p><table>
			                <thead>
			                    <th>Title</th>
			                    <th>Content</th>
			                    <th>Author</th>
			                    <th>Publication</th>
			                    <th></th>';
			                    if($_SESSION['admin_lvl'] == 2) {echo '<th></th>';}
			                echo '</thead>
			                <tbody>';
			                foreach($articles as $article) {
			                    echo '<tr><td><a href="article_see.php?articleid='. $article['id'] . '">' . htmlspecialchars($article['title']) . '</a></td>
			                        <td>' . htmlspecialchars(substr($article['content'], 0, 40)) . '<a href="article_see.php?articleid='. $article['id'] . '">[...]</a></td>
			                        <td>' . htmlspecialchars($article['firstname']) . ' ' . htmlspecialchars($article['lastname']) . '</td>
			                        <td>'. $article['publication_date'] . '</td>
			                        <td><a href="remove.php?article=' . $article['id'] . '"><button type="submit">x</button></a></td>';
			                        if($_SESSION['admin_lvl'] == 2) {echo '<td><a href="change.php?article=' . $article['id'] . '"><button type="submit">c</button></a></td>';}
			                };
			                
			                echo '</tbody></table>';
			    }
			    
			    if($get == 'comments') {
			        
			        echo '<h2>Moderation of the Comments</h2>
			        <table><thead>
			                <th>Content</th>
			                <th>Post date</th>
			                <th>Article</th>
			                <th><th>
			                <th><th></thead>
			                <tbody>';
			        
			        foreach($comments as $comment) {
    		                echo '<tr><td>' . htmlspecialchars(substr($comment['com_content'], 0, 50)) . '<a href="article_see.php?articleid='. $comment['id'] . '">[...]</a></td>
    		                <td>' . $comment['date_post'] . '</td>
    		                <td><a href="article_see.php?articleid='. $comment['id'] . '">' . htmlspecialchars($comment['title']) . '</a></td>
    		                <td><a href ="remove_comment.php?comment=' . $comment['com_id'] . '"><button id=delete"' . $comment['com_id'] .'type="submit">x</button></a></td></tr>';
    		            };
    		        
    		        echo '</tbody></table>';
			    }
			    
			    if($get == 'parameter'){
			        echo /*'<h2>parameters</h2>
        			<form action="add_au_cat.php?parameter=author" method="post">
        				<fieldset class="form_parameters">
        					<legend>Add an Author</legend>
        					<label for="firstname">First Name</label>
        					<input type="text" name="firstname" id="firstname">
        					<label for="lastname">Last Name</label>
        					<input type="text" name="lastname" id="lastname">
        					<button type="submit">Add</button>
        				</fieldset>
        			</form>*/
        			'<form action="#<!--add_au_cat.php?parameter=category-->" method="post">
        				<fieldset class="form_parameters">
        					<legend>Add a Category (not working yet)</legend>
        					<label for="category">Name</label>
        					<input type="text" name="category" id="category">
        					<label for="cat_color">Color</label>
        					<input type="color" id="cat_color" value="#ff0000" name=cat_color">
        					<button type="submit">Add</button>
        				</fieldset>
        			</form>
					';
			        
			    }
			?>
			</section>
		</main>
		<?php include('footer.php') ?>
