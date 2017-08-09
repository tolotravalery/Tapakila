
<nav  id="background" class="navbar navbar-default navbar-static-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				<img src="./img/logo.png" title="tapakila">
			</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">

				<li><button type="" class="btn btn-success event"><span class="ico"></span><span class="descr">AJOUTER<br/> VOTRE EVENEMENT</span></button></li>
				<li><a href="#">Panier</a></li>
				<li role="presentation" class="dropdown">
					<a href="#" class="dropdown-toggle" id="drop6" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Rechercher
						<span class="caret"></span> </a>
					<ul class="dropdown-menu search" id="menu3" aria-labelledby="drop6">
						<li>
							<form action="./page/recherche.html" method="get">
								<input type="text" name="query" placeholder="Search..." autocomplete="off">
								<input type="submit" value="Search">
							</form>
						</li>
					</ul>
				</li>
				<li role="presentation" class="dropdown connexion" >

					<a href="#" class="dropdown-toggle" id="drop7"> Connexion
						<span class="caret"></span> </li>
			</ul>
		</div>
	</div>
</nav>
