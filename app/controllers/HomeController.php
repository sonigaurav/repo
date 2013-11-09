<?php

class HomeController extends BaseController {

	public function get_login()
	{
		 return View::make('layouts.master')->nest('content','login');
	}


	public function get_index()
	{
		 return View::make('layouts.application')->nest('content','index');
	}
        
         public function get_Story()
         {
         
         $url="http://50.17.188.26/api/v2/stories/";
         $json = file_get_contents($url);
          
         return $json;
		
        }

	public function get_compare()
	{
		 return View::make('layouts.application')->nest('content','compare');
	}

	public function get_explore()
	{
		 return View::make('layouts.application')->nest('content','explore');
	}	

	public function get_trends()
	{
		 return View::make('layouts.application')->nest('content','trends');
	}	

	public function get_settings()
	{
		 return View::make('layouts.application')->nest('content','trends');
	}

	public function get_tweetmap()
	{
		 return View::make('layouts.application')->nest('content','tweetmap');
	}
}
