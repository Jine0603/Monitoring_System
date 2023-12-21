<!--**********************************
            Header start
        ***********************************-->
<?php
$currentDate = date("F j, Y");
?>

<style>
	.center-text {
		text-align: center;
		width: 100%;
		/* Optionally, you can set a width to center block-level elements */
	}
</style>
<div class="header">
	<div class="header-content">
		<nav class="navbar navbar-expand">
			<div class="collapse navbar-collapse justify-content-between">
				<div class="header-left">
				</div>
				<ul class="navbar-nav header-right main-notification">
					<li class="nav-item dropdown notification_dropdown">
						<a class="nav-link bell dz-fullscreen" href="#">
							<svg id="icon-full" viewbox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
								<path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3" style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path>
							</svg>
							<svg id="icon-minimize" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize">
								<path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3" style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path>
							</svg>
						</a>
					</li>
					<li class="nav-item dropdown header-profile">
						<a class="nav-link" href="#" role="button" data-toggle="dropdown">
							<img src="images/logo1.png" width="20" alt="">
							<div class="header-info">
								<span><?= strtoupper($_SESSION['username']) ?></span>
								<?php
								$emp_id = $_SESSION["id"];

								$prot = "SELECT * FROM accrole_tbl WHERE employeeid='$emp_id' AND status = 1";
								$exe = mysqli_query($conn, $prot);

								while ($h2w = mysqli_fetch_array($exe)) {

									// echo $h2w['usertype'];
									$condtiones = $h2w['usertype'];
									if ($condtiones == 1) {
										echo '<small>Super Admin</small>';
									} elseif ($condtiones == 2) {
										echo '<small>FMC Accounting</small>';
									} elseif ($condtiones == 3) {
										echo '<small>MSC Accounting</small>';
									} elseif ($condtiones == 4) {
										echo '<small>MBI Accounting</small>';
									} elseif ($condtiones == 5) {
										echo '<small>EverFirst Accounting</small>';
									} elseif ($condtiones == 6) {
										echo '<small>Employee</small>';
									}

									// END OF WHILE
								}
								?>
							</div>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<a href="profile.php" class="dropdown-item ai-icon">
								<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
									<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
									<circle cx="12" cy="7" r="4"></circle>
								</svg>
								<span class="ml-2">Profile </span>
							</a>
							<a href="email-inbox.html" class="dropdown-item ai-icon">
								<svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
									<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
									<polyline points="22,6 12,13 2,6"></polyline>
								</svg>
								<span class="ml-2">Inbox </span>
							</a>
							<a href="logout.php" class="dropdown-item ai-icon">
								<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
									<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
									<polyline points="16 17 21 12 16 7"></polyline>
									<line x1="21" y1="12" x2="9" y2="12"></line>
								</svg>
								<span class="ml-2">Logout </span>
							</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>
		<div class="sub-header">
			<div class="d-flex align-items-center flex-wrap mr-auto center-text">
				<h5 class="dashboard_bar">FIXED ASSET MONITORING SYSTEM WITH BARCODING</h5>
			</div>
			<div class="d-flex align-items-center">
				<a href="javascript:void(0);" class="btn btn-xs btn-primary light mr-1"><?php echo $currentDate; ?></a>
			</div>
		</div>
	</div>
</div>
<!--**********************************
            Header end ti-comment-alt
        ***********************************-->