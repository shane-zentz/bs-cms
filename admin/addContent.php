<?php
/* BS-CMS (c) 2020 by Shane Zentz
   This file is for processing/adding the content from the create a page form/editor,
   if all goes right, the new page will be added to the page.xml database file......
*/
session_start();

if (!isset($_SESSION['nID']))
{
    header("Location: admin-login.php");
    die();
} 

require_once('activityClass.php');
require 'sitemapClass.php';

$file = 'database/pages.xml';
$xml = simplexml_load_file($file);

$act = new Activity();

// get post data sent into variables first:
$pageName = $_POST['pageName'];                   // page name
$template = $_POST['Template'];                   // template to use
$metaTitle = $_POST['metaTitle'];                 // meta title
$metaDescription = $_POST['metaDescription'];     // meta description
$bodyContent = base64_encode( $_POST['pageBody'] );  // body contents
$pageUrl = $_POST['pageUrl'];                     // page url

// get the index of the last element in the xml file, then increment for the 
// inserted element...
$count = count($xml);
if ($count == 0) {$index = 0;}
else {
$last_item = $xml->page[$count-1];
$last_index = (int) $last_item->index;
$index = $last_index + 1;
}

// function to check if users created page name and/or url already exists in file...
function pageAlreadyExists($xml, $pageName, $pageUrl){
	$exists = false;
	foreach($xml as $list => $val){
		if (($val->pageTitle == $pageName) || ($val->pageURL == $pageUrl)){
			$exists = true;
		}
	}
	  
	return $exists;
}




// add logic test to make sure page name / url does not already exist

if (!pageAlreadyExists($xml, $pageName, $pageUrl))
{

// if page name is unique && url is unique then add the page...
$entry = $xml->addChild('page');
$entry->addChild('index', $index);
$entry->addChild('pageTitle', $pageName);
$entry->addChild('metaTitle', $metaTitle);
$entry->addChild('metaDescription', $metaDescription);
$entry->addChild('pageURL', $pageUrl);
$entry->addChild('template', $template);
$entry->addChild('bodyContents', $bodyContent);



$xml->asXML($file);
$act->addActivity($_SESSION['username'], "New page created: ".$pageName);
$sitemap = new Sitemap();
$sitemap->generateSitemap();
$sitemap->generateHumanSitemap();
header("refresh:2; index.php"); // really should be a fully qualified URI
echo '<script type="text/javascript">alert("Content Added...");</script>';
}

else // the page already exists
{
header("refresh:2; index.php"); // really should be a fully qualified URI
echo '<script type="text/javascript">alert("That Page Name or Url already exists... Please try again...");</script>';
}

?>