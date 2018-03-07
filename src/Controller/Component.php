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
            
            $fileInfo_rm = $client->api('repo')->contents()->show('miBadger', $link_for_info);
            
            
        } catch(\Github\Exception\ApiLimitExceedException $e ){
            //ret new ServerResponseException( new ServerResponse('serverdown') )
            return View::get(__DIR__ . '/../View/serverdown.php');
        
            
            
        } catch (\Github\Exception\RuntimeException $e)  {
            //var_dump($e);
             throw new ServerResponseException( new ServerResponse(404) );
            
        }
        
        
        //(\Exception $e)
        
        $navItems=[];
        
        $doclink='https://github.com/mibadger/miBadger.'.$name;
        
        for ($i = 0; $i < count($fileInfo); $i++) {
            $navItem = $fileInfo[$i]['name'];
            $url= $fileInfo[$i]['download_url'];
            $navItemsubstr= substr($navItem, 0, -3);
            array_push($navItems, $navItemsubstr);
        }
        
        for ($i = 0; $i < count($fileInfo_rm); $i++) {
            $path = $fileInfo_rm[$i]["path"];
            
            if ($path == "README.md") {
                $downloadUrl = $fileInfo_rm[$i]["download_url"];
                break;
            }
        }
      
        $readme = $downloadUrl;
       
        $page->setTitle($name);
        return View::get(__DIR__ . '/../View/Component.php', [
            'page' => $page,
            'name'=> $name,
            'navItems' =>$navItems,
            'readme'=> $readme,
            'doclink'=> $doclink
        ]);
    }
}
