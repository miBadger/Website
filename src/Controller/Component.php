<?php

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
      $repositoryDocsList = $client->api('repo')->contents()->show('miBadger', $componentRepositoryName,'docs','master');
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

    $repositoryRootContent = 'https://raw.githubusercontent.com/miBadger/miBadger.'.$name.'/master/README.md';
    $docUrl = $repositoryRootContent;
    $repositoryLink = 'https://github.com/mibadger/miBadger.' . $name;
    $page->setTitle($name);
    $docLink = 'https://github.com/miBadger/miBadger.'.$name.'/blob/master/README.md';

    return View::get(__DIR__ . '/../View/Component.php', [
      'page' => $page,
      'name' => $name,
      'navItems' => $navItems,
      'docUrl' => $docUrl,
      'docLink' => $docLink
    ]);
  }
  /**
  * Retrieve the miBadger component's data from GitHub
  */
  public function docsAction($name, $doc)
  {
    $file = __DIR__."/../../temp/".$name;
    $page = new Page();
    $client = new \Github\Client();
    $time = time();
    $lastModified = filemtime($file);
    $componentRepositoryName = 'mibadger.' . $name;

    if (file_exists($file) == true && $lastModified - $time > 7200 ){
      $repositoryDocsListCache = file_get_contents(__DIR__."/../../temp/".$name, true );
      $repositoryDocsList = unserialize($repositoryDocsListCache);
    } else {
      try {
        $repositoryDocsList = $client->api('repo')->contents()->show('miBadger', $componentRepositoryName, 'docs', 'master');
      } catch (\Github\Exception\RuntimeException $e) {
        throw new ServerResponseException(new ServerResponse(404));
      } catch(\Github\Exception\ApiLimitExceedException $e ){
        return View::get(__DIR__ . '/../View/serverdown.php');
      }
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

    if (file_exists($file)==false || $lastModified - $time <= 7200){
      $fileForSave = serialize($repositoryDocsList);
      file_put_contents($file,$fileForSave);
    }
    $page->setTitle($name);

    return View::get(__DIR__ . '/../View/Component.php', [
      'page' => $page,
      'name'=> $name,
      'navItems' =>$navItems,
      'docUrl' => $pageUrl,
      'docLink'=> $docLink,

    ]);
  }
}
