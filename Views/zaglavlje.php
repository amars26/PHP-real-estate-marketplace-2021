<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body class="p-3 mb-2 bg-dark text-white">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		<li class="nav-item">
			<form method="GET">
				<input type="hidden" value="" name="pretraga">
				<a class="nav-link active" href="#" onclick="this.closest('form').submit();return false;">Početna</a>
			</form>
        </li>
		<?php
			$korisnik = new userController;
			if(isset($_SESSION['userCookie'])){
				include("prijavljen.php");
				if($korisnik->isAdmin($_SESSION['userCookie']))
					include("admin.php");
			} else include("neprijavljen.php");
		?>
		
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" name="pretraga" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
