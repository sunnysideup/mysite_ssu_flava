<?php

class Page extends SiteTree {

	private static $has_one = array(
		"BackgroundImage" => "Image"
	);

	function getCMSFields() {
		$fields = parent::getCMSFields();
		return $fields;
	}

	function MyBackgroundImage() {
		if($this->BackgroundImageID) {
			if($image = $this->BackgroundImage()) {
				return $image;
			}
		}
		if($this->ParentID) {
			if($parent = SiteTree::get()->byID($this->ParentID)) {
				return $parent->MyBackgroundImage();
			}
		}
		if($this->URLSegment != 'home') {
			if($homePage = SiteTree::get()->filter(array('URLSegment' => 'home'))->first()) {
				return $homePage->MyBackgroundImage();
			}
		}
		if($siteConfig = SiteConfig::current_site_config()) {
			return $siteConfig->BackgroundImage();
		}
	}
}

class Page_Controller extends ContentController {

	function init(){
		parent::init();
		Requirements::javascript(THIRDPARTY_DIR . '/jquery/jquery.js');
	}

	function Siblings(){
		if(!$this->ParentID) {
			$this->ParentID = 0;
		}
		return Page::get()
			->filter(array("ShowInMenus" => 1, "ParentID" => $this->ParentID));
	}

}

