<?php include('header.php') ?>
		<!--MAIN CONTENT-->
		<main class="inscription">
		    <h2>Connexion</h2>
		    <form action="connexion_request.php" method="post">
		        <fieldset>
		            <legend>Connexion Logins</legend>
		            <label for="author_login">Login</label>
		            <input type="text" name="author_login"/>
		            <label for="author_mdp">Password</label>
		            <input type="password" name="author_mdp">
    		        <button type="submit">Connexion</button>
		        </fieldset>
		    </form>
		    
		</main>
<?php include('footer.php') ?>
