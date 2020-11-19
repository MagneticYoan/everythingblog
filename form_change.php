<?php include('header.php')?>
		<!--MAIN CONTENT-->
		<main class="new_article">
			<form action="modify_article.php?article_id=<?php echo $_GET['article']?>" method="post">
				<fieldset>
					<legend>New Article</legend>
					<label for="title">Title</label>
					<input type="text" id="title" name="title" value="<?php echo $defaultarticle['title'] ?>">
					<label for="content">Article</label>
					<textarea id="content" name="content"><?php echo $defaultarticle['content'] ?></textarea>
					<?php echo '<input type="hidden" name="author_id" value="' . $_SESSION['id'] .'">'; ?>
					</select>
					<label for="category_id">Category</label>
					<select id="category_id" name="category_id">
					<?php 
						foreach($categories as $category) {
							echo '<option value="'. $category['id'] .'"'; 
							if ($category['id'] == $defaultarticle['category_id']) {
									echo ' selected="selected"';
								}
							echo '>'. $category['name'] . '</option>';
						}
						
					?>
					</select>
					<button type="submit">Send</button>
				</fieldset>
			</form>
		</main>
		<!--FOOTER-->
		<?php include('footer.php') ?>
