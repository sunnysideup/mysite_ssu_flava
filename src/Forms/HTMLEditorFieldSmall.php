<?php

namespace Sunnysideup\MysiteSSUFlava\Forms;

use HtmlEditorConfig;

use SilverStripe\View\Requirements;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

/**

* Sometimes you want two or more TinyMCE instances in the same page, and for each one to have it's own
* tinymce configuration. This class lets you do just that.
*
* To use, pop something like this into your _config.php (this is a copy of what's in cms/_config, modified for
* our purposes)

*   HtmlEditorConfig::get('linksonly')->setOptions(array(
*           'friendly_name' => 'Links Only',
*           'mode' => 'none',
*           'language' => i18n::get_tinymce_lang(),

*           'body_class' => 'typography',
*           'document_base_url' => Director::absoluteBaseURL(),

*           'urlconverter_callback' => "nullConverter",
*           'setupcontent_callback' => "sapphiremce_setupcontent",
*           'cleanup_callback' => "sapphiremce_cleanup",

*           'use_native_selects' => true, // fancy selects are bug as of SS 2.3.0
*           'valid_elements' => "@[id|class|style|title],#a[id|rel|rev|dir|tabindex|accesskey|type|name|href|target|title|class]",
*           'extended_valid_elements' => "",

*           'button_tile_map' => true
*   ));

*   HtmlEditorConfig::get('linksonly')->enablePlugins(array('ssbuttons' => '../../../cms/javascript/tinymce_ssbuttons/editor_plugin_src.js'));

*   HtmlEditorConfig::get('linksonly')->setButtonsForLine(1, array('sslink'));
*   HtmlEditorConfig::get('linksonly')->setButtonsForLine(2, array());
*   HtmlEditorConfig::get('linksonly')->setButtonsForLine(3, array());

*
* Then use this formfield in a form somewhere, passing the config name as it's first argument
*
*
*   function getCMSFields($fields = null) {
*       $tab->push(new CustomConfigHtmlEditorField('linksonly', 'RelatedLinks', 'Related Links', 3, 20));
*   }

*/
class HTMLEditorFieldSmall extends HTMLEditorField
{
    public static function include_js($configName)
    {
        Requirements::javascript(MCE_ROOT . 'tiny_mce_src.js');

        $config = HtmlEditorConfig::get($configName);
        $config->setOption('mode', 'none');
        $config->setOption('editor_selector', "htmleditor$configName");

        Requirements::customScript("
        Behaviour.register(
            {
            'textarea.htmleditor$configName' : {
                initialize : function() {
                    if(typeof tinyMCE != 'undefined'){
                        var oldsettings = tinyMCE.settings;
                        ".$config->generateJS()."
                        tinyMCE.execCommand('mceAddControl', true, this.id);
                        tinyMCE.settings = oldsettings;
                        this.isChanged = function() {
                            return tinyMCE.getInstanceById(this.id).isDirty();
                        }
                        this.resetChanged = function() {
                            inst = tinyMCE.getInstanceById(this.id);
                            if (inst) inst.startContent = tinymce.trim(inst.getContent({format : 'raw', no_events : 1}));
                        }
                        }
                    }
                }
            }
        )
        ",
        "htmlEditorConfig-$configName");
    }

    public function __construct($config, $name, $title = null, $rows = 30, $cols = 20, $value = '', $form = null)
    {
        // Skip the HtmlEditorField's constructor
        TextareaField::__construct($name, $title, $rows, $cols, $value, $form);

        $this->addExtraClass('typography');
        $this->addExtraClass("htmleditor$config");

        self::include_js($config);
    }
}
