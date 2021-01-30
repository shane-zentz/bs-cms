<?php
/* BS-CMS (c) 2020 by Shane Zentz ...
   This is the entry point for all front end pages of the CMS ...
   UPDATED...
*/

// Include router class, theme class, menu class...
include('Route.php');
require_once('admin/themeClass.php');
require_once('admin/menuClass.php');
require_once('admin/settingsClass.php');
$menu = new Menu();
$dir = 'themes';
$themeTest = new Theme($dir);
$themeTest->getTheme($dir);
$settings = new Settings();

// get the requested URI...
$request = $_SERVER['REQUEST_URI'];
//echo 'Request uri: '.$request.'<br>';

// the Document Root 
$docROOT = dirname($_SERVER['PHP_SELF']);
//echo 'Doc Root: '.$docROOT.'<br>';
//remove the doc root from the request URI
$requestURL = str_replace($docROOT, "", $request);
//echo 'Request URL: '.$requestURL.'<br>';

// Add base route (startpage)
//This is for the homepage, this is the only route to the homepage, it is always index 0 in the
// pages.xml database file...
Route::add('/',function(){
	
$favicons = $GLOBALS["settings"]->getFavicon();
	
$xml2 = simplexml_load_file('admin/database/pages.xml');

$list2 = $xml2->page;

// since the homepage will always be index 0, just get the first entry in the pages.xml file...
for ($i = 0; $i < 1; $i++) {
	$check2 = $list2[$i]->pageURL;
	
	echo $GLOBALS["themeTest"]->getThemePart('includes','header.php');
	
	echo '<title> ' . $list2[$i]->metaTitle . '</title><meta name="description" content="' . $list2[$i]->metaDescription . '">';
	
	// get the favicon, need to add admin/ to the file path 
	echo '<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="admin/'.$favicons.'">';

	echo '</head><body>';	

// get the built in menu -> if you don't want to use the built in menu, simply comment this line out
// and, for example add php include (includes/menu.php) to the header file of your theme............
// or something like: echo $GLOBALS["themeTest"]->getThemePart('includes','navigation.php');
echo $GLOBALS["menu"]->getMenu2();

// get the template used (if any)
echo $GLOBALS["themeTest"]->getTemplatePart($list2[$i]->template);

// get the body contents for the homepage, decode it and echos it...
echo base64_decode($list2[$i]->bodyContents);

/* try to add the trackin */
$file = 'admin/database/visitors.txt';
$ip = $_SERVER['REMOTE_ADDR'];
$filename = $dir.'/'.$file;
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//Filename: '.basename($_SERVER['PHP_SELF']).'
$info = '
===========================
IP: '.$ip .'
Time: '.date("d/m/Y H:i:s a").'
Filename: '.basename($_SERVER[REQUEST_URI]).'
URL: '.$url.'
';
file_put_contents($file, $info, FILE_APPEND);

// get the footer of the current theme...
echo $GLOBALS["themeTest"]->getThemePart('includes','footer.php');

}

});

// first need to find out if page requested exists in pages.xml, if so add the route,
// if not then do not add the route and 404 shouldst be triggered...
// first get an array with all the page uris
// load the main pages database xml file...
$xml2 = simplexml_load_file('admin/database/pages.xml');

$lists = $xml2->page;

// go through the entire list of pages to find the requested one...
for ($i = 0; $i < count($lists); $i++) {
	$checks = $lists[$i]->pageURL;

// next go through whole array to see if $GLOBALS["requestURL"] is in it...
//echo 'Check: '.trim($checks).'  ...  request: /'.trim($request).'<br>';
if (strcmp(trim($checks),trim($request))===0) {
	//echo 'TRUE: <br><br>';
// if so, then...
// get route example to get any page except homepage...
Route::add($request,function(){
	showPage($request);
},'get');
}

}

// Post route any other page except homepage...
/*
Route::add($request,function(){
	showPage($requestURL);
},'post');
*/

// anonomous function to find the requested page...
function showPage($names){
	$favicons = $GLOBALS["settings"]->getFavicon();
	$pageFound = false;
// load the main pages database xml file...
$xml = simplexml_load_file('admin/database/pages.xml');

$list = $xml->page;

// go through the entire list of pages to find the requested one...
for ($i = 0; $i < count($list); $i++) {
	$check = $list[$i]->pageURL;
    // if the requested url is found...
	if (strcmp(trim($check),trim($GLOBALS["request"]))===0) {
		//echo 'CHECK: '.trim($check).' = '.trim($GLOBALS["request"]);
	$pageFound = true;
	echo $GLOBALS["themeTest"]->getThemePart('includes','header.php');
	
	echo '<title> ' . $list[$i]->metaTitle . '</title><meta name="description" content="' . $list[$i]->metaDescription . '">';
	
	// get the favicon, need to add admin/ to the file path 
	echo '<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="../admin/'.$favicons.'">';
	
	echo '</head><body>';
		

// get the built in menu -> if you don't want to use the built in menu, simply comment this line out
// and, for example add php include (includes/menu.php) to the header file of your theme............
// or something like: echo $GLOBALS["themeTest"]->getThemePart('includes','navigation.php');
echo $GLOBALS["menu"]->getMenu2();

// get the template for the current page (if any)...
echo $GLOBALS["themeTest"]->getTemplatePart($list[$i]->template);
	
// the body contents from the database file...	
echo base64_decode($list[$i]->bodyContents);

if ($list[$i]->index == 1)
{ include('humanSitemap.txt');  }
	
/* try to add the trackin */
$file = 'admin/database/visitors.txt';
$ip = $_SERVER['REMOTE_ADDR'];
$filename = $dir.'/'.$file;
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//Filename: '.basename($_SERVER['PHP_SELF']).'
$info = '
===========================
IP: '.$ip .'
Time: '.date("d/m/Y H:i:s a").'
Filename: '.basename($_SERVER[REQUEST_URI]).'
URL: '.$url.'
';
file_put_contents($file, $info, FILE_APPEND);


echo $GLOBALS["themeTest"]->getThemePart('includes','footer.php');
	
	}

}
if (!pageFound) {header("HTTP/1.0 404 Not Found");echo '<h1>404</h1>';}
}

Route::run('/');

?>