<?
    /**
     * This file is a part of LibWebta, PHP class library.
     *
     * LICENSE
     *
     * This program is protected by international copyright laws. Any           
	 * use of this program is subject to the terms of the license               
	 * agreement included as part of this distribution archive.                 
	 * Any other uses are strictly prohibited without the written permission    
	 * of "Webta" and all other rights are reserved.                            
	 * This notice may not be removed from this source code file.               
	 * This source file is subject to version 1.1 of the license,               
	 * that is bundled with this package in the file LICENSE.                   
	 * If the backage does not contain LICENSE file, this source file is   
	 * subject to general license, available at http://webta.net/license.html
     *
     * @category   LibWebta
     * @package    NET_API
     * @subpackage Nginx
     * @copyright  Copyright (c) 2003-2009 Webta Inc, http://webta.net/copyright.html
     * @license    http://webta.net/license.html
     * @ignore
     */

	Core::Load("NET/API/Nginx/class.NginxVHost.php");
	
	/**
	 * @ignore
	 *
	 */
	class NET_API_Nginx_Test extends UnitTestCase 
	{
        function NET_API_Nginx_Test() 
        {
            $this->UnitTestCase('NET/API/Nginx test');
        }
        
        function testNginxVhost() 
        {
			
			//
			// load()
			//
$template = "
server {
	listen  %listen_host%:%listen_port%;
	server_name %server_names%;

	location / {
		root   %doc_root%;
		index  index.html index.htm;
}";
			
			print "<pre>";
			$vhost = new NginxVHost($template);
			$vhost->SetListen("192.168.1.250");
			$vhost->AddServerName("www.dicsydel.nginx.webta.local");
			$vhost->AddServerName("dicsydel.nginx.webta.local");
			$vhost->SetDocRoot("/usr/local/nginx/html");
			
			$config = $vhost->GetConfigString();
			
			$this->assertTrue($config, "We have config!");
			
			print $config;
        }
        
    }


?>