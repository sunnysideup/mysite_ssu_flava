<?php


global $project; $project = 'mysite';
global $database; $database  = 'sunnysideup_co_nz';
require_once("conf/ConfigureFromEnv.php");




//===================---------------- START php MODULE ----------------===================
date_default_timezone_set('Pacific/Auckland');
//===================---------------- END php MODULE ----------------===================




//===================---------------- START sapphire MODULE ----------------===================
i18n::set_locale('en_NZ');
FulltextSearchable::enable(array("SiteTree"));
if(Director::isLive()) {
	Director::forceWWW();
	SS_Log::add_writer(new SS_LogEmailWriter('ssuerrors@gmail.com'), SS_Log::ERR);
}
//===================---------------- END sapphire MODULE ----------------===================
