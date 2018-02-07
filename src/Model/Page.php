<?php

/**
 * This file is part of the miBadger package.
 *
 * @author Michael Webbers <michael@webbers.io>
 * @license http://opensource.org/licenses/Apache-2.0 Apache v2 License
 */

namespace miBadger\Boilerplate\Model;

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
