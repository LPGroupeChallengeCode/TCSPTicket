<?php
?> 
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
<?php
//si on est sur une page autre que l'index
if($_SESSION['page'] == true){
	?>
	<img class="navbar-brand" src="../assets/logo50.png">
	<a class="navbar-brand" href="../index.php">Billetterie TCSP</a>
	</div>
    <!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	
		<ul class="nav navbar-nav">
			<li>
				<a href="boutique.php" style="color: #4e9724">Tickets</a>
			</li>
			<li>
				<a href="lignesEtHoraires.php" style="color: #ea9600">Se déplacer</a>
			</li>
			<li>
				<a href="../index.php#contact" style="color: #e26700">Contact</a>
			</li>
			<?php
			if(empty($_SESSION['session']))
			{ 
				?>
				<li>
					<a href="../index.php#h" style="color: #1970bf">Mon Espace</a>
				</li>
				<?php
			}
			else
			{
				?>
				<li>
					<a href="profile.php" style="color: #1970bf">Mon Espace</a>
				</li>
				<li>
					<input type="button" id="logout" class="btn btn-danger navbar-btn" value="Sign Out" style="margin-top: 10%"/>

					<script>
						$(document).ready(function(){
							$("#logout").click(function (){
								window.location.href = "../include/logout.php"
							});
						});
					</script>
				</li>	
			<?php
			}
			?>
		</ul>
	<?php
}
else
{
	?>
	<img class="navbar-brand" src="assets/logo50.png">
	<a class="navbar-brand" href="#">Billetterie TCSP</a>
	</div>
    <!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	
		<ul class="nav navbar-nav">
			<li>
			<a href="pages/boutique.php" style="color: #4e9724">Tickets</a>
			</li>
			<li>
				<a href="pages/lignesEtHoraires.php" style="color: #ea9600">Se déplacer</a>
			</li>
			<li>
				<a href="#contact" style="color: #e26700">Contact</a>
			</li>
			<?php
			if(empty($_SESSION['session']))
			{ 
				?>
				<li>
					<a href="#h" style="color: #1970bf">Mon Espace</a>
				</li>
				<?php
			}
			else
			{
				?>
				<li>
					<a href="pages/profile.php" style="color: #1970bf">Mon Espace</a>
				</li>
				<li>
					<input type="button" id="logout" class="btn btn-danger navbar-btn" value="Sign Out" style="margin-top: 10%"/>

					<script>
						$(document).ready(function(){
							$("#logout").click(function (){
								window.location.href = "include/logout.php"
							});
						});
					</script>
				</li>	
			<?php
			}
			?>
		</ul>
	<?php
}
?>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav> 
<?php ?>