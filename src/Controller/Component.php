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
use miBadger\Http\ServerResponse;
use miBadger\Http\ServerResponseException;

/**
 * The Component class.
 *
 * @since 1.0.0
 */
class Component implements ControllerInterface
{
	/**
	 * The index action.
	 */
	public function indexAction($name)
	{
            

        
            $page = new Page();
            $miBadger='mibadger.';
            $link_for_info=$miBadger.$name;
        
            // TODO Retrieve the miBadger component's data from GitHub done
           $client = new \Github\Client();
        
        
            try { 
                    
        
                $fileInfo = $client->api('repo')->contents()->show('miBadger', $link_for_info, 'docs', 'master');
                
               }
        catch (\Exception $e){
            throw new ServerResponseException( new ServerResponse(404) );
        }
        
        $navItems=[];
        $contents=[];
        
        
         for($i = 0; $i < count($fileInfo); $i++)
         {
              $navItem = $fileInfo[$i]['name'];
              $url= $fileInfo[$i]['download_url'];
              $navItemsubstr= substr($navItem,0,-3);
              
        
             
                array_push($navItems,$navItemsubstr );
                array_push($contents, $url);
            } 
        
        
         
      
        
       
           
        

        $page->setTitle($name);
        return View::get(__DIR__ . '/../View/Component.php', [
            'page' => $page,
            'name'=> $name,
            'navItems' =>$navItems,
            'contents' => $contents
            
            
        ]);

    
	}
}
