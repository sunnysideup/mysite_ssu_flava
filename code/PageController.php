<?php


class Page_Controller extends ContentController
{
    public function init()
    {
        parent::init();
        Requirements::javascript(THIRDPARTY_DIR . '/jquery/jquery.js');
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
