<?php

namespace Axl1232\DiscordPhp\Embed;

use Axl1232\DiscordPhp\Interfaces\ArrayableInterface;

class Image implements ArrayableInterface
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

    public function setProxyUrl(?string $proxyUrl): void
    {
        $this->proxyUrl = $proxyUrl;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(?int $height): void
    {
        $this->height = $height;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(?int $width): void
    {
        $this->width = $width;
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
