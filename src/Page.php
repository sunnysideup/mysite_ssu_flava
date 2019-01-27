<?php

namespace {
    use SilverStripe\Assets\Image;
    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\SiteConfig\SiteConfig;


    class Page extends SiteTree
    {
        private static $has_one = array(
            "BackgroundImage" => Image::class
        );

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();
            return $fields;
        }

        public function MyBackgroundImage()
        {
            if ($this->BackgroundImageID) {
                if ($image = $this->BackgroundImage()) {
                    return $image;
                }
            }
            if ($this->ParentID) {
                if ($parent = SiteTree::get()->byID($this->ParentID)) {
                    return $parent->MyBackgroundImage();
                }
            }
            if ($this->URLSegment != 'home') {
                if ($homePage = SiteTree::get()->filter(array('URLSegment' => 'home'))->first()) {
                    return $homePage->MyBackgroundImage();
                }
            }
            if ($siteConfig = SiteConfig::current_site_config()) {
                return $siteConfig->BackgroundImage();
            }
        }
    }
}
