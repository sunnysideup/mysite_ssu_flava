<?php

namespace Sunnysideup\MysiteSSUFlava\Config;

use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\ORM\DataExtension;

/**
 *@author nicolaas [at] sunnysideup.co.nz
 *
 *
 **/

class SiteConfigExtras extends DataExtension
{
    private static $db = array(
        "CopyrightNotice" => "HTMLText",
    );

    private static $has_one = array(
        "BackgroundImage" => Image::class
    );

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldToTab("Root.PageElements", $editor = new HTMLEditorField($name = "CopyrightNotice", $title = "Copyright notice."));
        $fields->addFieldToTab("Root.PageElements", new UploadField($name = "BackgroundImage", $title = "Background Image"));
        $editor->setRows(10);
        return $fields;
    }
}
