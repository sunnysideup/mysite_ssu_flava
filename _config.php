<?php


/* startup */


//global $database; $database = "upgradesilverstripe_com";
//global $project; $project = 'upgradenow';
//require_once("conf/ConfigureFromEnv.php");



//===================---------------- START php MODULE ----------------===================
date_default_timezone_set("NZ");
//===================---------------- END php MODULE ----------------===================


//===================---------------- START sapphire MODULE ----------------===================
SSViewer::set_theme('main');
MySQLDatabase::set_connection_charset('utf8');
//SS3 obsolete: Geoip::$default_country_code = "NZ";
GD::set_default_quality(85);
Email::setAdminEmail('swd@sunnysideup.co.nz');
//Member::set_password_validator( new NZGovtPasswordValidator()); //this does not really work
//SS3 obsolete: SiteTree::$breadcrumbs_delimiter = ' <span class="delimiter">&raquo;</span> ';
Session::set_timeout(1209600);//60 * 60 * 24 * 14
Email::bcc_all_emails_to('copyonly@sunnysideup.co.nz');
//Requirements::set_combined_files_folder("themes/main"); //DO NOT USE!!!
FulltextSearchable::enable(array("SiteTree"));
if(Director::isLive()) {
	Director::forceWWW();
	SS_Log::add_writer(new SS_LogEmailWriter('errors@sunnysideup.co.nz'), SS_Log::ERR);
}
else {
	Email::send_all_emails_to("swd@sunnysideup.co.nz");
	BasicAuth::protect_entire_site();
	if(Director::isDev()) {
		SSViewer::set_source_file_comments(true);
	}
}
i18n::set_locale('en_NZ');
i18n::set_date_format("dd-MM-YYYY");

LeftAndMain::setApplicationName("Sunny Side Up Website");
LeftAndMain::require_css("mysite/css/cmsfixes.css");
//SS3 obsolete: LeftAndMain::setLogo($location = "", $style = "");
//SS3 obsolete: LeftAndMain::set_loading_image("themes/main/images/logo.gif");
//===================---------------- END sapphire MODULE ----------------===================
