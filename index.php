<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>TX-IMSC</title>
		<!-- Interactive Map for Soil Categorization -->

		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="css/custom.css" rel="stylesheet" type="text/css">
		<link href="css/modern-business.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="css/font-awesome.css" rel="stylesheet" type="text/css">
		
		<!--switches-->
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/css-toggle-switch/latest/toggle-switch.css" />

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>

	<body>

		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="text-center" style='font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;'>
					<h3 style="color:#FF8000;margin-right:8%;padding-top:1%;">CENTER FOR TRANSPORTATION INFRASTRUCTURE SYSTEMS</h3>
					<h6><i style="color:white;margin-right:8%">"The Only Research Center in the Nation that is Designated as a Member of both National and Regional University Transportation Center"</i></h6>
				</div>

			</div>
			<!-- /.container -->
		</nav>

		<!-- Page Content -->

		<!-- Content Row -->
		<div>

			<div class="row">
				<div class="col-md-8">
					<div id="map"></div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<center><h3 class="panel-title">Mode</h3></center>
							<fieldset>
								<div class="switch-toggle switch-holo">
									<input id="search" name="view" type="radio" checked>
									<label for="search" onclick="">Search</label>

									<input id="draw" name="view" type="radio">
									<label for="draw" onclick="">Draw</label>

									<a></a>
								</div>
							</fieldset>
						</div>
						<div class="panel-body">
							<!-- Hidden Nav tabs -->
							<ul class="nav nav-tabs" role="tablist" id="myTab">
								<li class="hidden active">
									<a href="#searchTab" role="tab" data-toggle="tab">Search</a>
								</li>
								<li class="hidden">
									<a href="#drawTab" role="tab" data-toggle="tab" >Draw</a>
								</li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
								<div class="tab-pane active" id="searchTab">
									<div class="row">
										Search
									</div>
									<div class="row">
										<div class="input-group">
											<span class="input-group-addon glyphicon glyphicon-search" id="basic-addon"></span>
											<input type="text" class="form-control" placeholder="Ground Property" aria-describedby="basic-addon" id="autocomplete">
										</div>
									</div>
								</div>
								<div class="tab-pane" id='drawTab'>
									<div class="row">Draw</div>
									<div class="row vert-offset-top-2">
										<button id="area" type="submit" class="btn btn-default"><span class="glyphicon glyphicon-edit"> Area</span></button>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div id="info" class="col-md-6 col-md-offset-3">
					<p>This appears when a polygon is clicked.</p>
				</div>
			</div>
		</div>
		<!-- Bootstrap Core JavaScript -->
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="http://maps.googleapis.com/maps/api/js"></script>
		<script src="js/gmaps.js"></script>
		<script src="js/jquery.autocomplete.min.js"></script>

		<script>
			$(':radio').click(function(e){
				var selected = $(":checked").attr('id');
				$('#myTab a[href="#' + selected + 'Tab"]').tab('show')
			});
			//implements switch-toggle to act as tab switcher
			
			var properties = [
				{value: 'Plasticity', data: 'PI'}
			];
			var button = "<div class=\"row vert-offset-top-2\"><div class=\"col-sm-6\"><button class=\"btn btn-default\" type=\"submit\" id=\"location\">Location</button></div><div class=\"col-sm-6\"><div class=\"dropdown\"><button class=\"btn btn-default\" id=\"dLabel\" disabled=\"disabled\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">Option<span class=\"caret\"></span></button><ul class=\"dropdown-menu\" aria-labelledby=\"dLabel\"><li><a href=\"#\" id=\"very\" style=\"color: red;\">Very</a></li><li><a href=\"#\" id=\"moderatley\" style=\"color: yellow;\">Moderately</a></li><li><a href=\"#\" id=\"non-plastic\" ><span style=\"background-color: green\"></span> Non-plastic</a></li></ul></div></div></div>";
			var instruction = "";
			var info = false;
			var loc = false;
			var lowLeft = null;
			var topRight = null;
			$('#autocomplete').autocomplete({
				lookup: properties,
				onSelect: function (suggestion) {
				console.log('You selected: ' + suggestion.value + ', ' + suggestion.data);
				$(button).hide().appendTo('#searchTab').fadeIn(1000);
				}
			});
			//implements local autocomplete for the search mode
			
			$('#searchTab').delegate('#location', 'click', function(e){
				if(!info){
					instruction = "<div class=\"alert alert-info vert-offset-top-1\" role=\"alert\">Click on map the area you want to search on</div>";
					$(instruction).hide().appendTo('#searchTab').fadeIn(1000);
					info = true;
					loc = true;
				}
				
			});
			$('#area').click(function(e){
				$('#drawTab').find(".alert").remove();
				instruction = "<div class=\"alert alert-info vert-offset-top-1\" role=\"alert\">Click the lower left corner of the area you want to search on</div>";
				$(instruction).hide().appendTo('#drawTab').fadeIn(1000);
				lowLeft = new google.maps.LatLng('0', '0');
				topRight = null;
				
			});
			
			$('#info').hide();
			var mukeyIn = [], biggestY = -90, smallestY = 90, biggestX = -180, smallestX = 180;
			var map, polygons;
			$.getJSON("map/dallas.json", function(data) {
				polygons = data;
			}).done(function(){
				console.log("Polygons: " +polygons.length);
			});
			var consistence;
			$.getJSON("tables/chconsistence.csv.json", function(data) {
				consistence = data;
			});
			var component;
			$.getJSON("tables/component.csv.json", function(data) {
				component = data;
			});
			var horizon;
			$.getJSON("tables/horizon.json", function(data) {
				horizon = data;
				console.log("Horizon: " + horizon.length);
			});
			function loadResults(mukey, color, attr) {
				if (mukeyIn.indexOf(mukey) > -1) {
					return;
				}
				var items,
				    paths_data = [];
				if (polygons.features.length > 0) {
					items = polygons.features;
					for (var i = 0; i < items.length; i++) {
						var item = items[i];
						if (item.attributes.MUKEY == mukey) {
							if (!(mukeyIn.indexOf(mukey) > -1)) {
								mukeyIn.push(mukey);
							}
							var currPath = [];
							if(!$.each(item.geometry.rings[0], function(index, entry) {
								if(lowLeft != null){
									if(lowLeft.lat() > entry[1] || topRight.lat() < entry[1]){
										console.log("Polygon out of bounds");
										return false;
									}
									else if (lowLeft.lng() > entry[0] || topRight.lng < entry[0]){
										console.log("Polygon out of bounds");
										return false;
									}
								}
								
								currPath.push([entry[1], entry[0]]);
								if(entry[1] > biggestY){
									biggestY = entry[1];
								} else if(entry[1] < smallestY){
									smallestY = entry[1];
								}
								if(entry[0] > biggestX){
									biggestX = entry[0];
								} else if(entry[0] < smallestX){
									smallestX = entry[0];
								}
							})){
								break;
							}
							map.drawPolygon({
								paths : currPath,
								strokeColor : '#BBD8E9',
								strokeOpacity : 1,
								strokeWeight : 1,
								fillColor : color,
								fillOpacity : 0.6,
								visible : true,
								data : item.attributes.MUKEY,
								click : function(e) {
									map.map.panTo(e.latLng);
									map.setZoom(13);
									var infowindow = new google.maps.InfoWindow({
										size: new google.maps.Size(150, 50),
										content: '<ul><li>Depth: '+ attr[0] + '</li></ul>',
										position: e.latLng
									});
									infowindow.open(map.map);
									$('#info').text(this.data);
									$('#info').show();
								},
								
							});
						}
					}
				}
			}
			
			function iterateJSON(attribute, color){
				var promises = [];
				for (var i = 0; i < consistence.length; i++) {
					if (consistence[i].plasticity == attribute) {
						var horizonKey = consistence[i].chkey;
						for (var j = 0; j < horizon.length; j++) {
							if (horizonKey == horizon[j].chkey) {
								var componentKey = horizon[j].cokey;
								var attr = [horizon[j].topDepth, horizon[j].bottomDepth];
								for (var k = 0; k < component.length; k++) {
									if (componentKey == component[k].cokey) {
										var polygonKey = component[k].mukey;
										var def = new $.Deferred();
										
										loadResults(polygonKey, color, attr);
										def.resolve();
										promises.push(def);
									}
								}
							}
						}
					}
				}
				return $.when.apply(undefined, promises).promise();
			}
			function allLevels(){
				iterateJSON("Very plastic", 'red');
				iterateJSON("Moderately plastic", 'yellow');
				iterateJSON("Nonplastic", 'green');
				if(biggestY != -90){
					map.setCenter((biggestY + smallestY)/2, (biggestX + smallestX)/2);
					map.setZoom(11);
				}
			}
			$('#searchTab').delegate('#very', 'click', function(e) {
				console.log("started to read tables");
				var filtered = iterateJSON("Very plastic", 'red');
				if(biggestY != -90){
					map.setCenter((biggestY + smallestY)/2, (biggestX + smallestX)/2);
					map.setZoom(11);
				}
				else{
					alert("No areas were found.");
				}
				filtered.done(function(){
					console.log("finished reading table");
				});
				
			});
			$('#searchTab').delegate('#moderatley', 'click', function(e) {
				console.log("started to read tables");
				var filtered = iterateJSON("Moderately plastic", 'yellow');
				if(biggestY != -90){
					map.setCenter((biggestY + smallestY)/2, (biggestX + smallestX)/2);
					map.setZoom(11);
				}
				else{
					alert("No areas were found.");
				}
				console.log("finished reading table");
			});
			$('#searchTab').delegate('#non-plastic', 'click', function(e) {
				console.log("started to read tables");
				var filtered = iterateJSON("Nonplastic", 'green');
				if(biggestY != -90){
					map.setCenter((biggestY + smallestY)/2, (biggestX + smallestX)/2);
					map.setZoom(11);
				}
				else{
					alert("No areas were found.");
				}
				
				console.log("finished reading table");
			});
					
			$(document).ready(function() {
				map = new GMaps({
					div : '#map',
					zoom : 6,
					lat : 31.31610138349565,
					lng : -99.11865234375
				});
				GMaps.on('click', map.map, function(event) {
					var lat = event.latLng.lat();
					var lng = event.latLng.lng();
					console.log(lat + ", " + lng);
					if (loc){
						if (lat > 33.465816745730024 || lat < 32.312670050625805){
							alert("This area is not yet supported");
						}
						else if (lng > -95.9381103515625 || lng < -97.4652099609375){
							alert("This area is not yet supported");
						}
						else{
							var info = $('#searchTab').find('.alert');
							info.removeClass('alert-info').addClass('alert-success');
							info.text('Selected Dallas District');
							$('#searchTab').find('#dLabel').removeProp('disabled');
							loc = false;
						}
					}
					else if (lowLeft != null && topRight == null){
						lowLeft = event.latLng;
						topRight = new google.maps.LatLng('0', '0');
						var info = $('#drawTab').find('.alert');
						info.text('Now select upper right corner.');
					}
					else if (topRight != null){
						topRight = event.latLng;
						var info = $('#drawTab').find('.alert');
						info.text('Area selected.');
						map.fitLatLngBounds([lowLeft, topRight]);
						if (topRight.lat() > 33.465816745730024 && lowLeft.lat() < 32.312670050625805){
							alert("This area is not yet supported");
						}
						else if (topRight.lng() > -95.9381103515625 && lowLeft.lng() < -97.4652099609375){
							alert("This area is not yet supported");
						}
						else{
							info.removeClass('alert-info').addClass('alert-success');
							info.text('Selected Dallas District');
							allLevels();
						}
					}
					/*
					if (marker){
						map.addMarker({
							lat : lat,
							lng : lng,
							title : 'Marker #' + 5,
							infoWindow : {
								content : "<p>Hello</p>"
							}
						});
					}
					*/
							
				});
			});

		</script>
	</body>
</html>
