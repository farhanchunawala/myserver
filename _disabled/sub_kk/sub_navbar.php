<nav class="navbar bg-dark navbar-dark fixed-top">
	
	<a href="<?php echo "$navlink"; ?>"><h2 class="navbar-brand mb-1"><b><?php echo "$navtitle"; ?></b></h2></a>
	
	<?php if ($navtitle=='Customer List' || $navtitle=='New') { ?>
	<form class="form-inline" method="post"  action="customerlist.php?svr_mode=<?php echo $svr_mode; ?>&srh=1">
		<input class="form-control mr-sm-2" type="text" placeholder="Search" name="search">
		<button class="btn btn-success" type="submit">Search</button>
	</form>
	<?php } ?>
	
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>
	
	<div class="collapse navbar-collapse" id="collapsibleNavbar">
	<ul class="navbar-nav">
		
		<li class="nav-item">
			<a class="nav-link" href="customerlist.php?svr_mode=<?php echo $svr_mode; ?>&srh=0"><b>Customer List</b></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="entrybook.php?svr_mode=<?php echo $svr_mode; ?>&sv=0"><b>Entry Book</b></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="garbop.php?svr_mode=<?php echo $svr_mode; ?>&garb_op=cutting&garbcount=0&sv=0"><b>Cutting</b></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="garbop.php?svr_mode=<?php echo $svr_mode; ?>&garb_op=sewing&garbcount=0&sv=0"><b>Sewing</b></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="garbop.php?svr_mode=<?php echo $svr_mode; ?>&garb_op=kaj&garbcount=0&sv=0"><b>Kaj</b></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="garbop.php?svr_mode=<?php echo $svr_mode; ?>&garb_op=button&garbcount=0&sv=0"><b>Button</b></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="garbop.php?svr_mode=<?php echo $svr_mode; ?>&garb_op=press&garbcount=0&sv=0"><b>Press</b></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="garbop.php?svr_mode=<?php echo $svr_mode; ?>&garb_op=packing&garbcount=0&sv=0"><b>Packing</b></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="garbop.php?svr_mode=<?php echo $svr_mode; ?>&garb_op=delivery&garbcount=0&sv=0"><b>Delivery</b></a>
		</li>
		
	</ul>
	</div>
	
</nav>