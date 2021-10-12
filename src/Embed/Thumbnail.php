<?php

namespace Axl1232\PhpDiscordWebhook\Embed;

use Axl1232\PhpDiscordWebhook\Interfaces\ArrayableInterface;

class Thumbnail implements ArrayableInterface
{
    private string $url;
    private ?string $proxyUrl = null;
    private ?int $height = null;
    private ?int $width = null;

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getProxyUrl(): ?string
    {
        return $this->proxyUrl;
    }

    public function setProxyUrl(?string $proxyUrl): self
    {
        $this->proxyUrl = $proxyUrl;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(?int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(?int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function toArray(): array
    {
        $data = ['url' => $this->url];

        if ($this->proxyUrl !== null) {
            $data['proxy_url'] = $this->proxyUrl;
        }

        if ($this->width !== null) {
            $data['width'] = $this->width;
        }

        if ($this->height !== null) {
            $data['height'] = $this->height;
        }

        return $data;
    }
}
