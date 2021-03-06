<?php
	include("_connection.php");
	
	
?>
<html>
	<head>
		  <!-- Include meta tag to ensure proper rendering and touch zooming -->
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <!-- Include jQuery Mobile stylesheets -->
		  <link rel="stylesheet" href="./js/jquery_mobile_1.4.5/jquery.mobile-1.4.5.min.css">
		  <!-- Include the jQuery library -->
		  <script src="./js/jquery-2.1.4.min.js"></script>
		  <!-- Include the jQuery Mobile library -->
		  <script src="./js/jquery_mobile_1.4.5/jquery.mobile-1.4.5.min.js"></script>
		  
		  <script src="./js/d3-master/d3.min.js" language="JavaScript"></script>
		  <script src="./js/liquidFillGauge.js" language="JavaScript"></script>
		  <!-- Website content -->
		   <link rel="stylesheet" href="./css/stylesheet.css">
		   <script src="./js/labapp_menu.js"></script>
	</head>
	<body>
		<div data-role="page" id="demo-page" data-theme="a" data-url="demo-page">
			<div data-role="header" data-theme="b" data-position="fixed">
				<h1>Swipe left or right</h1>
				<a href="#left-panel" data-theme="a" data-icon="arrow-r" data-iconpos="notext" data-shadow="false" data-iconshadow="false" class="ui-icon-nodisc">Open left panel</a>
				<a href="#right-panel" data-theme="a" data-icon="arrow-l" data-iconpos="notext" data-shadow="false" data-iconshadow="false" class="ui-icon-nodisc">Open right panel</a>
			</div><!-- /header -->
			<div data-role="content">
			
					
					<?php 
						$querystr = "select kategorie, wert from testdaten;";
						$result = mysqli_query($conn, $querystr);
						while ($row = mysqli_fetch_array($result)) {
						?>
							<h1><?php echo $row["kategorie"]; ?></h1>
					
							<svg id="fillgauge<?php echo $row["kategorie"]; ?>" width="97%" height="250"></svg>
							<script language="JavaScript">
								loadLiquidFillGauge("fillgauge<?php echo $row["kategorie"]; ?>", <?php echo $row["wert"]/10; ?>);
							</script>
						<?php
							
						}
					?>
					<script>
						$.ajax({
									url: 'test.php',
									type: "POST",  
									data: { 'action': "save" },  
									success: function (data) {
										if ( data != '' ) {
											alert(data);
										} else  {
											alert("FEHLER");
										}
										
									}
								 });
					</script>
				<a href="#demo-intro" data-rel="back" class="back-btn" data-role="button" data-mini="true" data-inline="true" data-icon="back" data-iconpos="right">Back to demo intro</a>
			</div><!-- /content -->
			<div data-role="panel" id="left-panel" data-theme="b">
				<p>Left reveal panel.</p>
				<a href="#" data-rel="close" data-role="button" data-mini="true" data-inline="true" data-icon="delete" data-iconpos="right">Close</a>
			</div><!-- /panel -->
			<div data-role="panel" id="right-panel" data-display="push" data-position="right" data-theme="c">
				<p>Right push panel.</p>
				<a href="#" data-rel="close" data-role="button" data-mini="true" data-inline="true" data-icon="delete" data-iconpos="right">Close</a>
			</div><!-- /panel -->
		</div>
	</body>
</html>