<?php

namespace Axl1232\PhpDiscordWebhook\Embed;

use Axl1232\PhpDiscordWebhook\Interfaces\ArrayableInterface;

class Author implements ArrayableInterface
{
    private string $name;
    private ?string $iconUrl = null;
    private ?string $url = null;
    private ?string $proxyIconUrl = null;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIconUrl(): ?string
    {
        return $this->iconUrl;
    }

    public function setIconUrl(?string $iconUrl): self
    {
        $this->iconUrl = $iconUrl;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getProxyIconUrl(): ?string
    {
        return $this->proxyIconUrl;
    }

    public function setProxyIconUrl(?string $proxyIconUrl): self
    {
        $this->proxyIconUrl = $proxyIconUrl;

        return $this;
    }

    public function toArray(): array
    {
        $data = ['name' => $this->name];

        if ($this->url !== null) {
            $data['url'] = $this->url;
        }

        if ($this->iconUrl !== null) {
            $data['icon_url'] = $this->iconUrl;
        }

        if ($this->proxyIconUrl !== null) {
            $data['proxy_icon_url'] = $this->proxyIconUrl;
        }

        return $data;
    }
}
