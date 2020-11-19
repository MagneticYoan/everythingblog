<?php include('header.php')?>
		<!--MAIN CONTENT-->
		<main class="new_article">
			<form action="write_newarticle.php" method="post" enctype="multipart/form-data">
				<fieldset>
					<legend>New Article</legend>
					<label for="title">Title</label>
					<input type="text" id="title" name="title">
					<label for="content">Article</label>
					<textarea id="content" name="content" placeholder="Your article here ..." ></textarea>
					<?php
					echo '<input type="hidden" name="author_id" value="' . $_SESSION['id'] .'">'; ?>
					<label for="category_id">Category</label>
					<select id="category_id" name="category_id">
					<?php 
						foreach($categories as $category) {
							echo '<option value="'. $category['id'] .'">'. $category['name'] . '</option>';
						}
						
					?>
					</select>
					<label for="file">Image info</label>
					<input type="text" name="alt" id="alt">
					<input type="file" name="file">
					<button type="submit">Send</button>
				</fieldset>
			</form>
		</main>
<?php include('footer.php') ?>
