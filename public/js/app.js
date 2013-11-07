
// Define a new module for our app. The array holds the names of dependencies if any.
var app = angular.module("app", ["ngResource"]);

app.factory("StoryService", function($http, $resource) {
    return {
        
        getStories: function(pulse,dt) {

            var params = "/" + pulse ;

            if(dt && dt.length > 0){
                params +=  "/" + dt;
            }else{
                 params +=  "/0";
            }

            var path = "api/stories"  + params;

            //console.log('paths is--------------' , path);

            return $resource(path, {}, {});

        },

        getUserSetting: function() {
            return $resource('api/usersetting', {}, {});
        },

        getUserTags: function(tv) {
            var path = 'api/userTagStory/' + tv;
            return $resource(path, {}, {});
        }

        
    };
});


app.config(function($interpolateProvider) {
  $interpolateProvider.startSymbol('((');
  $interpolateProvider.endSymbol('))');
});



app.controller("HomeCtrl", function($scope, $timeout, StoryService) {

    $scope.loading = true;

     $scope.new_value = [];

    $scope.state = "all";

    $scope.show = [];

    $scope.tags = [];

    $scope.articleStory = [];

    $scope.selectTags = [];

    $scope.testMsg=[];

    $scope.stateFilters = [];

    $scope.currentTime = [];

    $scope.stories = { all : [],
                        latest: [],
                        hot: [],
                        trending: [],
                        flat: []
                    };

    $scope.tagedStories=[];                    

    $scope.story_ids = [];

    $scope.pulses = [];

    $scope.todayTime_form = [];

    $scope.selectedStory = [];

    //Keep current pluse selected 
    $scope.pulseValue = "allTopics";

    //Store name of active pulse 
    $scope.activePulse = {"allTopics" :true};


    $scope.isOldDate = false;
    $scope.isOldDateCall = false;    

    $scope.populateShowStory = function() {

        $scope.show = [];

        if($scope.stateFilters.length === 0 || $scope.stateFilters.length === 5){
           
            $scope.show = $scope.stories.all;
        } else {
           
            if ( $.inArray('hot', $scope.stateFilters) > -1){
                $scope.show = $scope.show.concat($scope.stories.hot);
            }
            if ( $.inArray('trending', $scope.stateFilters) >-1){
                $scope.show = $scope.show.concat($scope.stories.trending);
            }
            if ( $.inArray('latest', $scope.stateFilters) >-1){
                $scope.show =$scope.show.concat($scope.stories.latest);
            }
            if ( $.inArray('flat', $scope.stateFilters) >-1){
                $scope.show = $scope.show.concat($scope.stories.flat);
            }
            if ( $.inArray('stop', $scope.stateFilters) >-1){
                $scope.show = $scope.show.concat($scope.stories.stop);
            }
        }

        //Since data is injcted from background to test the app. Some nodes are currupted 
        // This block will be removed whe currect data will come
        var ind = 0;    
        angular.forEach($scope.show, function(story) 
        {
            //console.log($scope.show.length + " " + ind );

            try{
                if(!story ){
                    //console.log("Yes!! stroy @ index " + ind + " does not exist" );
                    $scope.show.splice(ind,1);
                }

                if(story && !story.id ){
                    //console.log("Yes!! index " + ind + "does not exist" );
                    $scope.show.splice(ind,1);
                }

            }catch(e){
                console.log(e);
            }
            ind++;
        });                    

        /*
        Check is story if tagged then highlight it
        */
        var ind = 0;    
       // console.log("show length", $scope.show.lenth );
        angular.forEach($scope.show, function(story) 
        {
            console.log(ind++, story);
            if ($.inArray(story.id, $scope.tagedStories) > -1) {
               story.taged = "text-stop";    
            }else{
                story.taged = "";    
            }
        });
    }


    $scope.poll = function() {

        (function tick() 
        {
           
            $scope.getCurrentTimeString(); 

            //Check if older date is selected then do not poll stories
            if($scope.isOldDateCall){

                $scope.populateShowStory();

                $timeout(tick, 1000);

                return;
            }

            StoryService.getStories($scope.pulseValue,$scope.currentTime).get(function(data) 
            {
                angular.forEach(data.stories['c:feed_twitter_top_50'], function(item) 
                {
                    

                    /* If key doesn't exist, then add story */
                    if ($.inArray(item.id, $scope.story_ids) === -1) {

                        $scope.stories.all.push(item);
                        $scope.story_ids.push(item.id);

                        if(item.status=='new') {
                            $scope.stories.latest.push(item);
                        } else if(item.status=='hot') {
                            $scope.stories.hot.push(item);
                        } else if(item.status=='trending') {
                            $scope.stories.trending.push(item);
                        } else if(item.status=='flat') {
                            $scope.stories.flat.push(item);
                        }

                    }
                });

                $scope.populateShowStory();

                $scope.loading = false;

                //Check if old date then do not make ajax call

                if($scope.isOldDate){
                    $scope.isOldDateCall = true;
                }

                $timeout(tick, 1000);
            });

        })();
    };

    $scope.get_all_stories = function() {

        StoryService.getStories().get(function(data) {
            angular.forEach(data.stories['c:feed_twitter_top_50'], function(item) 
            {

                /* If key doesn't exist, then add story */
                if ($.inArray(item.id, $scope.story_ids) === -1) {

                    $scope.stories.all.push(item);
                    $scope.story_ids.push(item.id);

                    if(item.status=='new') {
                        $scope.stories.latest.push(item);
                    } else if(item.status=='hot') {
                        $scope.stories.hot.push(item);
                    } else if(item.status=='trending') {
                        $scope.stories.trending.push(item);
                    } else if(item.status=='flat') {
                        $scope.stories.flat.push(item);
                    }

                }

            });

            console.log($scope.stories);
            $scope.loading = false;
        });

    };
      
      /* tag Manager */

    $('#tagmanager').tagmanager({
    validateHandler: function(tagManager, tag, isImport) {
         
        $scope.selectTags.push(tag);
        
        if (isImport) return tag;

        var index = $.inArray(tag, tagManager.tagStrings);
        if (index != -1) {
            $('#' + tagManager.tagIds[index]).effect(
                "highlight", {}, 3000);
            return false;
        }
        return tag;
      }
    });

    

    $scope.setPulse =  function(val){
       //console.log('pulseValue is' , val);
       $scope.pulseValue = val;

       $scope.activePulse={};
       $scope.activePulse[''+val]=true;

      // console.log('activePulse',$scope.activePulse);
    };

     $scope.setStory=function(story){
    $scope.selectedStory = [];
   // console.log('story is',story);
    angular.forEach(story.articles, function(item) {
        $scope.articleStory.push(item.url);
  
     });
         $scope.selectedStory.push(story);


     };
    


    $scope.addChangeTime = function() {

       $scope.dtParam  = "";

       $scope.todaysStory=[]; 

       console.log('currentTime', $scope.todayTime_form.currentTime  );
       console.log( 'tempTime',$scope.todayTime_form.tempTime  );
       console.log( 'currentDate',$scope.todayTime_form.currentDate  );
       console.log( 'selectedDate',$scope.todayTime_form.selectedDate  );

       $scope.currentTime ="";

       $scope.isOldDate = false;
       $scope.isOldDateCall = false;       
       
       var td = new Date();

       var dateString = td.getFullYear() + "-" + td.getMonth() + "-" + td.getDate();
       

       if($scope.todayTime_form.currentDate  == "cd"){

            $scope.currentTime = dateString ;

       }if($scope.todayTime_form.currentDate  == "sd") {

            $scope.currentTime = $scope.todayTime_form.selectedDate  ;
            $scope.isOldDate = true;
       }

       if($scope.todayTime_form.currentTime  == "ct"){

         $scope.currentTime += " " + $scope.currTime;

       }if($scope.todayTime_form.currentTime  == "st") {

             $scope.currentTime +=  $scope.todayTime_form.tempTime ;
       }
        
       console.log( 'isOldDate',$scope.isOldDate);
        //console.log( '',$scope.currentTime );



    };



     $scope.getCurrentTimeString = function(){

         var td = new Date();
         var hrs = td.getHours();

         var min = td.getMinutes();
         if(min < 10){
         min = "0" + min;
          } 

          var ampm = "AM" ;
          if(hrs > 12){
           hrs -= 12;
           ampm = "PM" ;
          }

          var timeString  = hrs +  " : " + min + " " + ampm ;

          $scope.currTime = timeString;

 };


         
    $scope.addTodo = function() {
    
        $scope.tags=[]; 
        var v = $scope.highlight_form;

           
        if(v.popularityOver || v.popularityUnder){
            var tagValue = "" ;
            if(v.popularityOver && v.popularityUnder){
                tagValue += "Popularity : Over " + v.overValue 
                + "% and Under " + v.underValue +"%" ;
            }else{
                if(v.popularityOver){
                    tagValue += "Popularity : Over " + v.overValue +"%" ;
                }else{
                    tagValue += "Popularity : Under " + v.underValue +"%" ;
                }
            }
            $scope.tags.push(tagValue);
        }

        if(v.overAge || v.underAge){
            var tagValue = "" ;

            if(v.overAge && v.underAge){
                tagValue += "Age : Over " + v.overAgeValue 
                + " and Under " + v.underAgeValue  ;
            }else{
                if(v.overAge){
                    tagValue += "Age : Over " + v.overAgeValue ;
                }else{
                    tagValue += "Age : Under " + v.underAgeValue ;
                }
            }
            
            $scope.tags.push(tagValue);
            
        }
        
        if(v.gender != null){
           $scope.tags.push("Gender : " + v.gender);
         }
    
        if(v.moreGrowth || v.lessGrowth){
            var tagValue = "" ;

            if(v.moreGrowth && v.lessGrowth){
                tagValue += "Growth : More then " + v.moreGrowthValue + "% "
                + " and Less then " + v.lessGrowthValue + " % in Last Hour"  ;
            }else{
                if(v.moreGrowth){
                    tagValue += "Growth :  More then " + v.moreGrowthValue + " % in Last Hour" ;
                }else{
                    tagValue += "Growth : Less then " + v.lessGrowthValue + " % in Last Hour" ;
                }
            }
            
            $scope.tags.push(tagValue);
            
        }

        if(v.keywords && v.keywords.length > 0 ){
          
         angular.forEach($scope.selectTags, function(kws) 
         {
            //$scope.tags = [];
             $scope.tags.push("keyword : " + kws);
          }); 
    
         }
        
        if(v.highlight){
            $scope.tags.push(v.highlight);
        }

   };



   $scope.remove = function ( idx ) {
     
    var val = $scope.tags.splice( idx, 1 );
       
    //console.log('value is', val);
    //$scope.highlight_form = [];    
        /* Remove from select-Tag */
  
   };


    $scope.tagPoll = function() 
    {
        (function tagTick() 
        {
            if($scope.tags.length > 0){

                var params = $scope.selectTags.join(",");
                console.log(params);   
                if( !params || params.length==0 ){
                    params = "NK";
                }

                StoryService.getUserTags(params).get(function(data) 
                {
                    var newArry = [];
                    
                    angular.forEach(data.stories, function(tag) 
                    {
                        newArry.push(tag.id);
                    });

                    $scope.tagedStories = newArry;

                    $timeout(tagTick, 5000);
                });
            }else{
                $scope.tagedStories = [];
                $timeout(tagTick, 1000);
            }  
            
        })();
    };


    $scope.hot = function() {
        $scope.loading = true;

        if($scope.state == "hot")
            $scope.state = "all";
        else    
            $scope.state = "hot";
    };

    $scope.latest = function() {
        $scope.loading = true;

        if($scope.state == "new")
            $scope.state = "all";
        else    
            $scope.state = "new";
    };

    $scope.trending = function() {
        $scope.loading = true;

        if($scope.state == "trending")
            $scope.state = "all";
        else    
            $scope.state = "trending";
    };

    $scope.flat = function() {
        $scope.loading = true;

        if($scope.state == "flat")
            $scope.state = "all";
        else    
            $scope.state = "flat";
    };

    $scope.stop = function() {
        $scope.loading = true;

        if($scope.state == "stop")
            $scope.state = "all";
        else    
            $scope.state = "stop";
    };

    $scope.greyTabs = { "hot": "-grey", "stop" : "-grey", 
    "trending" :"-grey","latest":"-grey", "flat" :"-grey" };

    $scope.setStateFilter = function(val) {

        var ind =$.inArray(val, $scope.stateFilters);

        if(ind === -1 ){
            $scope.stateFilters.push(val);
            
            $scope.greyTabs[val] = "" ;

        }else{
            $scope.stateFilters.splice(ind, 1);

            $scope.greyTabs[val] = "-grey" ;
        }

       
       

    };

    $scope.getPulses = function() {
          StoryService.getUserSetting().get(function(abc){
                 $scope.pulses = abc.pulses;
                console.log('pulse',$scope.pulses);  
          });
     }


      $scope.getTagStory = function() {
          StoryService.getUserTags().get(function(test){
                 //$scope.tagsStory = test.pulses;
                
          });
     }

    $scope.poll();
    $scope.tagPoll();
    

    
});


/* Custom Code */

$("#menu-toggle-left").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("active-left");
});
