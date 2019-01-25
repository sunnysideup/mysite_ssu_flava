<?php

use SilverStripe\View\Requirements;
use SilverStripe\CMS\Controllers\ContentController;

class Page_Controller extends ContentController
{
    public function init()
    {
        parent::init();
    }

    public function Siblings()
    {
        if (!$this->ParentID) {
            $this->ParentID = 0;
        }
        return Page::get()
            ->filter(array("ShowInMenus" => 1, "ParentID" => $this->ParentID));
    }
    function IsInHouseTemplate()
    {
        $standard = array(
            'Page',
            'WebPortfolioPage',
            'PresentationPage',
            'TermsAndConditionsPage',
            'ErrorPage',
            'HomePage',
            'TypographyTestPage',
            'TemplateOverviewPage',
            'UserDefinedForm'
        );
        return in_array($this->ClassName, $standard);
    }
}
