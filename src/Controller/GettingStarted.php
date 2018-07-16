<?php

/**
 * This file is part of the miBadger package.
 *
 * @author Barry Lagerburg barrytwee@gmail.com
 * @license http://opensource.org/licenses/Apache-2.0 Apache v2 License
 */

namespace miBadger\Website\Controller;

use miBadger\Website\Model\Page;
use miBadger\Mvc\ControllerInterface;
use miBadger\Mvc\View;
use miBadger\Http\ServerResponse;
use miBadger\Http\ServerResponseException;

/**
 * The Component class.
 *
 * @since 1.0.0
 */
class GettingStarted implements ControllerInterface
{
    /**
     * this action returns the readme contents.
     */
    public function mibadgerReadmeAction() 
    {
        $page = new Page();
        
        $repositoryLink = 'https://github.com/mibadger/miBadger/';
        $page->setTitle("getting started!");
        
        return View::get(__DIR__ . '/../View/GettingStarted.php', [
            'page' => $page,
            'name' => null,
            'navItems' => null,
            'docUrl' => "https://raw.githubusercontent.com/miBadger/miBadger/master/README.md",
            'docLink' => "https://github.com/miBadger/miBadger/"
        ]);   
    }
    
  
}
