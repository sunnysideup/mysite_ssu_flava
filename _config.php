<?php


global $project; $project = 'mysite';
global $database; $database  = 'silverstripe_webdevelopment_com';
require_once("conf/ConfigureFromEnv.php");




//===================---------------- START php MODULE ----------------===================
date_default_timezone_set('Pacific/Auckland');
//===================---------------- END php MODULE ----------------===================




//===================---------------- START sapphire MODULE ----------------===================
FulltextSearchable::enable(array("SiteTree"));
if(Director::isLive()) {
	Director::forceWWW();
	SS_Log::add_writer(new SS_LogEmailWriter('ssuerrors@gmail.com'), SS_Log::ERR);
}
else {
	BasicAuth::protect_entire_site();
}

//===================---------------- END sapphire MODULE ----------------===================
