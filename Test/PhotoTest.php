<?php

require_once('../Class/Photo.php');

class PhotoTest extends PHPUnit_Framework_TestCase
{
  public function setUp()
  {

  }

  public function tearDown()
  {

  }

  public function testGetMediaIdIsValid()
  {
    $clientId = 'dd79969587be46d1b22c61ff3e037719';
    $photoId = '906110368841382599_503341453';
    $instantanea = new Photo($client_id);
    //$instantanea->getMediaId;    
    $instantanea->getMediaId($photoId);
    print_r($instantanea);
    exit;
    $this->AssertEquals($instantanea->getMediaId($photoId) !== false);
  }

}

?>