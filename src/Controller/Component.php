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
class Component implements ControllerInterface
{
    /**
     * this action returns the readme contents.
     */
    public function readmeAction($name) 
    {
        $page = new Page();
        $client = new \Github\Client();
        
        $componentRepositoryName = 'mibadger.' . $name;
        
        try {
            $repositoryDocsList = $client->api('repo')->contents()->show('miBadger', $componentRepositoryName, 'docs', 'master');
            
            $repositoryRootContent = $client->api('repo')->contents()->show('miBadger', $componentRepositoryName); 
        } catch(\Github\Exception\ApiLimitExceedException $e ){
            return View::get(__DIR__ . '/../View/serverdown.php');  
        } catch (\Github\Exception\RuntimeException $e)  {
             throw new ServerResponseException( new ServerResponse(404) );
        }
        
        $navItems = [];
        
        for ($i = 0; $i < count($repositoryDocsList); $i++) {
            $repositoryDoc = $repositoryDocsList[$i];
            
            $docFileName = $repositoryDoc['name'];
            
            $docName = substr($docFileName, 0, -3); //remove extension
            
            array_push($navItems, $docName);
        }
        
        for ($i = 0; $i < count($repositoryRootContent); $i++) { 
            $fileName = $repositoryRootContent[$i];
            
            if ($fileName["path"] == "README.md") {
                $pageUrl = $fileName["download_url"];
                break;
            }
        }
      
        $repositoryLink = 'https://github.com/mibadger/miBadger.' . $name;
        $page->setTitle($name);
        
        return View::get(__DIR__ . '/../View/Component.php', [
            'page' => $page,
            'name' => $name,
            'navItems' => $navItems,
            'docUrl' => $pageUrl,
            'docLink' => $repositoryLink
        ]);   
    }
    
    /**
     * Retrieve the miBadger component's data from GitHub
     */
    public function docsAction($name, $doc)
    {
        $page = new Page();
        $client = new \Github\Client();

        $componentRepositoryName = 'mibadger.' . $name;
        
        try {
            $repositoryDocsList = $client->api('repo')->contents()->show('miBadger', $componentRepositoryName, 'docs', 'master');
        } catch (\Github\Exception\RuntimeException $e) {
            throw new ServerResponseException(new ServerResponse(404));
        } catch(\Github\Exception\ApiLimitExceedException $e ){
            return View::get(__DIR__ . '/../View/serverdown.php'); 
        }
        
        $docLink='https://github.com/mibadger/miBadger.'.$name.'/blob/master/src/'.$doc.'.php';
        
        $navItems=[];
        
        for ($i = 0; $i < count($repositoryDocsList); $i++) {
            $repositoryDoc = $repositoryDocsList[$i];
            
            $docFileName = $repositoryDoc['name'];
            $docUrl = $repositoryDoc['download_url'];
            
            $docName = substr($docFileName, 0, -3); //remove extension
            
            if ($docName == $doc) {
                $pageUrl = $docUrl;
            }
            array_push($navItems, $docName);
        }

        $page->setTitle($name);
        
        return View::get(__DIR__ . '/../View/Component.php', [
            'page' => $page,
            'name'=> $name,
            'navItems' =>$navItems,
            'docUrl' => $pageUrl,
            'docLink'=> $doclink,
        ]);
    }
}
