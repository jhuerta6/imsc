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
		
		<!-- arcgis link -->
		<script>
			/*
 this one has been decrapitated
 http://google-maps-utility-library-v3.googlecode.com
 the code is still available here:
 https://github.com/printercu/google-maps-utility-library-v3-read-only/tree/master/arcgislink
*/
(function(){function q(a,b,c){var d=b===""?0:a.indexOf(b);c=c===""?a.length:a.indexOf(c,d+b.length);return a.substring(d+b.length,c)}function H(a){return a&&typeof a==="string"}function r(a){return a&&a.splice}function l(a,b,c){if(a&&b){var d;for(d in a)if(c||!(d in b))b[d]=a[d]}return b}function y(){i.event.trigger.apply(this,arguments)}function v(a,b){a&&b&&b.error&&a(b.error)}function ca(a,b){var c="";if(a)c+=a.getTime()-a.getTimezoneOffset()*6E4;if(b)c+=", "+(b.getTime()-b.getTimezoneOffset()*
6E4);return c}function I(a,b){b=Math.min(Math.max(b,0),1);if(a){var c=a.style;if(typeof c.opacity!=="undefined")c.opacity=b;if(typeof c.filters!=="undefined")c.filters.alpha.opacity=Math.floor(100*b);if(typeof c.filter!=="undefined")c.filter="alpha(opacity:"+Math.floor(b*100)+")"}}function U(a){var b="";for(var c in a)if(a.hasOwnProperty(c)){if(b.length>0)b+=";";b+=c+":"+a[c]}return b}function ma(){if(typeof XMLHttpRequest==="undefined"){try{return new ActiveXObject("Msxml2.XMLHTTP.6.0")}catch(a){}try{return new ActiveXObject("Msxml2.XMLHTTP.3.0")}catch(b){}try{return new ActiveXObject("Msxml2.XMLHTTP")}catch(c){}throw new Error("This browser does not support XMLHttpRequest.");
}else return new XMLHttpRequest}function S(a){var b=a;if(r(a)&&a.length>0)b=a[0];if(b instanceof i.LatLng||b instanceof i.Marker)return r(a)&&a.length>1?s.MULTIPOINT:s.POINT;else if(b instanceof i.Polyline)return s.POLYLINE;else if(b instanceof i.Polygon)return s.POLYGON;else if(b instanceof i.LatLngBounds)return s.ENVELOPE;else if(b.x!==undefined&&b.y!==undefined)return s.POINT;else if(b.points)return s.MULTIPOINT;else if(b.paths)return s.POLYLINE;else if(b.rings)return s.POLYGON;return null}function V(a){var b=
a;if(r(a)&&a.length>0)b=a[0];if(r(b)&&b.length>0)b=b[0];if(b instanceof i.LatLng||b instanceof i.Marker||b instanceof i.Polyline||b instanceof i.Polygon||b instanceof i.LatLngBounds)return true;return false}function N(a){if(!a)return null;return typeof a==="number"?a:a.wkid?a.wkid:a.toJSON()}function da(a,b){for(var c=[],d,e=0,f=a.getLength();e<f;e++){d=a.getAt(e);c.push("["+d.lng()+","+d.lat()+"]")}b&&c.length>0&&c.push("["+a.getAt(0).lng()+","+a.getAt(0).lat()+"]");return c.join(",")}function J(a){var b,
c,d,e="{";switch(S(a)){case s.POINT:b=r(a)?a[0]:a;if(b instanceof i.Marker)b=b.getPosition();e+="x:"+b.lng()+",y:"+b.lat();break;case s.MULTIPOINT:d=[];for(c=0;c<a.length;c++){b=a[c]instanceof i.Marker?a[c].getPosition():a[c];d.push("["+b.lng()+","+b.lat()+"]")}e+="points: ["+d.join(",")+"]";break;case s.POLYLINE:d=[];a=r(a)?a:[a];for(c=0;c<a.length;c++)d.push("["+da(a[c].getPath())+"]");e+="paths:["+d.join(",")+"]";break;case s.POLYGON:d=[];b=r(a)?a[0]:a;a=b.getPaths();for(c=0;c<a.getLength();c++)d.push("["+
da(a.getAt(c),true)+"]");e+="rings:["+d.join(",")+"]";break;case s.ENVELOPE:b=r(a)?a[0]:a;e+="xmin:"+b.getSouthWest().lng()+",ymin:"+b.getSouthWest().lat()+",xmax:"+b.getNorthEast().lng()+",ymax:"+b.getNorthEast().lat();break}e+=", spatialReference:{wkid:4326}";e+="}";return e}function na(a){function b(e){for(var f=[],g=0,h=e.length;g<h;g++)f.push("["+e[g][0]+","+e[g][1]+"]");return"["+f.join(",")+"]"}function c(e){for(var f=[],g=0,h=e.length;g<h;g++)f.push(b(e[g]));return"["+f.join(",")+"]"}var d=
"{";if(a.x)d+="x:"+a.x+",y:"+a.y;else if(a.xmin)d+="xmin:"+a.xmin+",ymin:"+a.ymin+",xmax:"+a.xmax+",ymax:"+a.ymax;else if(a.points)d+="points:"+b(a.points);else if(a.paths)d+="paths:"+c(a.paths);else if(a.rings)d+="rings:"+c(a.rings);d+="}";return d}function W(a){var b=B[a.spatialReference.wkid||a.spatialReference.wkt];b=b||K;var c=b.inverse([a.xmin,a.ymin]);a=b.inverse([a.xmax,a.ymax]);return new i.LatLngBounds(new i.LatLng(c[1],c[0]),new i.LatLng(a[1],a[0]))}function L(a,b){var c=null,d,e,f,g,h,
j,C,D;b=b||{};if(a){c=[];if(a.x){d=new i.Marker(l(b.markerOptions||b,{position:new i.LatLng(a.y,a.x)}));c.push(d)}else{h=a.points||a.paths||a.rings;if(!h)return c;var ea=[];e=0;for(f=h.length;e<f;e++){j=h[e];if(a.points){d=new i.Marker(l(b.markerOptions||b,{position:new i.LatLng(j[1],j[0])}));c.push(d)}else{D=[];d=0;for(g=j.length;d<g;d++){C=j[d];D.push(new i.LatLng(C[1],C[0]))}if(a.paths){d=new i.Polyline(l(b.polylineOptions||b,{path:D}));c.push(d)}else a.rings&&ea.push(D)}}if(a.rings){d=new i.Polygon(l(b.polygonOptions||
b,{paths:ea}));c.push(d)}}}return c}function fa(a,b){if(a){var c,d,e;c=0;for(d=a.length;c<d;c++){e=a[c];if(e.geometry)e.geometry=L(e.geometry,b)}}}function X(a){var b;if(typeof a==="object")if(r(a)){b=[];for(var c=0,d=a.length;c<d;c++)b.push(X(a[c]));return"["+b.join(",")+"]"}else if(V(a))return J(a);else if(a.toJSON)return a.toJSON();else{b="";for(c in a)if(a.hasOwnProperty(c)){if(b.length>0)b+=", ";b+=c+":"+X(a[c])}return"{"+b+"}"}return a.toString()}function ga(a){var b,c,d,e=[];b=0;for(c=a.length;b<
c;b++){d=a[b];if(d instanceof i.Marker)d=d.getPosition();e.push({geometry:{x:d.lng(),y:d.lat(),spatialReference:{wkid:4326}}})}return{type:'"features"',features:e,doNotLocateOnRestrictedElements:false}}function ha(a){var b={};if(!a)return null;var c=[],d,e;if(a.geometries&&a.geometries.length>0){d=a.geometries[0];e=V(d);for(var f=0,g=a.geometries.length;f<g;f++)e?c.push(J(a.geometries[f])):c.push(na(a.geometries[f]))}if(!a.geometryType)a.geometryType=S(d);if(e)b.inSR=K.wkid;else if(a.inSpatialReference)b.inSR=
N(a.inSpatialReference);if(a.outSpatialReference)b.outSR=N(a.outSpatialReference);b.geometries='{geometryType:"'+a.geometryType+'", geometries:['+c.join(",")+"]}";return b}function ia(a){var b="";if(a){a.f=a.f||"json";for(var c in a)if(a.hasOwnProperty(c)&&a[c]!==null&&a[c]!==undefined){var d=X(a[c]);b+=(b.length>0?"&":"")+(c+"="+(escape?escape(d):encodeURIComponent(d)))}}return b}function oa(a,b){for(var c=[],d=2,e=arguments.length;d<e;d++)c.push(arguments[d]);return function(){a.apply(b,c)}}function Y(a,
b,c){b.hasLoaded()?a.push(b.copyrightText):i.event.addListenerOnce(b,"load",function(){M(c)})}function M(a){var b=null;if(a){var c=a.controls[i.ControlPosition.BOTTOM_RIGHT];if(c)for(var d=0,e=c.getLength();d<e;d++)if(c.getAt(d).id==="agsCopyrights"){b=c.getAt(d);break}if(!b){b=document.createElement("div");b.style.fontFamily="Arial,sans-serif";b.style.fontSize="10px";b.style.textAlign="right";b.id="agsCopyrights";a.controls[i.ControlPosition.BOTTOM_RIGHT].push(b);i.event.addListener(a,"maptypeid_changed",
function(){M(a)})}var f=a.agsOverlays;c=[];if(f){d=0;for(e=f.getLength();d<e;d++)Y(c,f.getAt(d).mapService_,a)}var g=a.overlayMapTypes;if(g){d=0;for(e=g.getLength();d<e;d++){f=g.getAt(d);if(f instanceof u)for(var h=0,j=f.tileLayers_.length;h<j;h++)Y(c,f.tileLayers_[h].mapService_,a)}}f=a.mapTypes.get(a.getMapTypeId());if(f instanceof u){d=0;for(e=f.tileLayers_.length;d<e;d++)Y(c,f.tileLayers_[d].mapService_,a);b.style.color=f.negative?"#ffffff":"#000000"}b.innerHTML=c.join("<br/>")}}function o(a,
b,c,d){var e="ags_jsonp_"+pa++ +"_"+Math.floor(Math.random()*1E6),f=null;b=b||{};b[c||"callback"]="ags_jsonp."+e;b=ia(b);var g=document.getElementsByTagName("head")[0];if(!g)throw new Error("document must have header tag");window.ags_jsonp[e]=function(){window.ags_jsonp[e]&&delete window.ags_jsonp[e];f&&g.removeChild(f);f=null;d.apply(null,arguments);y(z,"jsonpend",e)};if((b+a).length<2E3&&!O.alwaysUseProxy){f=document.createElement("script");f.src=a+(a.indexOf("?")===-1?"?":"&")+b;f.id=e;g.appendChild(f)}else{c=
window.location;c=c.protocol+"//"+c.hostname+(!c.port||c.port===80?"":":"+c.port+"/");var h=true;if(a.toLowerCase().indexOf(c.toLowerCase())!==-1)h=false;if(O.alwaysUseProxy)h=true;if(h&&!O.proxyUrl)throw new Error("No proxyUrl property in Config is defined");var j=ma();j.onreadystatechange=function(){if(j.readyState===4)if(j.status===200)eval(j.responseText);else throw new Error("Error code "+j.status);};j.open("POST",h?O.proxyUrl+"?"+a:a,true);j.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
j.send(b)}y(z,"jsonpstart",e);return e}function m(a){a=a||{};this.wkid=a.wkid;this.wkt=a.wkt}function T(a){a=a||{};m.call(this,a)}function w(a){a=a||{};m.call(this,a);var b=a.inverse_flattening,c=a.standard_parallel_1*k,d=a.standard_parallel_2*k,e=a.latitude_of_origin*k;this.a_=a.semi_major/a.unit;this.lamda0_=a.central_meridian*k;this.FE_=a.false_easting;this.FN_=a.false_northing;a=1/b;b=2*a-a*a;this.e_=Math.sqrt(b);a=this.calc_m_(c,b);b=this.calc_m_(d,b);e=this.calc_t_(e,this.e_);c=this.calc_t_(c,
this.e_);d=this.calc_t_(d,this.e_);this.n_=Math.log(a/b)/Math.log(c/d);this.F_=a/(this.n_*Math.pow(c,this.n_));this.rho0_=this.calc_rho_(this.a_,this.F_,e,this.n_)}function E(a){a=a||{};m.call(this,a);this.a_=a.semi_major/a.unit;var b=a.inverse_flattening;this.k0_=a.scale_factor;var c=a.latitude_of_origin*k;this.lamda0_=a.central_meridian*k;this.FE_=a.false_easting;this.FN_=a.false_northing;a=1/b;this.es_=2*a-a*a;this.ep4_=this.es_*this.es_;this.ep6_=this.ep4_*this.es_;this.eas_=this.es_/(1-this.es_);
this.M0_=this.calc_m_(c,this.a_,this.es_,this.ep4_,this.ep6_)}function F(a){a=a||{};m.call(this,a);this.a_=(a.semi_major||6378137)/(a.unit||1);this.lamda0_=(a.central_meridian||0)*k}function x(a){a=a||{};m.call(this,a);var b=a.inverse_flattening,c=a.standard_parallel_1*k,d=a.standard_parallel_2*k,e=a.latitude_of_origin*k;this.a_=a.semi_major/a.unit;this.lamda0_=a.central_meridian*k;this.FE_=a.false_easting;this.FN_=a.false_northing;a=1/b;b=2*a-a*a;this.e_=Math.sqrt(b);a=this.calc_m_(c,b);b=this.calc_m_(d,
b);c=this.calc_q_(c,this.e_);d=this.calc_q_(d,this.e_);e=this.calc_q_(e,this.e_);this.n_=(a*a-b*b)/(d-c);this.C_=a*a+this.n_*c;this.rho0_=this.calc_rho_(this.a_,this.C_,this.n_,e)}function G(a){this.url=a;this.definition=null}function n(a,b){this.url=a;this.loaded_=false;var c=a.split("/");this.name=c[c.length-2].replace(/_/g," ");b=b||{};if(b.delayLoad){var d=this;window.setTimeout(function(){d.loadServiceInfo()},b.delayLoad*1E3)}else this.loadServiceInfo()}function P(a){this.url=a;this.loaded_=
false;var b=this;o(a,{},"",function(c){b.init_(c)})}function Z(a){this.url=a;this.t="geocodeservice"}function ja(a){this.url=a;this.loaded_=false;var b=this;o(a,{},"",function(c){l(c,b);b.loaded_=true;y(b,"load")})}function ka(a){this.url=a}function t(a){this.lods_=a?a.lods:null;this.spatialReference_=a?B[a.spatialReference.wkid||a.spatialReference.wkt]:Q;if(!this.spatialReference_)throw new Error("unsupported Spatial Reference");this.resolution0_=a?a.lods[0].resolution:156543.033928;this.minZoom=
Math.floor(Math.log(this.spatialReference_.getCircum()/this.resolution0_/256)/Math.LN2+0.5);this.maxZoom=a?this.minZoom+this.lods_.length-1:20;if(i.Size)this.tileSize_=a?new i.Size(a.cols,a.rows):new i.Size(256,256);this.scale_=Math.pow(2,this.minZoom)*this.resolution0_;this.originX_=a?a.origin.x:-2.0037508342787E7;this.originY_=a?a.origin.y:2.0037508342787E7;if(a)for(var b,c=0;c<a.lods.length-1;c++){b=a.lods[c].resolution/a.lods[c+1].resolution;if(b>2.001||b<1.999)throw new Error("This type of map cache is not supported in V3. \nScale ratio between zoom levels must be 2");
}}function A(a,b){b=b||{};if(b.opacity){this.opacity_=b.opacity;delete b.opacity}l(b,this);this.mapService_=a instanceof n?a:new n(a);if(b.hosts){var c=q(this.mapService_.url,"","://"),d=q(this.mapService_.url,"://","/");d=q(this.mapService_.url,c+"://"+d,"");this.urlTemplate_=c+"://"+b.hosts+d;this.numOfHosts_=parseInt(q(b.hosts,"[","]"),10)}this.name=b.name||this.mapService_.name;this.maxZoom=b.maxZoom||19;this.minZoom=b.minZoom||0;this.dynaZoom=b.dynaZoom||this.maxZoom;if(this.mapService_.loaded_)this.init_(b);
else{var e=this;i.event.addListenerOnce(this.mapService_,"load",function(){e.init_(b)})}this.tiles_={};this.map_=b.map}function u(a,b){b=b||{};var c;if(b.opacity){this.opacity_=b.opacity;delete b.opacity}l(b,this);var d=a;if(H(a))d=[new A(a,b)];else if(a instanceof n)d=[new A(a,b)];else if(a instanceof A)d=[a];else if(a.length>0&&H(a[0])){d=[];for(c=0;c<a.length;c++)d[c]=new A(a[c],b)}this.tileLayers_=d;this.tiles_={};if(b.maxZoom!==undefined)this.maxZoom=b.maxZoom;else{var e=0;for(c=0;c<d.length;c++)e=
Math.max(e,d[c].maxZoom);this.maxZoom=e}if(d[0].projection_){this.tileSize=d[0].projection_.tileSize_;this.projection=d[0].projection_}else this.tileSize=new i.Size(256,256);if(!this.name)this.name=d[0].name}function p(a,b){b=b||{};this.mapService_=a instanceof n?a:new n(a);this.minZoom=b.minZoom;this.maxZoom=b.maxZoom;this.opacity_=b.opacity||1;this.exportOptions_=b.exportOptions||{};this.needsNewRefresh_=this.drawing_=false;this.div_=this.overlay_=null;b.map&&this.setMap(b.map);this.map_=null;this.listeners_=
[]}function R(a,b,c,d){this.bounds_=a;this.url_=b;this.map_=c;this.div_=null;this.op_=d;this.setMap(c)}function la(a){this.map_=a;M(a)}var $=$||{},k=Math.PI/180,pa=0;window.ags_jsonp=window.ags_jsonp||{};var i=google.maps,K,aa,Q,ba,O={proxyUrl:null,alwaysUseProxy:false},B={},z={},s={POINT:"esriGeometryPoint",MULTIPOINT:"esriGeometryMultipoint",POLYLINE:"esriGeometryPolyline",POLYGON:"esriGeometryPolygon",ENVELOPE:"esriGeometryEnvelope"};z.getJSON=function(a,b,c,d){o(a,b,c,d)};z.addToMap=function(a,
b){if(r(b))for(var c,d=0,e=b.length;d<e;d++){c=b[d];if(r(c))z.addToMap(a,c);else V(c)&&c.setMap(a)}};z.removeFromMap=function(a,b){z.addToMap(null,a);if(b)a.length=0};m.prototype.forward=function(a){return a};m.prototype.inverse=function(a){return a};m.prototype.getCircum=function(){return 360};m.prototype.toJSON=function(){return"{"+(this.wkid?" wkid:"+this.wkid:"wkt: '"+this.wkt+"'")+"}"};T.prototype=new m;w.prototype=new m;w.prototype.calc_m_=function(a,b){var c=Math.sin(a);return Math.cos(a)/
Math.sqrt(1-b*c*c)};w.prototype.calc_t_=function(a,b){var c=b*Math.sin(a);return Math.tan(Math.PI/4-a/2)/Math.pow((1-c)/(1+c),b/2)};w.prototype.calc_rho_=function(a,b,c,d){return a*b*Math.pow(c,d)};w.prototype.calc_phi_=function(a,b,c){c=b*Math.sin(c);return Math.PI/2-2*Math.atan(a*Math.pow((1-c)/(1+c),b/2))};w.prototype.solve_phi_=function(a,b,c){var d=0;c=c;for(var e=this.calc_phi_(a,b,c);Math.abs(e-c)>1.0E-9&&d<10;){d++;c=e;e=this.calc_phi_(a,b,c)}return e};w.prototype.forward=function(a){var b=
a[0]*k;a=this.calc_rho_(this.a_,this.F_,this.calc_t_(a[1]*k,this.e_),this.n_);b=this.n_*(b-this.lamda0_);return[this.FE_+a*Math.sin(b),this.FN_+this.rho0_-a*Math.cos(b)]};w.prototype.inverse=function(a){var b=a[0]-this.FE_,c=a[1]-this.FN_;a=Math.atan(b/(this.rho0_-c));b=Math.pow((this.n_>0?1:-1)*Math.sqrt(b*b+(this.rho0_-c)*(this.rho0_-c))/(this.a_*this.F_),1/this.n_);b=this.solve_phi_(b,this.e_,Math.PI/2-2*Math.atan(b));return[(a/this.n_+this.lamda0_)/k,b/k]};w.prototype.getCircum=function(){return Math.PI*
2*this.a_};E.prototype=new m;E.prototype.calc_m_=function(a,b,c,d,e){return b*((1-c/4-3*d/64-5*e/256)*a-(3*c/8+3*d/32+45*e/1024)*Math.sin(2*a)+(15*d/256+45*e/1024)*Math.sin(4*a)-35*e/3072*Math.sin(6*a))};E.prototype.forward=function(a){var b=a[1]*k,c=a[0]*k;a=this.a_/Math.sqrt(1-this.es_*Math.pow(Math.sin(b),2));var d=Math.pow(Math.tan(b),2),e=this.eas_*Math.pow(Math.cos(b),2);c=(c-this.lamda0_)*Math.cos(b);var f=this.calc_m_(b,this.a_,this.es_,this.ep4_,this.ep6_);return[this.FE_+this.k0_*a*(c+(1-
d+e)*Math.pow(c,3)/6+(5-18*d+d*d+72*e-58*this.eas_)*Math.pow(c,5)/120),this.FN_+this.k0_*(f-this.M0_)+a*Math.tan(b)*(c*c/2+(5-d+9*e+4*e*e)*Math.pow(c,4)/120+(61-58*d+d*d+600*e-330*this.eas_)*Math.pow(c,6)/720)]};E.prototype.inverse=function(a){var b=a[0],c=a[1];a=(1-Math.sqrt(1-this.es_))/(1+Math.sqrt(1-this.es_));c=(this.M0_+(c-this.FN_)/this.k0_)/(this.a_*(1-this.es_/4-3*this.ep4_/64-5*this.ep6_/256));a=c+(3*a/2-27*Math.pow(a,3)/32)*Math.sin(2*c)+(21*a*a/16-55*Math.pow(a,4)/32)*Math.sin(4*c)+151*
Math.pow(a,3)/6*Math.sin(6*c)+1097*Math.pow(a,4)/512*Math.sin(8*c);c=this.eas_*Math.pow(Math.cos(a),2);var d=Math.pow(Math.tan(a),2),e=this.a_/Math.sqrt(1-this.es_*Math.pow(Math.sin(a),2)),f=this.a_*(1-this.es_)/Math.pow(1-this.es_*Math.pow(Math.sin(a),2),1.5);b=(b-this.FE_)/(e*this.k0_);e=a-e*Math.tan(a)/f*(b*b/2-(5+3*d+10*c-4*c*c-9*this.eas_)*Math.pow(b,4)/24+(61+90*d+28*c+45*d*d-252*this.eas_-3*c*c)*Math.pow(b,6)/720);return[(this.lamda0_+(b-(1+2*d+c)*Math.pow(b,3)/6+(5-2*c+28*d-3*c*c+8*this.eas_+
24*d*d)*Math.pow(b,5)/120)/Math.cos(a))/k,e/k]};E.prototype.getCircum=function(){return Math.PI*2*this.a_};F.prototype=new m;F.prototype.forward=function(a){var b=a[1]*k;return[this.a_*(a[0]*k-this.lamda0_),this.a_/2*Math.log((1+Math.sin(b))/(1-Math.sin(b)))]};F.prototype.inverse=function(a){return[(a[0]/this.a_+this.lamda0_)/k,(Math.PI/2-2*Math.atan(Math.exp(-a[1]/this.a_)))/k]};F.prototype.getCircum=function(){return Math.PI*2*this.a_};x.prototype=new m;x.prototype.calc_m_=function(a,b){var c=Math.sin(a);
return Math.cos(a)/Math.sqrt(1-b*c*c)};x.prototype.calc_q_=function(a,b){var c=b*Math.sin(a);return(1-b*b)*(Math.sin(a)/(1-c*c)-1/(2*b)*Math.log((1-c)/(1+c)))};x.prototype.calc_rho_=function(a,b,c,d){return a*Math.sqrt(b-c*d)/c};x.prototype.calc_phi_=function(a,b,c){var d=b*Math.sin(c);return c+(1-d*d)*(1-d*d)/(2*Math.cos(c))*(a/(1-b*b)-Math.sin(c)/(1-d*d)+Math.log((1-d)/(1+d))/(2*b))};x.prototype.solve_phi_=function(a,b,c){var d=0;c=c;for(var e=this.calc_phi_(a,b,c);Math.abs(e-c)>1.0E-8&&d<10;){d++;
c=e;e=this.calc_phi_(a,b,c)}return e};x.prototype.forward=function(a){var b=a[0]*k;a=this.calc_rho_(this.a_,this.C_,this.n_,this.calc_q_(a[1]*k,this.e_));b=this.n_*(b-this.lamda0_);return[this.FE_+a*Math.sin(b),this.FN_+this.rho0_-a*Math.cos(b)]};x.prototype.inverse=function(a){var b=a[0]-this.FE_,c=a[1]-this.FN_;a=Math.sqrt(b*b+(this.rho0_-c)*(this.rho0_-c));var d=this.n_>0?1:-1;b=Math.atan(d*b/(d*this.rho0_-d*c));a=(this.C_-a*a*this.n_*this.n_/(this.a_*this.a_))/this.n_;a=this.solve_phi_(a,this.e_,
Math.asin(a/2));return[(b/this.n_+this.lamda0_)/k,a/k]};x.prototype.getCircum=function(){return Math.PI*2*this.a_};x.prototype.getCircum=function(){return Math.PI*2*this.a_};K=new T({wkid:4326});aa=new T({wkid:4269});Q=new F({wkid:102113,semi_major:6378137,central_meridian:0,unit:1});ba=new F({wkid:102100,semi_major:6378137,central_meridian:0,unit:1});B={"4326":K,"4269":aa,"102113":Q,"102100":ba};m.WGS84=K;m.NAD83=aa;m.WEB_MERCATOR=Q;m.WEB_MERCATOR_AUX=ba;z.registerSR=function(a,b){var c=B[""+a];
if(c)return c;if(b instanceof m)c=B[""+a]=b;else{c=b||a;var d={wkt:a};if(a===parseInt(a,10))d={wkid:a};var e=q(c,'PROJECTION["','"]'),f=q(c,"SPHEROID[","]").split(",");if(e!==""){d.unit=parseFloat(q(q(c,"PROJECTION",""),"UNIT[","]").split(",")[1]);d.semi_major=parseFloat(f[1]);d.inverse_flattening=parseFloat(f[2]);d.latitude_of_origin=parseFloat(q(c,'"Latitude_Of_Origin",',"]"));d.central_meridian=parseFloat(q(c,'"Central_Meridian",',"]"));d.false_easting=parseFloat(q(c,'"False_Easting",',"]"));d.false_northing=
parseFloat(q(c,'"False_Northing",',"]"))}switch(e){case "":c=new m(d);break;case "Lambert_Conformal_Conic":d.standard_parallel_1=parseFloat(q(c,'"Standard_Parallel_1",',"]"));d.standard_parallel_2=parseFloat(q(c,'"Standard_Parallel_2",',"]"));c=new w(d);break;case "Transverse_Mercator":d.scale_factor=parseFloat(q(c,'"Scale_Factor",',"]"));c=new E(d);break;case "Albers":d.standard_parallel_1=parseFloat(q(c,'"Standard_Parallel_1",',"]"));d.standard_parallel_2=parseFloat(q(c,'"Standard_Parallel_2",',
"]"));c=new x(d);break;default:throw new Error(e+"  not supported");}if(c)B[""+a]=c}return c};G.prototype.load=function(){var a=this;this.loaded_||o(this.url,{},"",function(b){l(b,a);a.loaded_=true;y(a,"load")})};G.prototype.isInScale=function(a){if(this.maxScale&&this.maxScale>a)return false;if(this.minScale&&this.minScale<a)return false;return true};G.prototype.query=function(a,b,c){if(a){var d=l(a,{});if(a.geometry&&!H(a.geometry)){d.geometry=J(a.geometry);d.geometryType=S(a.geometry);d.inSR=4326}if(a.spatialRelationship){d.spatialRel=
a.spatialRelationship;delete d.spatialRelationship}if(a.outFields&&r(a.outFields))d.outFields=a.outFields.join(",");if(a.objectIds)d.objectIds=a.objectIds.join(",");if(a.time)d.time=ca(a.time,a.endTime);d.outSR=4326;d.returnGeometry=a.returnGeometry===false?false:true;d.returnIdsOnly=a.returnIdsOnly===true?true:false;delete d.overlayOptions;o(this.url+"/query",d,"",function(e){fa(e.features,a.overlayOptions);b(e,e.error);v(c,e)})}};G.prototype.queryRelatedRecords=function(a,b,c){if(a){a=l(a,{});a.f=
a.f||"json";if(a.outFields&&!H(a.outFields))a.outFields=a.outFields.join(",");a.returnGeometry=a.returnGeometry===false?false:true;o(this.url+"/query",a,"",function(d){v(c,d);b(d)})}};n.prototype.loadServiceInfo=function(){var a=this;o(this.url,{},"",function(b){a.init_(b)})};n.prototype.init_=function(a){var b=this;if(a.error)throw new Error(a.error.message);l(a,this);this.spatialReference=a.spatialReference.wkt?z.registerSR(a.spatialReference.wkt):B[a.spatialReference.wkid];if(a.tables!==undefined)o(this.url+
"/layers",{},"",function(c){b.initLayers_(c);o(b.url+"/legend",{},"",function(d){b.initLegend_(d);b.setLoaded_()})});else{b.initLayers_(a);b.setLoaded_()}};n.prototype.setLoaded_=function(){this.loaded_=true;y(this,"load")};n.prototype.initLayers_=function(a){var b=[],c=[];this.layers=b;if(a.tables)this.tables=c;var d,e,f,g;e=0;for(f=a.layers.length;e<f;e++){g=a.layers[e];d=new G(this.url+"/"+g.id);l(g,d);d.visible=d.defaultVisibility;b.push(d)}if(a.tables){e=0;for(f=a.tables.length;e<f;e++){g=a.tables[e];
d=new G(this.url+"/"+g.id);l(g,d);c.push(d)}}e=0;for(f=b.length;e<f;e++){d=b[e];if(d.subLayerIds){d.subLayers=[];a=0;for(c=d.subLayerIds.length;a<c;a++){g=this.getLayer(d.subLayerIds[a]);d.subLayers.push(g);g.parentLayer=d}}}};n.prototype.initLegend_=function(a){var b=this.layers;if(a.layers){var c,d,e,f;d=0;for(e=a.layers.length;d<e;d++){f=a.layers[d];c=b[f.layerId];l(f,c)}}};n.prototype.getLayer=function(a){var b=this.layers;if(b)for(var c=0,d=b.length;c<d;c++){if(a===b[c].id)return b[c];if(H(a)&&
b[c].name.toLowerCase()===a.toLowerCase())return b[c]}return null};n.prototype.getLayerDefs_=function(){var a={};if(this.layers)for(var b=0,c=this.layers.length;b<c;b++){var d=this.layers[b];if(d.definition)a[String(d.id)]=d.definition}return a};n.prototype.hasLoaded=function(){return this.loaded_};n.prototype.getVisibleLayerIds_=function(){var a=[];if(this.layers){var b,c,d;c=0;for(d=this.layers.length;c<d;c++){b=this.layers[c];if(b.subLayers)for(var e=0,f=b.subLayers.length;e<f;e++)if(b.subLayers[e].visible===
false){b.visible=false;break}}c=0;for(d=this.layers.length;c<d;c++){b=this.layers[c];b.subLayers&&b.subLayers.length>0||b.visible===true&&a.push(b.id)}}return a};n.prototype.getInitialBounds=function(){if(this.initialExtent)return this.initBounds_=this.initBounds_||W(this.initialExtent);return null};n.prototype.getFullBounds=function(){if(this.fullExtent)return this.fullBounds_=this.fullBounds_||W(this.fullExtent);return null};n.prototype.exportMap=function(a,b,c){if(a&&a.bounds){var d={};d.f=a.f;
var e=a.bounds,f=e.getSouthWest().lng(),g=e.getNorthEast().lng();if(f>g)f-=180;d.bbox=""+f+","+e.getSouthWest().lat()+","+g+","+e.getNorthEast().lat();d.size=""+a.width+","+a.height;d.dpi=a.dpi;if(a.imageSR)d.imageSR=a.imageSR.wkid?a.imageSR.wkid:"{wkt:"+a.imageSR.wkt+"}";d.bboxSR="4326";d.format=a.format;e=a.layerDefinitions;if(e===undefined)e=this.getLayerDefs_();d.layerDefs=U(e);e=a.layerIds;f=a.layerOption||"show";if(e===undefined)e=this.getVisibleLayerIds_();if(e.length>0)d.layers=f+":"+e.join(",");
else if(this.loaded_&&b){b({href:null});return}d.transparent=a.transparent===false?false:true;if(a.time)d.time=ca(a.time,a.endTime);d.layerTimeOptions=a.layerTimeOptions;if(d.f==="image")return this.url+"/export?"+ia(d);else o(this.url+"/export",d,"",function(h){if(h.extent){h.bounds=W(h.extent);delete h.extent;b(h)}else v(c,h.error)})}};n.prototype.identify=function(a,b,c){if(a){var d={};d.geometry=J(a.geometry);d.geometryType=S(a.geometry);d.mapExtent=J(a.bounds);d.tolerance=a.tolerance||2;d.sr=
4326;d.imageDisplay=""+a.width+","+a.height+","+(a.dpi||96);d.layers=a.layerOption||"all";if(a.layerIds)d.layers+=":"+a.layerIds.join(",");if(a.layerDefs)d.layerDefs=U(a.layerDefs);d.maxAllowableOffset=a.maxAllowableOffset;d.returnGeometry=a.returnGeometry===false?false:true;o(this.url+"/identify",d,"",function(e){var f,g,h;if(e.results)for(f=0;f<e.results.length;f++){g=e.results[f];h=L(g.geometry,a.overlayOptions);g.feature={geometry:h,attributes:g.attributes};delete g.attributes}b(e);v(c,e)})}};
n.prototype.find=function(a,b,c){if(a){var d=l(a,{});if(a.layerIds){d.layers=a.layerIds.join(",");delete d.layerIds}if(a.searchFields)d.searchFields=a.searchFields.join(",");d.contains=a.contains===false?false:true;if(a.layerDefinitions){d.layerDefs=U(a.layerDefinitions);delete d.layerDefinitions}d.sr=4326;d.returnGeometry=a.returnGeometry===false?false:true;o(this.url+"/find",d,"",function(e){var f,g,h;if(e.results)for(f=0;f<e.results.length;f++){g=e.results[f];h=L(g.geometry,a.overlayOptions);g.feature=
{geometry:h,attributes:g.attributes};delete g.attributes}b(e);v(c,e)})}};n.prototype.queryLayer=function(a,b,c,d){(a=this.getLayer(a))&&a.query(b,c,d)};P.prototype.init_=function(a){l(a,this);if(a.spatialReference)this.spatialReference=B[a.spatialReference.wkid||a.spatialReference.wkt]||K;this.loaded_=true;y(this,"load")};P.prototype.findAddressCandidates=function(a,b,c){var d=l(a,{});if(d.inputs){l(d.inputs,d);delete d.inputs}if(r(d.outFields))d.outFields=d.outFields.join(",");var e=this;o(this.url+
"/findAddressCandidates",d,"",function(f){if(f.candidates)for(var g,h,j=[],C=0;C<f.candidates.length;C++){g=f.candidates[C];h=g.location;if(!isNaN(h.x)&&!isNaN(h.y)){h=[h.x,h.y];var D=e.spatialReference;if(a.outSR)D=B[a.outSR];if(D)h=D.inverse(h);g.location=new i.LatLng(h[1],h[0]);j[j.length]=g}}b({candidates:j});v(c,f)})};P.prototype.geocode=function(a,b){this.findAddressCandidates(a,b)};P.prototype.reverseGeocode=function(a,b,c){if(!H(a.location))a.location=J(a.location);a.outSR=4326;var d=this;
o(this.url+"/reverseGeocode",a,"",function(e){if(e.location){var f=e.location;if(!isNaN(f.x)&&!isNaN(f.y)){f=[f.x,f.y];if(d.spatialReference)f=d.spatialReference.inverse(f);e.location=new i.LatLng(f[1],f[0])}}b(e);v(c,e)})};Z.prototype.project=function(a,b,c){var d=ha(a);o(this.url+"/project",d,"callback",function(e){var f=[];if(a.outSpatialReference===4326||a.outSpatialReference.wkid===4326){for(var g=0,h=e.geometries.length;g<h;g++)f.push(L(e.geometries[g]));e.geometries=f}b(e);v(c,e)})};Z.prototype.buffer=
function(a,b,c){var d=ha(a);if(a.bufferSpatialReference)d.bufferSR=N(a.bufferSpatialReference);d.outSR=4326;d.distances=a.distances.join(",");if(a.unit)d.unit=a.unit;o(this.url+"/buffer",d,"callback",function(e){var f=[];if(e.geometries)for(var g=0,h=e.geometries.length;g<h;g++)f.push(L(e.geometries[g],a.overlayOptions));e.geometries=f;b(e);v(c,e)})};ja.prototype.execute=function(a,b,c){var d={};a.parameters&&l(a.parameters,d);d["env:outSR"]=a.outSpatialReference?N(a.outSpatialReference):4326;if(a.processSpatialReference)d["env:processSR"]=
N(a.processSpatialReference);o(this.url+"/execute",d,"",function(e){if(e.results)for(var f,g,h=0;h<e.results.length;h++){f=e.results[h];if(f.dataType==="GPFeatureRecordSetLayer")for(var j=0,C=f.value.features.length;j<C;j++){g=f.value.features[j];if(g.geometry)g.geometry=L(g.geometry,a.overlayOptions)}}b(e);v(c,e)})};ka.prototype.solve=function(a,b,c){if(a){var d=l(a,{});if(r(a.stops))d.stops=ga(a.stops);if(r(a.barriers))if(a.barriers.length>0)d.barriers=ga(a.barriers);else delete d.barriers;d.returnRoutes=
a.returnRoutes===false?false:true;d.returnDirections=a.returnDirections===true?true:false;d.returnBarriers=a.returnBarriers===true?true:false;d.returnStops=a.returnStops===true?true:false;o(this.url+"/solve",d,"",function(e){e.routes&&fa(e.routes.features,a.overlayOptions);b(e);v(c,e)})}};t.prototype.fromLatLngToPoint=function(a,b){if(!a||isNaN(a.lat())||isNaN(a.lng()))return null;var c=this.spatialReference_.forward([a.lng(),a.lat()]),d=b||new i.Point(0,0);d.x=(c[0]-this.originX_)/this.scale_;d.y=
(this.originY_-c[1])/this.scale_;return d};t.prototype.fromLatLngToPoint=t.prototype.fromLatLngToPoint;t.prototype.fromPointToLatLng=function(a){if(a===null)return null;a=this.spatialReference_.inverse([a.x*this.scale_+this.originX_,this.originY_-a.y*this.scale_]);return new i.LatLng(a[1],a[0])};t.prototype.getScale=function(a){a=a-this.minZoom;var b=0;if(this.lods_[a])b=this.lods_[a].scale;return b};t.WEB_MECATOR=new t;A.prototype.init_=function(a){if(this.mapService_.tileInfo){this.projection_=
new t(this.mapService_.tileInfo);this.minZoom=a.minZoom||this.projection_.minZoom;this.maxZoom=a.maxZoom||this.projection_.maxZoom}};A.prototype.getTileUrl=function(a,b){var c=b-(this.projection_?this.projection_.minZoom:this.minZoom),d="";if(!isNaN(a.x)&&!isNaN(a.y)&&c>=0&&a.x>=0&&a.y>=0){var e=this.mapService_.url;if(this.urlTemplate_)e=this.urlTemplate_.replace("["+this.numOfHosts_+"]",""+(a.y+a.x)%this.numOfHosts_);d=this.projection_||(this.map_?this.map_.getProjection():t.WEB_MECATOR);if(!d instanceof
t)d=t.WEB_MECATOR;var f=d.tileSize_,g=1<<b,h=new i.Point(a.x*f.width/g,(a.y+1)*f.height/g);g=new i.Point((a.x+1)*f.width/g,a.y*f.height/g);h=new i.LatLngBounds(d.fromPointToLatLng(h),d.fromPointToLatLng(g));g=this.mapService_.getFullBounds();if(this.mapService_.singleFusedMapCache===false||b>this.dynaZoom){c={f:"image"};c.bounds=h;c.format="png32";c.width=f.width;c.height=f.height;c.imageSR=d.spatialReference_;d=this.mapService_.exportMap(c)}else d=g&&!g.intersects(h)?"":e+"/tile/"+c+"/"+a.y+"/"+
a.x}return d};A.prototype.setOpacity=function(a){this.opacity_=a;var b=this.tiles_;for(var c in b)b.hasOwnProperty(c)&&I(b[c],a)};A.prototype.getOpacity=function(){return this.opacity_};A.prototype.getMapService=function(){return this.mapService_};u.prototype.getTile=function(a,b,c){for(var d=c.createElement("div"),e="_"+a.x+"_"+a.y+"_"+b,f=0;f<this.tileLayers_.length;f++){var g=this.tileLayers_[f];if(b<=g.maxZoom&&b>=g.minZoom){var h=g.getTileUrl(a,b);if(h){var j=c.createElement(document.all?"img":
"div");j.style.border="0px none";j.style.margin="0px";j.style.padding="0px";j.style.overflow="hidden";j.style.position="absolute";j.style.top="0px";j.style.left="0px";j.style.width=""+this.tileSize.width+"px";j.style.height=""+this.tileSize.height+"px";if(document.all)j.src=h;else j.style.backgroundImage="url("+h+")";d.appendChild(j);g.tiles_[e]=j;if(g.opacity_!==undefined)I(j,g.opacity_);else this.opacity_!==undefined&&I(j,this.opacity_)}}}this.tiles_[e]=d;d.setAttribute("tid",e);return d};u.prototype.getTile=
u.prototype.getTile;u.prototype.releaseTile=function(a){if(a.getAttribute("tid")){a=a.getAttribute("tid");this.tiles_[a]&&delete this.tiles_[a];for(var b=0;b<this.tileLayers_.length;b++){var c=this.tileLayers_[b];c.tiles_[a]&&delete c.tiles_[a]}}};u.prototype.releaseTile=u.prototype.releaseTile;u.prototype.setOpacity=function(a){this.opacity_=a;var b=this.tiles_;for(var c in b)if(b.hasOwnProperty(c))for(var d=b[c].childNodes,e=0;e<d.length;e++)I(d[e],a)};u.prototype.getOpacity=function(){return this.opacity_};
u.prototype.getTileLayers=function(){return this.tileLayers_};p.prototype=new i.OverlayView;p.prototype.onAdd=function(){var a=this;this.listeners_.push(i.event.addListener(this.getMap(),"bounds_changed",oa(this.refresh,this)));this.listeners_.push(i.event.addListener(this.getMap(),"dragstart",function(){a.dragging=true}));this.listeners_.push(i.event.addListener(this.getMap(),"dragend",function(){a.dragging=false}));var b=this.getMap();b.agsOverlays=b.agsOverlays||new i.MVCArray;b.agsOverlays.push(this);
M(b);this.map_=b};p.prototype.onAdd=p.prototype.onAdd;p.prototype.onRemove=function(){for(var a=0,b=this.listeners_.length;a<b;a++)i.event.removeListener(this.listeners_[a]);this.overlay_&&this.overlay_.setMap(null);b=this.map_;var c=b.agsOverlays;if(c){a=0;for(var d=c.getLength();a<d;a++)if(c.getAt(a)==this){c.removeAt(a);break}}M(b);this.map_=null};p.prototype.onRemove=p.prototype.onRemove;p.prototype.draw=function(){if(!this.drawing_||this.needsNewRefresh_===true)this.refresh()};p.prototype.draw=
p.prototype.draw;p.prototype.getOpacity=function(){return this.opacity_};p.prototype.setOpacity=function(a){this.opacity_=a=Math.min(Math.max(a,0),1);this.overlay_&&I(this.overlay_.div_,a)};p.prototype.getMapService=function(){return this.mapService_};p.prototype.refresh=function(){if(this.drawing_===true)this.needsNewRefresh_=true;else{var a=this.getMap(),b=a?a.getBounds():null;if(b){var c=this.exportOptions_;c.bounds=b;b=Q;var d=a.getDiv();c.width=d.offsetWidth;c.height=d.offsetHeight;if(!(d.offsetWidth==
0||d.offsetHeight==0)){if((a=a.getProjection())&&a instanceof t)b=a.spatialReference_;c.imageSR=b;y(this,"drawstart");var e=this;this.drawing_=true;if(!this.dragging&&this.overlay_){this.overlay_.setMap(null);this.overlay_=null}this.mapService_.exportMap(c,function(f){e.drawing_=false;if(e.needsNewRefresh_===true){e.needsNewRefresh_=false;e.refresh()}else{if(f.href){if(e.overlay_){e.overlay_.setMap(null);e.overlay_=null}e.overlay_=new R(f.bounds,f.href,e.map_,e.opacity_)}y(e,"drawend")}})}}}};p.prototype.isHidden=
function(){return!(this.visible_&&this.isInZoomRange_())};p.prototype.isInZoomRange_=function(){var a=this.getMap().getZoom();if(this.minZoom!==undefined&&a<this.minZoom||this.maxZoom!==undefined&&a>this.maxZoom)return false;return true};p.prototype.show=function(){this.visible_=true;this.div_.style.visibility="visible";this.refresh()};p.prototype.hide=function(){this.visible_=false;this.div_.style.visibility="hidden"};R.prototype=new i.OverlayView;R.prototype.onAdd=function(){var a=document.createElement("DIV");
a.style.border="none";a.style.borderWidth="0px";a.style.position="absolute";var b=this.map_.getDiv();a.style.width=b.offsetWidth+"px";a.style.height=b.offsetHeight+"px";a.style.backgroundImage="url("+this.url_+")";this.div_=a;b=this.getPanes();I(a,this.op_);b.overlayLayer.appendChild(a)};R.prototype.draw=function(){var a=this.getProjection(),b=a.fromLatLngToDivPixel(this.bounds_.getSouthWest());a=a.fromLatLngToDivPixel(this.bounds_.getNorthEast());var c=this.div_;c.style.left=b.x+"px";c.style.top=
a.y+"px"};R.prototype.onRemove=function(){this.div_.parentNode.removeChild(this.div_);this.div_=null};la.prototype.refresh=function(){M(this.map_)};$.ags={SpatialReference:m,Geographic:T,LambertConformalConic:w,SphereMercator:F,TransverseMercator:E,SpatialRelationship:{INTERSECTS:"esriSpatialRelIntersects",CONTAINS:"esriSpatialRelContains",CROSSES:"esriSpatialRelCrosses",ENVELOPE_INTERSECTS:"esriSpatialRelEnvelopeIntersects",INDEX_INTERSECTS:"esriSpatialRelIndexIntersects",OVERLAPS:"esriSpatialRelOverlaps",
TOUCHES:"esriSpatialRelTouches",WITHIN:"esriSpatialRelWithin"},GeometryType:s,SRUnit:{METER:9001,FOOT:9002,SURVEY_FOOT:9003,SURVEY_MILE:9035,KILLOMETER:9036,RADIAN:9101,DEGREE:9102},Catalog:function(a){this.url=a;var b=this;o(a,{},"",function(c){l(c,b);y(b,"load")})},MapService:n,Layer:G,GeocodeService:P,GeometryService:Z,GPService:function(a){this.url=a;this.loaded_=false;var b=this;o(a,{},"",function(c){l(c,b);b.loaded_=true;y(b,"load")})},GPTask:ja,RouteTask:ka,Util:z,Config:O,Projection:t,TileLayer:A,
MapOverlay:p,MapType:u,CopyrightControl:la};window.gmaps=$})();

		</script>
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
				//var deferreds = getJsons();
			
			    //$.when.apply(null, deferreds).done(function() {
			    //	console.log("all done");
			    //});
				/*
				$.getJSON("map/" + districts_filenames[0] + "_perimeter.json.json", function(data) {
					perimeter.push(data);
				}).done(function(){
					console.log(perimeter.length);
					for(var j = 0; j < perimeter[0].paths.length; j++){
						perimeter[0].paths[j] = perimeter[0].paths[j].split(",");
					}
					perimeter_polylines[0] = map.drawPolyline({
						path: perimeter[0].paths,
						strokeColor: '#131540',
						strokeOpacity: 0.8,
						strokeWeight: 7
					});
				});
				*/
				//var perUrl = 'http://irpsrvgis37.utep.edu/arcgis/rest/services/Texas/Perimeters_joined/MapServer';
				//var plastUrl = 'http://irpsrvgis37.utep.edu/arcgis/rest/services/Texas/PlasTxMap/MapServer';
				var url = 'http://irpsrvgis34.utep.edu/arcgis/rest/services/Texas_plasticity/MapServer';
				
				var plasticity = new gmaps.ags.MapOverlay(url);
				plasticity.setMap(map.map);
				
				/*
				var agsType = new  gmaps.ags.MapType(url,{name:'ArcGIS'});
				console.log(map);
			    map.map.mapTypes.set('arcgis', agsType);
			    map.map.setMapTypeId('arcgis');
				*/
			});
			function getJsons() {
			    var deferreds = [];
			    var district_names = ["amarollo", "EP", "beaumont", "childress", "corpus", "laredo", "lubok", "lufkin", "odesa", "phar", "sanAntonio"];
			    var i;
			    for (i = 0; i < district_names.length; i++) {
			        var count = i;
			
			        deferreds.push(
			        $.getJSON("map/" + district_names[i] + "_perimeter.json.json").success(function(data) {
			            for(var j = 0; j < data.paths.length; j++){
							data.paths[j] = data.paths[j].split(",");
						}
				        map.drawPolyline({
							path: data.paths,
							strokeColor: '#131540',
							strokeOpacity: 0.8,
							strokeWeight: 7
						});
			        }));
			    }
			    
			    return deferreds;
			}
		</script>
	</body>
</html>
