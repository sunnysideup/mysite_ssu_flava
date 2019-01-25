<?php

use SilverStripe\Security\PasswordValidator;
use SilverStripe\Security\Member;
use SilverStripe\Forms\HTMLEditor\TinyMCEConfig;

// remove PasswordValidator for SilverStripe 5.0
$validator = PasswordValidator::create();
// Settings are registered via Injector configuration - see passwords.yml in framework
Member::set_password_validator($validator);

date_default_timezone_set('Pacific/Auckland');

TinyMCEConfig::get('cms')->setOption(
    'valid_styles',
    array('*' => 'color,font-weight,font-style,text-decoration')
);
TinyMCEConfig::get('cms')->setOption(
    'paste_as_text',
    true
);
TinyMCEConfig::get('cms')->setOption(
    'paste_text_sticky',
    true
);
TinyMCEConfig::get('cms')->setOption(
    'paste_text_sticky_default',
    true
);
