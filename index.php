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
				<div class="col-md-9">
					<div id="map"></div>
				</div>
				<div class="col-md-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<center><h3 class="panel-title">Toolbar</h3></center>
						</div>
						<div class="panel-body">
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
					</div>
				</div>
			</div>
		</div>
		<div id="dropdown">
		<select id="target">
			<option value="32.43561304116276,-100.1953125">
				Abilene
			</option>
			<option value="35.764343479667176,-101.49169921875">
				Amarillo
			</option>
			<option value="32.69651010951669, -94.691162109375">
				Atlanta
			</option>
			<option value="30.25391637229704, -98.23212890625">
				Austin
			</option>
			<option value="30.40211367909724, -94.39453125" data-district="beaumont">
				Beaumont
			</option>
			<option value="31.765537409484374, -99.140625">
				Brownwood
			</option>
			<option value="30.894611546632302, -96.30615234375" data-district="bryan">
				Bryan
			</option>
			<option value="34.397844946449865, -100.37109375" data-district="childress">
				Childress
			</option>
			<option value="28.110748760633534, -97.71240234375" data-district="corpus">
				Corpus Christi
			</option>
			<option value="32.54681317351514, -96.85546875">
				Dallas
			</option>
			<option value="30.694611546632302, -104.52392578125">
				El Paso
			</option>
			<option value="32.62087018318113, -97.75634765625">
				Fort Worth
			</option>
			<option value="29.661670115197377, -95.33935546875">
				Houston
			</option>
			<option value="28.613459424004418, -99.90966796875" data-district="laredo">
				Laredo
			</option>
			<option value="33.43144133557529, -101.93115234375" data-district="lubbock">
				Lubbock
			</option>
			<option value="31.203404950917395, -94.7021484375">
				Lufkin
			</option>
			<option value="31.203404950917395, -102.568359375" data-district="odessa">
				Odessa
			</option>
			<option value="33.43144133557529, -95.625">
				Paris
			</option>
			<option value="26.951453083498258, -98.32763671875" data-district="pharr">
				Pharr
			</option>
			<option value="31.10819929911196, -100.48095703125">
				San Angelo
			</option>
			<option value="29.13297013087864, -98.89892578125" data-district="sanAntonio">
				San Antonio
			</option>
			<option value="32.222095840502334, -95.33935546875">
				Tyler
			</option>
			<option value="31.403404950917395, -97.119140625">
				Waco
			</option>
			<option value="33.77914733128647, -98.37158203125">
				Wichita Falls
			</option>
			<option value="29.05616970274342, -96.8115234375">
				Yoakum
			</option>
		</select>
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
function(a,b,c){var d=ha(a);if(a.bufferSpatialReference				)d.bufferSR=N(a.bufferSpatialReference);d.outSR=4326;d.distances=a.distances.join(",");if(a.unit)d.unit=a.unit;o(this.url+"/buffer",d,"callback",function(e){var f=[];if(e.geometries)for(var g=0,h=e.geometries.length;g<h;g++)f.push(L(e.geometries[g],a.overlayOptions));e.geometries=f;b(e);v(c,e)})};ja.prototype.execute=function(a,b,c){var d={};a.parameters&&l(a.parameters,d);d["env:outSR"]=a.outSpatialReference?N(a.outSpatialReference):4326;if(a.processSpatialReference)d["env:processSR"]=
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
			var properties = [
				{value: 'Plasticity', data: 'PI'}
			];
			$('#autocomplete').autocomplete({
				lookup: properties,
				onSelect: function (suggestion) {
				console.log('You selected: ' + suggestion.value + ', ' + suggestion.data);
				}
			});
			//implements local autocomplete for the search mode
					

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
					console.log(map.getCenter());
				});

				var polygons;

				$('#target').change(function (){

					var newlatlng = $(this).children(":selected").val().split(',');

					map.panTo({
						lat : parseFloat(newlatlng[0]),
						lng : parseFloat(newlatlng[1])
					});
					map.setZoom(8);

					var outerCoords = [[38.20365531807148, -108.193359375],
				 					[24.500209937418252, -108.193359375],
				 					[24.500209937418252, -91.6259765625],
				 					[38.20365531807148, -91.6259765625]];



					var childress = [[35.424624268593504,-99.994753999786809],[35.182242414749737,-99.99758121120783],[35.031060501712155,-99.996463019668539],[34.747251385812817,-99.999272115645923],[34.56238769577643,-99.996481169127847],[34.561933178435524,-99.972490221071837],[34.579642321944768,-99.945126573509157],[34.579178688482159,-99.932299301434441],[34.54825138613716,-99.880990225956481],[34.518696823959218,-99.860953840942088],[34.501851372148955,-99.830317454097624],[34.444069506765004,-99.778072002830882],[34.37752406455931,-99.685281124969421],[34.368642277651389,-99.601826485770729],[34.384942239854773,-99.585599275672791],[34.408996857394612,-99.578226554238114],[34.415260481752114,-99.554244657386178],[34.404151348810288,-99.502508282536169],[34.383605870085674,-99.479817421484086],[34.075023994515611,-99.475217354149166],[33.827705850286399,-99.47135370894118],[33.731751230513609,-99.469244582188921],[33.399269412272616,-99.468190013469012],[33.395496591724203,-99.988290132143433],[33.390223853456476,-100.5193266411364],[33.396132920336768,-100.76567217118917],[33.392105684031925,-101.04546316546099],[33.836451198522312,-101.04643589982359],[34.31233313195667,-101.04839961627609],[34.309605793267153,-101.46891786379639],[34.749824020052266,-101.47059067116555],[34.748551379667504,-101.08845413926039],[35.18175142140889,-101.08785421725874],[35.18192413624994,-100.53651767113743],[35.625333359763893,-100.5435996117524],[35.618860659034716,-100.00039939946497],[35.424624268593504,-99.994753999786809]];

					var beaumont = [[31.176532830846803,-93.53719753977542],[31.163132827287786,-93.528506570877639],[31.159360100175142,-93.544370229940384],[31.132632846557257,-93.537688437290825],[31.126123731275236,-93.528270222030571],[31.116269145438931,-93.53527023424472],[31.109541906155535,-93.556861186102765],[31.10073279305136,-93.560161163696094],[31.094950951771313,-93.543297519161968],[31.082569147312846,-93.544288374736169],[31.074869149284243,-93.517179294651896],[31.057178216089785,-93.525924790233375],[31.039105523193573,-93.507397506498535],[31.014341863960468,-93.547297475218144],[31.018260107387853,-93.56512480176481],[31.013123725548038,-93.568070213935385],[30.997469152586191,-93.571024741214615],[30.991887338031088,-93.561133859642041],[30.976378245180928,-93.572633871437688],[30.970387293912296,-93.54885209186952],[30.957087328532605,-93.537515633959316],[30.960932757584967,-93.532370217459146],[30.936023651740921,-93.525797470759514],[30.927169131914287,-93.530161128501476],[30.925087344343591,-93.549797470158509],[30.905532793243388,-93.546697491729702],[30.902132754064038,-93.564652035192267],[30.886432803305745,-93.568679360853977],[30.872078198110852,-93.561024745360498],[30.860487291749145,-93.55297930464765],[30.845350974434844,-93.566624747998532],[30.842541810409344,-93.555824716541665],[30.828550928367598,-93.550861144768447],[30.802241838817963,-93.582052045592448],[30.772387309593551,-93.585352014373498],[30.745996361910205,-93.618633892720283],[30.732214591829024,-93.607833889269131],[30.732750939155032,-93.617970231781342],[30.710532712819582,-93.612588405760818],[30.687005482277964,-93.617788408556052],[30.673069118514785,-93.660170271417428],[30.639896337192933,-93.67815204541202],[30.640250934034654,-93.693061183175061],[30.623632730099082,-93.684770243686614],[30.616005393988782,-93.692879296621555],[30.598041762246169,-93.671761148322176],[30.599041793637451,-93.693597546021394],[30.587587209872385,-93.717988440367449],[30.568359936498418,-93.718061124511522],[30.545723577523965,-93.735488422644224],[30.523069009491099,-93.705642951497964],[30.505323570999735,-93.714815731002858],[30.496450857118507,-93.707452019793948],[30.488832646917825,-93.715033918050125],[30.470250850138925,-93.698152068843186],[30.462723620562098,-93.703597478893869],[30.442841760018826,-93.696752042599613],[30.433187178934098,-93.721715681125374],[30.409032621150565,-93.742733877411609],[30.38199630786276,-93.755124806347396],[30.367623602070964,-93.748006566984543],[30.35435989572068,-93.759515684864496],[30.341078074908275,-93.759352089713417],[30.305123532609066,-93.729952077389896],[30.297596309309732,-93.699379310681749],[30.239587171257956,-93.707533821427248],[30.220514433679515,-93.715015674649095],[30.181078044424353,-93.704533876381049],[30.17588719348155,-93.696333813955818],[30.151023529691575,-93.699833870492284],[30.148441720267051,-93.683315624467866],[30.141468948897565,-93.686133852625446],[30.141441685387136,-93.698806612227614],[30.118141687942156,-93.697097499286983],[30.114950765986432,-93.70855209262325],[30.095887140985511,-93.716033831399287],[30.060732562441238,-93.712652008610362],[30.00617806873267,-93.760370212277024],[29.99086896363589,-93.857452035313358],[29.96482344375022,-93.856506582356303],[29.818587091813974,-93.951942961615444],[29.674796141944231,-93.835133903060964],[29.674305224721401,-94.065588434142015],[29.560132420694703,-94.357188560586209],[29.552205176497576,-94.377197649549174],[29.600368803687289,-94.384606696210767],[29.600323408358136,-94.410361338033368],[29.568141553952071,-94.436161283616102],[29.566623372475057,-94.460424925111113],[29.547705181938422,-94.512615883863617],[29.55421426289962,-94.533897723538573],[29.579232457927723,-94.564634096667163],[29.538796087433784,-94.788288630893874],[29.658750636291973,-94.706625003924373],[29.754796152196501,-94.700479526239079],[29.793214313441318,-94.73593407216066],[29.760086992260554,-94.829625036827537],[29.668768842918553,-94.887370540453787],[29.682441567821897,-94.93279781875188],[29.700077928598652,-94.919097786042357],[29.718941531370664,-94.930034150346415],[29.725087059293106,-94.943870497131655],[29.764814303131505,-94.920379622362532],[29.806677975264932,-94.923079607358247],[29.836568859186873,-94.914925074220676],[29.838732460386154,-94.941652361238738],[29.86044163565375,-94.955079609021794],[29.873041634552205,-94.979606953096848],[29.886950682215829,-94.982979637650885],[29.917232548115972,-95.003279682279725],[29.964659805813834,-94.987743252648258],[29.995505255689814,-95.010679623269496],[30.000287116549512,-95.045225103509722],[30.014759839694481,-95.061252400370222],[30.051459847246491,-95.051652354196094],[30.168914349118932,-95.095361521705087],[30.353314391516118,-95.162788769976217],[30.491087194099912,-94.848288700146043],[30.48978719277687,-94.733670504182442],[30.492296256238323,-94.540725026696691],[30.525632621677509,-94.548061395385091],[31.014378204008924,-94.657470498258235],[31.064032791221802,-94.577725048013818],[31.057496385927799,-94.528434096681821],[31.044441881255871,-94.495625067116436],[31.031460075796748,-94.483134137454712],[31.038214623968223,-94.444179502569781],[31.098060096992718,-94.139861280795159],[31.115660076767437,-94.049188556173789],[31.13850550913731,-94.04001578578287],[31.159341910612394,-93.917961257548043],[31.180396426325967,-93.594124772906611],[31.172332807707299,-93.577124770310903],[31.191123748584332,-93.550770241499251],[31.18596919624024,-93.529106548651939],[31.178269218082697,-93.527115653981511],[31.176532830846803,-93.53719753977542]];

					var sanAntonio = [[30.140023331771207,-98.593807799724758],[29.948114210889194,-98.419007754844571],[30.03931423910144,-98.302816867927405],[29.844386924922084,-98.037934964299822],[29.757705142460939,-98.006871331387032],[29.812650576281641,-97.955580411043229],[29.856832424325443,-97.894498599896693],[29.838686926238115,-97.856553042640485],[29.783459679828862,-97.843262136000092],[29.789986921628135,-97.826262140414187],[29.7562051174584,-97.809271266476799],[29.759514177565698,-97.791307652312284],[29.748705080573025,-97.777934852970546],[29.730668730822089,-97.770007602182744],[29.718895988186123,-97.776634913832368],[29.720795992130647,-97.75766216155823],[29.711805092821891,-97.74372582094847],[29.694396050390509,-97.744198494096381],[29.661741470255024,-97.651625776487592],[29.650532334751986,-97.641971238139604],[29.384705071124799,-97.843116719669197],[29.360314087377166,-97.862062185184584],[29.230159519149051,-97.731680334940862],[28.882204955907635,-98.186871307090769],[28.785686688832872,-98.10115313354018],[28.606423004709256,-98.34211683711149],[28.061632023541573,-98.339371324834744],[28.06100472134581,-98.80705322951593],[28.639250291258165,-98.808198694781368],[28.63680486881675,-99.393671575497009],[28.638277572546691,-99.409735238964316],[29.092723135657241,-99.413307995855448],[29.089214028666287,-100.11503544204047],[29.626532284796259,-100.11579000347753],[29.624759537966924,-100.01399902774486],[29.630505020562033,-99.61992628801886],[29.919977835272608,-99.621753552948761],[29.920195965653434,-99.689680844380419],[30.077677814715855,-99.693308130758055],[30.080132345219415,-99.761362636509688],[30.286496014265484,-99.759180846511796],[30.284605123392922,-99.310671674258018],[30.143205147247745,-99.309744352088202],[30.1378051801589,-98.92278969375829],[30.140023331771207,-98.593807799724758]];

					var pharr = [[27.34893185581759,-98.637189546565409],[27.348404605679285,-98.596844111048085],[27.364550089568613,-98.598107675160719],[27.365895524742562,-98.5607894870667],[27.349295504775313,-98.560562210573266],[27.348986384300467,-98.537580472998343],[27.273340969906545,-98.534789506622204],[27.266959121631295,-98.238925772140703],[27.263859105318794,-98.06242576120718],[27.262859124125974,-97.9848711933776],[27.214904601394579,-97.98498026152879],[27.218722786544205,-97.967543938324823],[27.238804615254836,-97.956871209554166],[27.246586396652486,-97.930153011253822],[27.243859119856104,-97.885825763795992],[27.253995483444502,-97.840162087250519],[27.259240956906265,-97.826252948294197],[27.277559164959097,-97.820171142783892],[27.288040940119604,-97.785025731279319],[27.230531879280978,-97.548434692466685],[27.265459147844286,-97.427489218557824],[27.081877320106202,-97.50377109850001],[26.996840921527536,-97.479271087515528],[26.978195503334526,-97.568834762872825],[26.846395452184048,-97.558325598096715],[26.79412266286759,-97.495843752029515],[26.6013317777645,-97.451962002946019],[26.51857715087138,-97.42612554053683],[26.477159033700307,-97.474980130974188],[26.385413544087275,-97.421452802418912],[26.359413497462867,-97.368961958975092],[26.182804414032631,-97.35362552115933],[26.068677107026883,-97.253380029554748],[26.002640693305707,-97.276580059409866],[26.009431629977588,-97.213352752553774],[25.954931583367216,-97.172480057737957],[25.965486159813477,-97.307407367215518],[25.939022481058146,-97.304698268229018],[25.917386165870717,-97.38125279803144],[25.845722509104483,-97.385907384751334],[25.845558890615099,-97.434616461070831],[25.933595239651524,-97.590361956487115],[25.954531636972746,-97.575207406155002],[25.962358928104521,-97.613198294860695],[26.02380437960699,-97.648243818913784],[26.060504395612934,-97.867716629067019],[26.059758871202956,-98.040362037315433],[26.034986129290825,-98.07663484339227],[26.066113421322292,-98.083507511829055],[26.055740725120405,-98.200989423889652],[26.098467970181222,-98.292244005252599],[26.121249833151779,-98.271653092254368],[26.133167999097623,-98.29257120178616],[26.112004335471067,-98.328234910280798],[26.159040727325454,-98.347489461006759],[26.156386184606347,-98.384825780704318],[26.22126797027197,-98.453698584579882],[26.201895297668319,-98.488825861102725],[26.260804412979393,-98.600280419260628],[26.242413453762023,-98.678225841623302],[26.37542261669984,-98.820144130826506],[26.360677117680098,-98.909207775320269],[26.395658922379138,-98.939580486906536],[26.419877093453909,-99.107044216795998],[26.488677162205185,-99.101789630069646],[26.546068040775101,-99.168998743465821],[26.580222640111021,-99.166135059536359],[26.857686291733092,-99.285844224970788],[26.946949984600867,-99.390844307638631],[26.995868145604685,-99.393044216686889],[27.02895901991139,-99.455389737778262],[27.199504553172215,-99.437480598194441],[27.270195466495458,-99.465598803121722],[27.308386353005456,-99.371435173213953],[27.271295440351423,-99.335471514368265],[27.271013652773057,-98.958380549015061],[27.273577273911901,-98.808835022560061],[27.361150077767466,-98.808125997427553],[27.363686406155715,-98.637462276381569],[27.34893185581759,-98.637189546565409]];

					var odessa = [[32.522678174591832,-101.69038146814626],[32.090541760040971,-101.69477235615373],[32.088396307429456,-101.77478137735523],[31.651923516523098,-101.77214499806622],[31.088068868087575,-101.77319955428553],[31.087023407013479,-102.30314509199539],[31.086141511977278,-102.3880633628859],[31.065605179234073,-102.32229056775111],[31.052932438840834,-102.31659061073348],[31.050959750970318,-102.3015905592712],[31.039668857178832,-102.29539060282296],[31.042896062196057,-102.24902688850678],[31.029687005771116,-102.2016814413935],[31.003886968579,-102.18924511014859],[31.014150629801641,-102.17830877618172],[31.005686993604055,-102.16740871345556],[31.000659768758606,-102.12030871566027],[30.991696079526598,-102.1109996117211],[30.989568803254151,-102.07839966024615],[31.000905147744216,-102.05840871040174],[30.981905167166165,-101.97256327898286],[30.957296120798908,-101.94316325612104],[30.954832498892799,-101.92710867513837],[30.925632421944904,-101.89815407697751],[30.918323322269845,-101.87079961055981],[30.879877916001025,-101.87470869819673],[30.864286998371956,-101.8503813283083],[30.839368784752178,-101.83756314657438],[30.762796066881926,-101.82413591792373],[30.737032399945242,-101.80653587939698],[30.703714272445993,-101.80313588358638],[30.664659656237443,-101.75869953195426],[30.652514190568692,-101.74621772298455],[30.648841479323686,-101.68822677539717],[30.62656881794377,-101.64952675519106],[30.58854149437472,-101.65459951129556],[30.5640323989008,-101.64241765233204],[30.541514249641637,-101.64939945022584],[30.520568752949117,-101.67391771027926],[30.503259648145043,-101.66931770330422],[30.488823265634878,-101.68599041838544],[30.459432338314048,-101.69386315254252],[30.468205076406111,-101.71843583066061],[30.463496053633197,-101.7268176576782],[30.445859609312425,-101.71426317210108],[30.42128695401221,-101.73493584010284],[30.402286912768659,-101.69215404134434],[30.381250505140851,-101.6917267514205],[30.357123302342533,-101.65363589905807],[30.348923281376408,-101.65135401310037],[30.343977781861874,-101.70577220385196],[30.318768718493065,-101.73753589991587],[30.286077803633354,-101.75059946898753],[30.284114142570086,-101.75902677425145],[29.787368611708732,-101.7594994640707],[29.780204999417801,-101.80561770668677],[29.814332252885915,-101.81950861837007],[29.788704975710065,-101.92463592685921],[29.818977728875424,-101.97373585245246],[29.78477768508494,-102.06440865083395],[29.880314103995772,-102.32476324934154],[29.921041382572671,-102.39017241132996],[30.060132288268079,-102.57729056119702],[30.667959623687082,-103.44334535545896],[30.770905093704023,-103.58611814362352],[31.109596014744138,-104.10369094976855],[32.007405313301916,-104.01930917753333],[32.006023498760939,-103.98138188643814],[32.006232549066659,-103.72945461292333],[32.004287145145483,-103.33255450306643],[32.002032621428434,-103.05842721109943],[32.085123560109373,-103.0556453428932],[32.515550906483554,-103.06002716599863],[32.522469055718389,-102.20594517564825],[32.522678174591832,-101.69038146814626]];

				 	var bryan = [[31.881569220300303,-96.022289099295222],[31.874587417557535,-95.992943585388133],[31.881869261900352,-95.979616354813075],[31.877687443053713,-95.964716337403715],[31.848878332968059,-95.988825488351779],[31.824169259648862,-95.974416311896491],[31.793641972793338,-95.975952763876805],[31.769787374335511,-95.92214360243139],[31.770551027464954,-95.892989011880942],[31.759587406598328,-95.893016279915827],[31.752296482358162,-95.868598132708385],[31.740369175567889,-95.879443545107193],[31.730878267162876,-95.869689034592355],[31.697414622821871,-95.866025414062662],[31.698651024366875,-95.825561766404306],[31.680887375109627,-95.802243575515945],[31.696078333015283,-95.793370862762288],[31.692005554987279,-95.782270809253575],[31.659932877639239,-95.791489032991791],[31.625151043482351,-95.789543611560603],[31.607078254234569,-95.770570858463202],[31.609805536421302,-95.758052616019143],[31.648114681879754,-95.756570845190112],[31.653032830764648,-95.741779907558126],[31.650651035170085,-95.727370840336278],[31.632278292962759,-95.712734445005879],[31.602096454138451,-95.711652623261713],[31.585369165772281,-95.728134437519415],[31.565860068232208,-95.719498123633855],[31.556596482652985,-95.752243524300653],[31.540869141538312,-95.75898901130509],[31.516641934096238,-95.734461736367152],[31.497778293986002,-95.74298899917342],[31.483860087445105,-95.725452671961534],[31.47754188015244,-95.72739807974294],[31.476660045538374,-95.740334485621247],[31.4658600885647,-95.744661733950764],[31.460541865471118,-95.73688904606216],[31.467096459431577,-95.729025374951135],[31.46440555274037,-95.718425370532827],[31.387705508463632,-95.696179932148809],[31.374587358851414,-95.687761719330183],[31.364969144555904,-95.663598100348509],[31.349978214868628,-95.67780717412829],[31.345541876400389,-95.657670793607579],[31.329450923970953,-95.655307127417998],[31.32106001749694,-95.674534435404624],[31.295050987277271,-95.675388993426225],[31.300123682743116,-95.700307155145268],[31.273559997401371,-95.722616240017189],[31.241614612738349,-95.723761680351615],[31.221705504673825,-95.740879881579033],[31.200450901360238,-95.74681625227916],[31.16149636501936,-95.732270783479606],[31.155923605987521,-95.753961707997789],[31.134523614819408,-95.78022533981553],[31.10338727212137,-95.766870838879953],[31.092069112650229,-95.757843490604287],[31.084460017180991,-95.726152638134266],[31.078487247751013,-95.678352645020695],[31.082632701639159,-95.655679910344062],[31.060814509656019,-95.647225319660151],[31.056096377765908,-95.631979888696534],[31.040332696722778,-95.626416234642363],[31.041087263123071,-95.645616200490764],[31.032196355875573,-95.663725299039228],[31.01518726168025,-95.661425347208052],[30.991041781417611,-95.675534441870909],[30.937187204002925,-95.643170716044722],[30.93338727503566,-95.627888945159498],[31.059823666318852,-95.440425252871194],[30.94453271619938,-95.439416188221273],[30.931469083346343,-95.42199796695607],[30.908014549670629,-95.419052494677018],[30.893632658871123,-95.392116150353203],[30.889905402018314,-95.40139793376234],[30.870459926030687,-95.40676165779945],[30.861305395662278,-95.373688905905894],[30.866932726110328,-95.35522518366038],[30.878032735936369,-95.347134337172434],[30.871314504436327,-95.328843367683874],[30.519314421574087,-95.359561584248311],[30.521768960286998,-95.597852514979436],[30.634123503833411,-95.827334402644809],[30.352114381283155,-95.801943552940628],[30.246959789003316,-95.80626169783767],[30.223959781319977,-96.101543551593053],[30.211596193886383,-96.114298139535009],[30.221014336693766,-96.121789054529557],[30.209823465193566,-96.141879905814747],[30.214032527112437,-96.157543613666775],[30.193977974695166,-96.17329812408984],[30.143432509033417,-96.155561795802072],[30.141005213308816,-96.164661803595195],[30.151141638879217,-96.179516282740039],[30.137996175866554,-96.183289004808728],[30.134468910680141,-96.200361757640735],[30.118096167262919,-96.190552651206275],[30.107396187336388,-96.198970881197624],[30.104114346461696,-96.170598145047066],[30.097014360541621,-96.16406179395365],[30.083387024261178,-96.167334517536588],[30.085341631059038,-96.157743628903262],[30.073814320792327,-96.142443534740863],[30.06655070064982,-96.157561730284144],[30.05765067007437,-96.17804363363993],[30.074187020286555,-96.245379981228297],[30.071068901357421,-96.261352710939946],[30.078432536230402,-96.275807219839592],[30.097723438063458,-96.277579943756194],[30.094532496608554,-96.291443648246471],[30.100305268978271,-96.299643584729409],[30.058768819973213,-96.571216426210356],[30.058687049472326,-96.583361846869948],[30.072987021570079,-96.601252791261558],[30.053196111493765,-96.627925471762211],[30.072523373168192,-96.645607342481384],[30.110768861747804,-96.638234657317838],[30.124741561455242,-96.660907372791229],[30.14943246992684,-96.659907375143206],[30.145677929589763,-96.687007334422802],[30.170696186324179,-96.696561860325147],[30.155150689554077,-96.712507355728732],[30.143796169966137,-96.777416500421069],[30.154868844088355,-96.780152876462978],[30.164605190816808,-96.799852888959265],[30.1940597730535,-96.758534602783982],[30.239387085691185,-96.742998304199148],[30.247159795701865,-96.712007356293341],[30.270687067532833,-96.672443720858212],[30.302014354579669,-96.648943738860112],[30.326714336346221,-96.708825546714877],[30.331132554682501,-96.749416487053097],[30.378459797536063,-96.771380152140097],[30.403950720367558,-96.797943784033137],[30.433041673071575,-96.854589230097929],[30.461750720745769,-96.882661984081949],[30.465941659147603,-96.901589280836916],[30.492368920823345,-96.897407447698512],[30.534096219488529,-96.917052879202487],[30.566623524423246,-96.968398359028853],[30.472359842896278,-97.156452932673275],[30.745632582098498,-97.274107519668135],[30.761305337660726,-97.316698410707815],[30.902641690119072,-97.26406213158802],[30.9980144797794,-97.078834722692903],[31.119778129857025,-96.836025615979921],[31.113187268787652,-96.829334690995836],[31.230141790331793,-96.596689161918675],[31.367505510748515,-96.318989131714815],[31.378087292932179,-96.321189155784197],[31.420414591015462,-96.234461846926195],[31.80625098482917,-96.502225614763375],[32.015796504534897,-96.049698243549983],[31.986278318550607,-96.053852735058371],[31.96811467911348,-96.043398243124301],[31.964832900728791,-96.053825518753584],[31.955187448770044,-96.052143651252109],[31.954387430790526,-96.016516371085203],[31.923196500631644,-95.99916176630822],[31.912278354262821,-96.000243591816428],[31.89126924159731,-96.025589075234748],[31.881569220300303,-96.022289099295222]];

				 	var lubbock = [[33.392105684031925,-101.04546316546099],[32.955241978056058,-101.04187225613175],[32.952596498865958,-101.17359040708018],[32.956605514590343,-101.56077235908862],[32.955278310252325,-101.6864996615997],[32.522678174591832,-101.69038146814626],[32.522469055718389,-102.20594517564825],[32.515550906483554,-103.06002716599863],[32.953641823710782,-103.04933634501491],[33.377832848455867,-103.04310910227439],[33.565851028175103,-103.03874542353716],[33.826187426530964,-103.03326368691955],[34.307823894234062,-103.02965459532055],[34.745342132311585,-103.02266371015591],[34.753333126556399,-102.51814544464226],[34.748951258679398,-102.1699453632514],[34.752524035208459,-101.99435435519253],[34.753187642036188,-101.6284360727841],[34.749824020052266,-101.47059067116555],[34.309605793267153,-101.46891786379639],[34.31233313195667,-101.04839961627609],[33.836451198522312,-101.04643589982359],[33.392105684031925,-101.04546316546099]];

					var laredo = [[30.287786925272581,-100.69113557034117],[29.622105004674193,-100.69134469300545],[29.626532284796259,-100.11579000347753],[29.089214028666287,-100.11503544204047],[29.092723135657241,-99.413307995855448],[28.638277572546691,-99.409735238964316],[28.63680486881675,-99.393671575497009],[28.639250291258165,-98.808198694781368],[28.06100472134581,-98.80705322951593],[28.061632023541573,-98.339371324834744],[28.060941162372696,-98.238943970093857],[27.266959121631295,-98.238925772140703],[27.273340969906545,-98.534789506622204],[27.348986384300467,-98.537580472998343],[27.349295504775313,-98.560562210573266],[27.365895524742562,-98.5607894870667],[27.364550089568613,-98.598107675160719],[27.348404605679285,-98.596844111048085],[27.34893185581759,-98.637189546565409],[27.363686406155715,-98.637462276381569],[27.361150077767466,-98.808125997427553],[27.273577273911901,-98.808835022560061],[27.271013652773057,-98.958380549015061],[27.271295440351423,-99.335471514368265],[27.308386353005456,-99.371435173213953],[27.270195466495458,-99.465598803121722],[27.318959095651479,-99.543917044366026],[27.491059116854796,-99.49081705952274],[27.504586462902108,-99.527071561971923],[27.612922855310888,-99.549517055281825],[27.661850069076863,-99.714826160110078],[27.780395602778231,-99.816062607060246],[27.797977380988346,-99.875071661632433],[27.987168341767021,-99.94219900020137],[28.003741054626108,-99.993653484846703],[28.154559224613976,-100.09727177734263],[28.202213781094262,-100.21442636695888],[28.241732032170443,-100.22381724873006],[28.28062289441235,-100.29827179878616],[28.320632060983826,-100.29324454130699],[28.394450209826214,-100.35192632036838],[28.478913904759818,-100.37712633577155],[28.501077469834428,-100.34616275706436],[28.54445930223034,-100.41989001811612],[28.589995694961317,-100.40353542980665],[28.661250283636214,-100.49827186045013],[28.894477552173917,-100.59015368699792],[28.922604886465255,-100.64759006590479],[29.080313943659799,-100.66914467989066],[29.166813966070531,-100.76898103034448],[29.242741236166381,-100.79736287551169],[29.373486738767287,-101.00943568326704],[29.47377768443555,-101.06774478772689],[29.526695824797766,-101.26181754824515],[29.628968628379234,-101.25498119575396],[29.581132238566742,-101.30932666991605],[29.652650411788802,-101.30625388493283],[29.657377667674599,-101.36879939264524],[29.745641347409887,-101.41649943731153],[29.770114099378027,-101.4016721027543],[29.760795926758114,-101.44882670487701],[29.788895900933287,-101.47086305572982],[29.763223202563683,-101.53874490942779],[29.810323194689939,-101.54435400593226],[29.76535951634698,-101.58189038744456],[29.757168573789148,-101.64007214213935],[29.787368611708732,-101.7594994640707],[30.284114142570086,-101.75902677425145],[30.286077803633354,-101.75059946898753],[30.287650533791105,-100.95400843071836],[30.287786925272581,-100.69113557034117]];

				 	var corpus = [[29.007750450147434,-97.76010756559586],[28.816459436210881,-97.576016566804981],[28.925414078683211,-97.423489325447065],[28.915168593782916,-97.398307471276169],[28.917159530713061,-97.385752929252178],[28.904150396113021,-97.37939836129199],[28.887777716398006,-97.329962011494459],[28.874323103309393,-97.32414382922282],[28.868423160796787,-97.30873473382789],[28.844841322407319,-97.30220740636733],[28.841877695033897,-97.257589266366836],[28.852695893291713,-97.249425662271662],[28.8522413008181,-97.231761969963202],[28.867150371524264,-97.240116523376471],[28.866877651299927,-97.229716479449039],[28.837504923318818,-97.194807443370109],[28.813059492857153,-97.190952900982566],[28.777923120935181,-97.164580110285087],[28.746314027140219,-97.167725638279606],[28.734677642544874,-97.179543790566385],[28.726986730530172,-97.166307391187189],[28.593550324730383,-97.176498309762891],[28.580741272554331,-97.161380169304351],[28.53878666439131,-97.156052871420755],[28.547304930020648,-97.113789184231237],[28.529904881363962,-97.082271040731172],[28.540368547583718,-97.078280094131685],[28.537577641201352,-97.060243746435489],[28.543086733458477,-97.060043733155055],[28.526641228777514,-97.047152808029153],[28.525150344851721,-97.026480135693632],[28.510804880999853,-97.022843780877039],[28.499650363001489,-96.953316454636848],[28.481768552263418,-96.922889129353663],[28.484232142180929,-96.912443700493299],[28.493886665303101,-96.912607360740878],[28.501795810811089,-96.899880026258856],[28.465723069680468,-96.845298191638605],[28.447059415023631,-96.83616181911006],[28.428950368940058,-96.814589113108028],[28.446541217118593,-96.788607259537386],[28.411195761202013,-96.759370973855994],[28.391913964439095,-96.775625472690564],[28.405286661138437,-96.853761902954005],[28.352759364641809,-96.788498247017273],[28.313150297828049,-96.786543693105699],[28.271659383769538,-96.793607338330133],[28.211741192322062,-96.80396186416948],[28.114650227106182,-96.951180040257682],[28.257086661481384,-96.912989101913951],[28.211041214530315,-96.975580115580627],[28.187068433444907,-96.941343671090806],[28.115341152446547,-96.975380113433189],[28.137695697962492,-97.033889140844579],[28.200086678027482,-97.023843758015303],[28.130723021582764,-97.132116452267894],[28.162104770859717,-97.135689189493675],[28.159750267397204,-97.168270986284256],[28.116677548190147,-97.157334647701106],[28.065022965554355,-97.260561961767067],[28.048950249002836,-97.241507360922583],[28.026232056695314,-97.270571060608177],[28.040822994387661,-97.236489234910877],[28.054568414636122,-97.123352811349974],[28.108050225672422,-97.026680087194777],[28.020541128002066,-97.024080098837899],[27.915695669039263,-97.114898242625188],[27.812532028344535,-97.195743787218191],[27.822632012385039,-97.247298328169862],[27.831422943990596,-97.213616464153247],[27.871450234768879,-97.283761960134143],[27.84025932732656,-97.361325570207242],[27.873486578301968,-97.345898368415675],[27.853268401804893,-97.479634737281586],[27.875777496252862,-97.496962020616365],[27.863932038147738,-97.521980200333928],[27.843550158981163,-97.499816583412866],[27.820586538698727,-97.480089308570413],[27.831731988369373,-97.388816556518435],[27.771150156128485,-97.396834726617996],[27.71254111191783,-97.318071004521983],[27.715641104152002,-97.349789272854537],[27.690950130594977,-97.320289261842547],[27.641113798449769,-97.353643796285027],[27.633504700451372,-97.399489273975377],[27.63175921938722,-97.347780185706753],[27.708177467282319,-97.309489229071502],[27.689150140591977,-97.250071079302174],[27.562641003640827,-97.331734700379386],[27.321350088961619,-97.412534690752665],[27.319995571415909,-97.500707471136494],[27.439531906014064,-97.507816550976827],[27.344422844623825,-97.528661965699555],[27.300459198925886,-97.600389290552627],[27.419986485056846,-97.750353003814752],[27.294695518118129,-97.680289353876603],[27.288040940119604,-97.785025731279319],[27.277559164959097,-97.820171142783892],[27.259240956906265,-97.826252948294197],[27.253995483444502,-97.840162087250519],[27.243859119856104,-97.885825763795992],[27.246586396652486,-97.930153011253822],[27.238804615254836,-97.956871209554166],[27.218722786544205,-97.967543938324823],[27.214904601394579,-97.98498026152879],[27.262859124125974,-97.9848711933776],[27.263859105318794,-98.06242576120718],[27.266959121631295,-98.238925772140703],[28.060941162372696,-98.238943970093857],[28.061632023541573,-98.339371324834744],[28.606423004709256,-98.34211683711149],[28.785686688832872,-98.10115313354018],[28.882204955907635,-98.186871307090769],[29.230159519149051,-97.731680334940862],[29.118086821635561,-97.618916677103797],[29.007750450147434,-97.76010756559586]];


					var district  = $(this).children(":selected").data('district');

					if(polygons){
						polygons.setMap(null);
					}

				 	switch(district){
				 		case "childress":
				 			var innerCoords = childress;
				 			break;
				 		case "beaumont":
				 			var innerCoords = beaumont;
				 			break;
				 		case "sanAntonio":
				 			var innerCoords = sanAntonio;
				 			break;
				 		case "pharr":
				 			var innerCoords = pharr;
				 			break;
				 		case "odessa":
				 			var innerCoords = odessa;
				 			break;
				 		case "bryan":
				 			var innerCoords = bryan;
				 			break;
				 		case "lubbock":
				 			var innerCoords = lubbock;
				 			break;
				 		case "laredo":
				 			var innerCoords = laredo;
				 			break;
				 		case "corpus":
				 			var innerCoords = corpus;
				 			break;
				 	}

					polygons = map.drawPolygon({
					  map: map.map,
					  paths: [outerCoords, innerCoords], // polygons shape
					  strokeColor: '#000000',
					  strokeOpacity: 1,
					  strokeWeight: 2,
					  fillColor: '#999999',
					  fillOpacity: 0.3,
					  Visible: true
					});
				});

				var perUrl = 'http://irpsrvgis37.utep.edu/arcgis/rest/services/Texas/Perimeters_joined/MapServer';

				var url = 'http://irpsrvgis34.utep.edu/arcgis/rest/services/Texas/Stickiness_state/MapServer';
//				var url = "https://services.arcgis.com/V6ZHFr6zdgNZuVG0/arcgis/rest/services/Puget_Sound_BG_demographics/FeatureServer/0";
				var plasticity = new gmaps.ags.MapOverlay(url);
				var perimeter = new gmaps.ags.MapOverlay(perUrl);
				plasticity.setMap(map.map);
				perimeter.setMap(map.map);


				/*
				var agsType = new  gmaps.ags.MapType(url,{name:'ArcGIS'});
				console.log(map);
			    map.map.mapTypes.set('arcgis', agsType);
			    map.map.setMapTypeId('arcgis');
			    */

				
			});
		</script>
	</body>
</html>
