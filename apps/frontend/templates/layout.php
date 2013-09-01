<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <link rel="shortcut icon" href="/favicon.ico" />

  <meta http-equiv="content-type" content="text/html; charset=utf-8" />

  <title>Shipment Tracker</title>

  <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css' />

  <link href='http://fonts.googleapis.com/css?family=Marvel' rel='stylesheet' type='text/css' />

  <link href='http://fonts.googleapis.com/css?family=Marvel|Delius+Unicase' rel='stylesheet' type='text/css' />

  <link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css' />

  <?php use_stylesheet('simple.css') ?>
  <?php include_javascripts() ?>
  <?php include_stylesheets() ?>
</head>

<body>

<div id="wrapper">

	<div id="wrapper2">

		<div id="header" class="container">

			<div id="logo">

				<h1><a href="#">Shipment <span>Tracker</span></a></h1>

			</div>

			<div id="menu">

				<ul>

					<li><?php echo link_to('Profile', 'user/index') ?></li>

					<li><?php echo link_to('Shipping Transaction', 'shipping_transaction/index') ?></li>

					<li><?php echo link_to('Shipping Transaction Details', 'shipping_transaction_detail/index') ?></li>

					<li><?php if($sf_user->isAuthenticated()) echo link_to('Logout', 'sfGuardAuth/signout') ?></li>
				</ul>

			</div>

		</div>

		<!-- end #header -->

		<div id="page">

			<div id="content">
				<div class="post">
                            
                                        <?php echo $sf_content ?>
                                        <?php 
                                        /*
					<h2 class="title"><a href="#">Consecteteur hendrerit </a></h2>

					<p class="meta"><span class="date">January 20, 2012</span><span class="posted">Posted by <a href="#">Someone</a></span></p>

					<div style="clear: both;">&nbsp;</div>

					<div class="entry">

						<p>Sed lacus. Donec lectus. Nullam pretium nibh ut turpis. Nam bibendum. In nulla tortor, elementum vel, tempor at, varius non, purus. Mauris vitae nisl nec metus placerat consectetuer. Donec ipsum. Proin imperdiet est. Phasellus <a href="#">dapibus semper urna</a>. Pellentesque ornare, orci in consectetuer hendrerit, urna elit eleifend nunc, ut consectetuer nisl felis ac diam. Etiam non felis. Donec ut ante. In id eros. Suspendisse lacus turpis, cursus egestas at sem.  Mauris quam enim, molestie in, rhoncus.</p>

						<p class="links"><a href="#" class="more">Read More</a><a href="#" title="b0x" class="comments">Comments</a></p>

					</div
                                       */
                                       ?>
				</div>

				<div style="clear: both;">&nbsp;</div>

			</div>

			<!-- end #content -->

			<div id="sidebar">

				<ul>

					<li>

						<div id="search" >

							<form method="get" action="<?=url_for('shipping_transaction/search')?>">

								<div>

									<input type="text" name="barcode" id="search-text" value="" />

									<input type="submit" id="search-submit" value="GO" />

								</div>

							</form>

						</div>

						<div style="clear: both;">&nbsp;</div>

					</li>

					<li>

						<h2>Navigation</h2>

						<ul>

					            <li><?php echo link_to('Profile', 'user/index') ?></li>

					            <li><?php echo link_to('Shipping Transaction', 'shipping_transaction/index') ?></li>

					            <li><?php echo link_to('Shipping Transaction Details', 'shipping_transaction_detail/index') ?></li>

					            <li><?php if($sf_user->isAuthenticated()) echo link_to('Logout', 'sfGuardAuth/signout'); ?></li>
						</ul>

					</li>

				</ul>

			</div>

			<!-- end #sidebar -->

			<div style="clear: both;">&nbsp;</div>

		</div>

		<!-- end #page -->

		<div id="footer">

			<p>Copyright (c) 2012 Supraliminal Solutions LLC. All rights reserved.</p>

		</div>

	</div>

</div>

<!-- end #footer -->

</body>
</html>
