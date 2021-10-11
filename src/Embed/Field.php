<?php

namespace Axl1232\DiscordPhp\Embed;

use Axl1232\DiscordPhp\Interfaces\ArrayableInterface;

class Field implements ArrayableInterface
{
    private string $name;
    private string $value;
    private bool $inline = false;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public function isInline(): bool
    {
        return $this->inline;
    }

    public function setInline(bool $inline): void
    {
        $this->inline = $inline;
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
