<?php

class ApiController extends BaseController {


	private $service_endpoint = "http://50.17.188.26";

	public function get_stories($pulse,$dt)
    {

		$url=$this->service_endpoint."/api/v2/stories?pulse=".$pulse."&dt=".$dt;
	    
        $json = file_get_contents($url);
        return $json;

        //$res = file_get_contents($url);
       // $json =  str_replace('"id":', '"age":"30","id":',$res);
        //return $json;

		
	}

    public function get_user_settings()
    {
        $json = '{"pulses" : ["new york","boston","entertainment"]}';
     
         return $json;
       
    }

    public function get_userTag_stories($tv)
    {
        $url="../../topic-pulse/tagStories.php";
        $json = file_get_contents($url);
        return $json;
        
    }

   

}
