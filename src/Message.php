<?php

namespace Axl1232\PhpDiscordWebhook;

use Axl1232\PhpDiscordWebhook\Interfaces\ArrayableInterface;
use SplObjectStorage;

class Message implements ArrayableInterface
{
    private ?string $content = null;
    private ?string $avatarUrl = null;
    private ?string $username = null;
    private bool $tts = false;
    private ?string $file = null;
    private ?string $filename = null;

    private SplObjectStorage $embeds;

    public function __construct()
    {
        $this->embeds = new SplObjectStorage();
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getAvatarUrl(): ?string
    {
        return $this->avatarUrl;
    }

    public function setAvatarUrl(?string $avatarUrl): self
    {
        $this->avatarUrl = $avatarUrl;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getTts(): bool
    {
        return $this->tts;
    }

    public function setTts(bool $tts): self
    {
        $this->tts = $tts;

        return $this;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(?string $file): self
    {
        $this->file = $file;

        return $this;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(?string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    public function getEmbeds(): SplObjectStorage
    {
        return $this->embeds;
    }

    public function setEmbeds(SplObjectStorage $embeds): self
    {
        $this->embeds = $embeds;

        return $this;
    }

    public function addEmbed(Embed $embed): self
    {
        $this->embeds->attach($embed);

        return $this;
    }

    public function toArray(): array
    {
        $data = [];

        if ($this->content !== null) {
            $data['content'] = $this->content;
        }

        if ($this->avatarUrl !== null) {
            $data['avatar_url'] = $this->avatarUrl;
        }

        if ($this->username !== null) {
            $data['username'] = $this->username;
        }

        if (count($this->embeds) > 0) {
            $embeds = [];

            foreach ($this->embeds as $embed) {
                if ($embed instanceof Embed) {
                    $embeds[] = $embed->toArray();
                }
            }

            if (count($embeds) > 0) {
                $data['embeds'] = $embeds;
            }
        }

        $data['tts'] = $this->tts;

        if ($this->file !== null) {
            $data['file'] = $this->file;
            $data['filename'] = $this->filename ?? basename($this->file);
        }

        return $data;
    }
}
