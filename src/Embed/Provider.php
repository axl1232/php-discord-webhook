<?php

namespace Axl1232\PhpDiscordWebhook\Embed;

use Axl1232\PhpDiscordWebhook\Interfaces\ArrayableInterface;

class Provider implements ArrayableInterface
{
    private ?string $name = null;
    private ?string $url = null;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

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

    public function toArray(): array
    {
        $data = [];

        if ($this->name !== null) {
            $data['name'] = $this->name;
        }

        if ($this->url !== null) {
            $data['url'] = $this->url;
        }

        return $data;
    }
}
