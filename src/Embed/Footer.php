<?php

namespace Axl1232\PhpDiscordWebhook\Embed;

use Axl1232\PhpDiscordWebhook\Interfaces\ArrayableInterface;

class Footer implements ArrayableInterface
{
    private string $text;
    private ?string $iconUrl = null;
    private ?string $proxyIconUrl = null;

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

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
        $data = ['text' => $this->text];

        if ($this->iconUrl !== null) {
            $data['icon_url'] = $this->iconUrl;
        }

        if ($this->iconUrl !== null) {
            $data['proxy_icon_url'] = $this->proxyIconUrl;
        }

        return $data;
    }
}
