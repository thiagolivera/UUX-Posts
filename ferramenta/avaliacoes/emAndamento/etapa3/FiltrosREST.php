<?php
/**
 * Created by PhpStorm.
 * User: netog
 * Date: 04/12/2018
 * Time: 10:29
 */

require_once (__DIR__.'/../../../vendor/autoload.php');
use  GuzzleHttp\Client;
use  GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;

class FiltrosREST
{

    /**
     * FiltrosREST constructor.
     */
    public function __construct()
    {
    }

    public function GET(){
        $client  =  new  Client ();
        $res = $client->get('http://httpbin.org/get');
        if($body = $res->getBody()) {
            $size = $body->getSize();
            echo '<pre>';
            print_r($body->read($size));
            echo '</pre>';
        }
    }
}