<?php
/**
 * The AuthorizeNet PHP SDK. Include this file in your project.
 *
 * @package AuthorizeNet
 */
require 'AuthorizeNetRequest.php';
require 'AuthorizeNetTypes.php';
require 'AuthorizeNetXMLResponse.php';
require 'AuthorizeNetResponse.php';
require 'AuthorizeNetAIM.php';
require 'AuthorizeNetARB.php';
require 'AuthorizeNetCIM.php';
require 'AuthorizeNetSIM.php';
require 'AuthorizeNetDPM.php';
require 'AuthorizeNetTD.php';
require 'AuthorizeNetCP.php';

if (class_exists("SoapClient")) {
    require 'AuthorizeNetSOAP.php';
}
/**
 * Exception class for AuthorizeNet PHP SDK.
 *
 * @package AuthorizeNet
 */
class AuthorizeNetException extends Exception
{
}