<?php

namespace Axl1232\PhpDiscordWebhook;

use Axl1232\PhpDiscordWebhook\Embed\Author;
use Axl1232\PhpDiscordWebhook\Embed\Field;
use Axl1232\PhpDiscordWebhook\Embed\Footer;
use Axl1232\PhpDiscordWebhook\Embed\Image;
use Axl1232\PhpDiscordWebhook\Embed\Provider;
use Axl1232\PhpDiscordWebhook\Embed\Thumbnail;
use Axl1232\PhpDiscordWebhook\Embed\Video;
use Axl1232\PhpDiscordWebhook\Interfaces\ArrayableInterface;
use DateTime;
use SplObjectStorage;

class Embed implements ArrayableInterface
{
    private ?string $title = null;
    private string $type = 'rich';
    private ?string $description = null;
    private ?DateTime $timestamp = null;
    private ?string $url = null;
    private ?int $color = null;
    private ?Author $author = null;
    private ?Image $image = null;
    private ?Thumbnail $thumbnail = null;
    private ?Video $video = null;
    private ?Provider $provider = null;
    private ?Footer $footer = null;
    private SplObjectStorage $fields;

    public function __construct()
    {
        $this->fields = new SplObjectStorage();
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTimestamp(): ?DateTime
    {
        return $this->timestamp;
    }

    public function setTimestamp(?DateTime $timestamp): self
    {
        $this->timestamp = $timestamp;

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

    public function getColor(): ?int
    {
        return $this->color;
    }

    public function setColor(?int $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    public function setAuthor(?Author $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function setImage(?Image $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getThumbnail(): ?Thumbnail
    {
        return $this->thumbnail;
    }

    public function setThumbnail(?Thumbnail $thumbnail): self
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    public function getVideo(): ?Video
    {
        return $this->video;
    }

    public function setVideo(?Video $video): self
    {
        $this->video = $video;

        return $this;
    }

    public function getProvider(): ?Provider
    {
        return $this->provider;
    }

    public function setProvider(?Provider $provider): self
    {
        $this->provider = $provider;

        return $this;
    }

    public function getFields(): SplObjectStorage
    {
        return $this->fields;
    }

    public function setFields(SplObjectStorage $fields): self
    {
        $this->fields = $fields;

        return $this;
    }

    public function addField(Field $field): self
    {
        $this->fields->attach($field);

        return $this;
    }

    public function getFooter(): ?Footer
    {
        return $this->footer;
    }

    public function setFooter(?Footer $footer): self
    {
        $this->footer = $footer;

        return $this;
    }

    public function toArray(): array
    {
        $data = [];

        foreach (['title', 'type', 'description', 'url', 'color'] as $field) {
            if ($this->{$field} !== null) {
                $data[$field] = $this->{$field};
            }
        }

        if ($this->timestamp !== null) {
            $data['timestamp'] = $this->timestamp->format('Y-m-d\TH:i:sP');
        }

        foreach (['author', 'image', 'thumbnail', 'video', 'provider', 'footer'] as $field) {
            if ($this->{$field} !== null && $this->{$field} instanceof ArrayableInterface) {
                $data[$field] = $this->{$field}->toArray();
            }
        }

        if (count($this->fields) > 0) {
            $fields = [];

            foreach ($this->fields as $field) {
                if ($field instanceof Field) {
                    $fields[] = $field->toArray();
                }
            }

            if (count($fields) > 0) {
                $data['fields'] = $fields;
            }
        }

        return $data;
    }
}
