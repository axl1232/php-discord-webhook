<?php

namespace Axl1232\PhpDiscordWebhook\Embed;

use Axl1232\PhpDiscordWebhook\Interfaces\ArrayableInterface;

class Field implements ArrayableInterface
{
    private string $name;
    private string $value;
    private bool $inline = false;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function isInline(): bool
    {
        return $this->inline;
    }

    public function setInline(bool $inline): self
    {
        $this->inline = $inline;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'value' => $this->value,
            'inline' => $this->inline,
        ];
    }
}
