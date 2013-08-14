<?php

/**
 *@author nicolaas [at] sunnysideup.co.nz
 *
 *
 **/

class SiteConfigExtras extends DataObjectDecorator {

	private static $db = array(
		"CopyrightNotice" => "HTMLText",
	);

	private static $has_one = array(
		"BackgroundImage" => "Image"
	);

	function updateCMSFields(FieldSet &$fields) {
		$fields->addFieldToTab("Root.PageElements", new HTMLEditorField($name = "CopyrightNotice", $title = "Copyright notice.", 2));
		$fields->addFieldToTab("Root.PageElements", new ImageField($name = "BackgroundImage", $title = "Background Image", null, null, null, "backgroundimage"));
		return $fields;
	}


}
