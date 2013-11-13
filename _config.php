<?php


/* startup */


//global $database; $database = "upgradesilverstripe_com";
//global $project; $project = 'upgradenow';
//require_once("conf/ConfigureFromEnv.php");



//===================---------------- START php MODULE ----------------===================
date_default_timezone_set("NZ");
//===================---------------- END php MODULE ----------------===================


//===================---------------- START sapphire MODULE ----------------===================
FulltextSearchable::enable(array("SiteTree"));
if(Director::isLive()) {
	Director::forceWWW();
	SS_Log::add_writer(new SS_LogEmailWriter('ssuerrors@gmail.com'), SS_Log::ERR);
}
//===================---------------- END sapphire MODULE ----------------===================
