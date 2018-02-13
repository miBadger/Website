<?php

/**
 * This file is part of the miBadger package.
 *
 * @author Michael Webbers <michael@webbers.io>
 * @license http://opensource.org/licenses/Apache-2.0 Apache v2 License
 */

namespace miBadger\Website\Controller;

use miBadger\Website\Model\Page;
use miBadger\Mvc\ControllerInterface;
use miBadger\Mvc\View;
use miBadger\Settings\Settings;

/**
 * The home class.
 *
 * @since 1.0.0
 */
class Home implements ControllerInterface
{
	/**
	 * The index action.
	 */
	public function indexAction()
	{
		$page = new Page();
		$page->setTitle('Home');

        
        $settings= new Settings();
        $settings->load(__DIR__. '/../../settings.json');
        
        

        $components= $settings->get('components');
		return View::get(__DIR__ . '/../View/Home.php', ['page' => $page, 'components' => $components]);
        
	}
}
