<?php include('header.php') ?>
		<!--MAIN CONTENT-->
		<main class="inscription">
		    <h2>Inscription</h2>
		    <form action="inscription_request.php" method="post">
		        <fieldset>
		            <legend>Informations</legend>
		            <label for="author_login">Login</label>
		            <input type="text" name="author_login"/>
		            <label for="author_mdp">Password</label>
		            <input type="password" name="author_mdp">
		            <label for="firstname">First name</label>
		            <input type="text" name="firstname" id="firstname">
					<label for="lastname">Last Name</label>
					<input type="text" name="lastname" id="lastname">
    		        <button type="submit">Add</button>
		        </fieldset>
		    </form>
		    
		</main>
<?php include('footer.php') ?>
