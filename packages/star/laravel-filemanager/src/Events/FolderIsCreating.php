<?php

namespace Star\LaravelFilemanager\Events;

class FolderIsCreating
{
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function path()
    {
        return $this->path;
    }
}
