<?php

/**
 *@author nicolaas [at] sunnysideup.co.nz
 *
 *
 **/

class SiteConfigExtras extends DataExtension {

	private static $db = array(
		"CopyrightNotice" => "HTMLText",
	);

	private static $has_one = array(
		"BackgroundImage" => "Image"
	);

	function updateCMSFields(FieldList $fields) {
		$fields->addFieldToTab("Root.PageElements", new HTMLEditorField($name = "CopyrightNotice", $title = "Copyright notice.", 2));
		$fields->addFieldToTab("Root.PageElements", new UploadField($name = "BackgroundImage", $title = "Background Image"));
		return $fields;
	}


}
