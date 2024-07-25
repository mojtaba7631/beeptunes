<?php if (!class_exists('CaptchaConfiguration')) {
    return;
}

// BotDetect PHP Captcha configuration options

//$imageStyles = [
//    ImageStyle::Stitch,
//    ImageStyle::Rough,
//    ImageStyle::MeltingHeat,
//];

return [
    // Captcha configuration for example page
    'ExampleCaptcha' => [
        'UserInputID' => 'MyCaptchaCode',
        'AdditionalInlineCss' => "width:100%; border-radius:30px; overflow:hidden; ",
        'AdditionalCssClasses' => "MyCaptchaCode",
        'ImageHeight' => 48,
        'CustomDarkColor' => "#c9dfff",
        'CustomLightColor' => "#007bff",
        'AutoReloadTimeout' => 30,
        'UseSmallIcons' => false,
        'ImageStyle' => ImageStyle::Bubbles,
        'SoundRegenerationMode' => SoundRegenerationMode::None,
        'SoundEnabled' => false,
        'CodeLength' => CaptchaRandomization::GetRandomCodeLength(4, 6),
    ],

];
