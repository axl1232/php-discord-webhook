<?php

namespace Axl1232\PhpDiscordWebhook;

use Axl1232\PhpDiscordWebhook\Exception\DiscordInvalidResponseException;
use Axl1232\PhpDiscordWebhook\Exception\DiscordSerializeException;
use CURLFile;
use JsonException;

class Webhook
{
    private string $url;
    private ?string $proxy;
    private ?int $timeout;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function setProxy(?string $proxy): self
    {
        $this->proxy = $proxy;

        return $this;
    }

    public function setTimeout(?int $timeout): self
    {
        $this->timeout = $timeout;

        return $this;
    }

    /**
     * @throws DiscordInvalidResponseException
     * @throws DiscordSerializeException
     */
    public function send(Message $message): int
    {
        $data = $message->toArray();
        $options = [
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_RETURNTRANSFER => true,
        ];

        if (!empty($this->proxy)) {
            $options[CURLOPT_PROXY] = $this->proxy;
        }

        if (!empty($this->timeout)) {
            $options[CURLOPT_TIMEOUT] = $this->timeout;
        }

        try {
            if (isset($data['file'])) {
                $file = $data['file'];
                $filename = $data['filename'];

                unset($data['file'], $data['filename']);

                $options[CURLOPT_HTTPHEADER] = ['Content-type: multipart/form-data'];
                $options[CURLOPT_POSTFIELDS] = [
                    'file' => new CURLFile($file, '', $filename),
                    'payload_json' => json_encode($data, JSON_THROW_ON_ERROR),
                ];
            } else {
                $options[CURLOPT_HTTPHEADER] = ['Content-type: application/json'];
                $options[CURLOPT_POSTFIELDS] = json_encode($data, JSON_THROW_ON_ERROR);
            }
        } catch (JsonException $e) {
            throw new DiscordSerializeException('Unable to serialize data for Discord Webhook', 500);
        }

        $ch = curl_init($this->url);
        curl_setopt_array($ch, $options);

        $sent = false;

        while (!$sent) {
            $response = curl_exec($ch);
            $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if (429 === $code) {
                try {
                    $response = json_decode($response, false, 512, JSON_THROW_ON_ERROR);
                } catch (JsonException $e) {
                    throw new DiscordInvalidResponseException('Unable to parse response from Discord Webhook');
                }

                usleep($response->retry_after * 1000);
            } else {
                $sent = true;

                if ($code < 200 || $code >= 400) {
                    throw new DiscordInvalidResponseException("Discord Webhook returned invalid response: {$code}.", $code);
                }
            }
        }

        return $code;
    }
}
