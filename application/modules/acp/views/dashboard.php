<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Votizer | Dashboard</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="<?php echo base_url(); ?>addons/acp/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>addons/acp/css/jquery.jqplot.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>addons/acp/js/script.js"></script>  
	<script src="<?php echo base_url(); ?>addons/acp/js/jquery.jqplot.min.js"></script>
	<script src="<?php echo base_url(); ?>addons/acp/js/acp.js"></script>
</head>

<body>
	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
	
				<li class="v-sep"><a href="<?php echo base_url(); ?>" class="round button dark ic-left-arrow image-left">Go to website</a></li>
				<li class="v-sep"><a href="#" class="round button dark menu-user image-left">Logged in as <strong>{$username}</strong></a></li>
			
				<li><a href="/acp/dashboard/logout" class="round button dark menu-logoff image-left">Log out</a></li>
				
			</ul> <!-- end nav -->

					
			<form action="#" method="POST" id="search-form" class="fr">
				<fieldset>
					<input type="text" id="search-keyword" class="round button dark ic-search image-right" placeholder="Search..." />
					<input type="hidden" value="SUBMIT" />
				</fieldset>
			</form>

		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="fl">
				<li><a href="<?php echo base_url(); ?>acp/dashboard" class="active-tab dashboard-tab">Dashboard</a></li>
			</ul> <!-- end tabs -->
						
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="side-menu fl">
				
				<h3>Navigation</h3>
				<ul>
				{foreach $navigation val}
					<li><a href="<?php echo base_url(); ?>{$val.link_url}">{$val.link_name}</a></li>
				{/foreach}
				</ul>
				
			</div> <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="half-size-column fl">
	
					<div class="content-module">
					
						<div class="content-module-heading cf">
						
							<h3 class="fl">Announcements</h3>
							<span class="fr expand-collapse-text">Click to collapse</span>
							<span class="fr expand-collapse-text initial-expand">Click to expand</span>
						
						</div> <!-- end content-module-heading -->
						
						
						<div class="content-module-main">
						{foreach $feeds val}
								<h2> {$val.title} </h2>
								<p>{$val.content}</p>
								<span class="radius2">{$val.date}</span>
							<div class="stripe-separator"><!-- --></div>
						{/foreach}
					
						</div> <!-- end content-module-main -->
					
					</div> <!-- end content-module -->
	
				</div>
				
				<div class="half-size-column fl">
					
					<div class="content-module">
					
						<div class="content-module-heading cf">
						
							<h3 class="fl">Details</h3>
							<span class="fr expand-collapse-text">Click to collapse</span>
							<span class="fr expand-collapse-text initial-expand" style="display: none; ">Click to expand</span>
						
						</div> <!-- end content-module-heading -->
						
						
						<div class="content-module-main">
													
							<h1>System Details</h1>
							<p>PHP Version: <?php echo phpversion(); ?></p>
							<p>CMS Version: 0.1.3 [Alpha]</p>
							<p>Loading Time: <?php echo $this->benchmark->elapsed_time('total_execution_time_start', 'total_execution_time_end'); ?></p>
							<p>Memory Usage: <?php echo round(memory_get_usage() / 1024); ?> KB</p>
							<?php
								if(!function_exists('apache_get_modules'))
								{
									echo '<div class="error-box round"> apache_get_modules is not enabled! </div>';
								}
								else
								{
									if(in_array('mod_rewrite', apache_get_modules()))
									{
										echo '<div class="confirmation-box round"> mod_rewrite is enabled! </div>';
									}
									else
									{
										echo '<div class="error-box round"> mod_rewrite is not enabled! </div>';
									}
								
									if(extension_loaded('openssl')) 
									{
										echo '<div class="confirmation-box round"> openssl is enabled! </div>';
									}
									else
									{
										echo '<div class="error-box round"> openssl is not enabled! </div>';
									}

								}
							?>
							<div class="warning-box round"> Remote updater is under development! </div>
							<div class="stripe-separator"><!-- --></div>
							
							<h1>User Activity</h1>
							<div>
								<img src="https://chart.googleapis.com/chart?chf=bg,s,FFFFFF&chxl=0:|{$graph.first_date}|{$graph.last_date}&chxp=0,12,87&chxr=1,0,{$graph.top}&chxs=1,676767,11.5,0,lt,676767&chxt=x,y&chs=450x190&cht=lc&chco=095a9d&chds=0,{$graph.top}&chd=t:{$graph.stack}&chdlp=l&chls=2&chma=5,5,5,5" />
							</div>
						</div> <!-- end content-module-main -->
					
					</div> <!-- end content-module -->
					
				</div>
		
			</div> <!-- end side-content -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->



    <!-- FOOTER -->
    <div id="footer">

        <p>&copy; Copyright 2015 <a href="http://votizer.com/">Votizer</a>. All rights reserved.</p>

    </div> <!-- end footer -->

</body>
</html>