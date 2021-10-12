# PHP-Discord-Webhook
A PHP library that makes sending Discord webhooks easier.

## Installation
```sh
composer require axl1232/php-discord-webhook
```

## Usage
Sending a text message
```php
$message = (new Axl1232\PhpDiscordWebhook\Message())
    ->setContent('Hello world')
    ->setUsername('Test hook')
    ->setAvatarUrl('https://example.com/avatar.png');

$hook = new Axl1232\PhpDiscordWebhook\Webhook('https://discordapp.com/api/webhooks/test/hook');
$hook->send($message);
```

Sending a text message with attachment
```php
$message = (new Axl1232\PhpDiscordWebhook\Message())
    ->setContent('Hello world')
    ->setUsername('Test hook')
    ->setAvatarUrl('https://example.com/avatar.png')
    ->setFile('/path/to/file.png');

$hook = new Axl1232\PhpDiscordWebhook\Webhook('https://discordapp.com/api/webhooks/test/hook');
$hook->send($message);
```

Sending an embed message
```php
$message = (new Axl1232\PhpDiscordWebhook\Message())
    ->setContent('Hello world')
    ->setUsername('Test hook')
    ->setAvatarUrl('https://example.com/avatar.png')
    ->addEmbed(
        (new Axl1232\PhpDiscordWebhook\Embed())
        ->setTitle('Test embed')
        ->setUrl('https://example.com/')
        ->setDescription('Some embed description')
        ->setImage(
            (new Axl1232\PhpDiscordWebhook\Embed\Image())
            ->setUrl('https://example.com/image.jpg')
        )
        ->setAuthor(
            (new Axl1232\PhpDiscordWebhook\Embed\Author())
            ->setName('Author')
            ->setUrl('https://example.com')
            ->setIconUrl('https://example.com/author_icon.png')
        )
        ->setColor(Axl1232\PhpDiscordWebhook\Tools\ColorHelper::FUSCHIA)
        ->setFooter(
            (new Axl1232\PhpDiscordWebhook\Embed\Footer())
            ->setText('Footer text')
            ->setIconUrl('https://example.com/footer_icon.png')
        )
        ->setTimestamp(new DateTime('-1 week'))
        ->setThumbnail(
            (new Axl1232\PhpDiscordWebhook\Embed\Thumbnail())
            ->setUrl('https://example.com/thumbnail.png')
        )
        ->addField(
            (new Axl1232\PhpDiscordWebhook\Embed\Field())
            ->setName('Field 1')
            ->setValue('Value 1')
        )
        ->addField(
            (new Axl1232\PhpDiscordWebhook\Embed\Field())
            ->setName('Field 2')
            ->setValue('Value 2')
        )
    );

$hook = new Axl1232\PhpDiscordWebhook\Webhook('https://discordapp.com/api/webhooks/test/hook');
$hook->send($message);
```

Predefined colors in `Axl1232\PhpDiscordWebhook\Tools\ColorHelper`

Name                 | Value     | Hex Code
---------------------|-----------|-----------
`WHITE`              | 16777215  | `#FFFFFF`
`BLURPLE`            | 5793266   | `#5865F2`
`GREYPLE` (Default)  | 10070709  | `#99AAB5`
`DARK_BUT_NOT_BLACK` | 2895667   | `#2C2F33`
`NOT_QUITE_BLACK`    | 2303786   | `#23272A`
`GREEN`              | 5763719   | `#57F287`
`YELLOW`             | 16705372  | `#FEE75C`
`FUSCHIA`            | 15418782  | `#EB459E`
`RED`                | 15548997  | `#ED4245`
`WHITE`              | 16777215  | `#FFFFFF`
`BLACK`              | 2303786   | `#23272A`
