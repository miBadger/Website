<?php

namespace miBadger\Website\Model;

/**
 * The page class.
 *
 * @since 1.0.0
 */
class Page
{
    /** @var string|null The title. */
    private $title;

    /**
     * Construct a page class.
     */
    public function __construct()
    {
        $this->title = null;
    }

    /**
     * Returns the title.
     *
     * @return string|null the title.
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the title.
     *
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }
}
