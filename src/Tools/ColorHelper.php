<?php

namespace Axl1232\PhpDiscordWebhook\Tools;

class ColorHelper
{
    public const WHITE = 16777215;
    public const BLURPLE = 5793266;
    public const GREYPLE = 10070709;
    public const DARK_BUT_NOT_BLACK = 2895667;
    public const NOT_QUITE_BLACK = 2303786;
    public const GREEN = 5763719;
    public const YELLOW = 16705372;
    public const FUSCHIA = 15418782;
    public const RED = 15548997;
    public const BLACK = 2303786;

    public static function convertFromHex(string $color): int
    {
        if ($color[0] === '#') {
            $color = substr($color, 1);
        }

        return hexdec($color);
    }
}
