@section('content')
<div ng-controller="HomeCtrl">
  
  <div class="homepage-header"> 
 
     <ul ng-init="getPulses()" class="list-inline list-unstyled" >
           <li  ng-class="{active:activePulse['allTopics']}"  ng-click="setPulse('allTopics')"><a href="#">All Topics</a></li>
           <li ng-class="{active:activePulse['nyc']}" ><a href="#" ng-click="setPulse('nyc')">New York City</a></li>
           <li ng-class="{active:activePulse['National']}" ><a href="#" ng-click="setPulse('National')">National</a></li>
           <li  ng-class="{active:activePulse['Entertainment']}"><a href="#" ng-click="setPulse('Entertainment')">Entertainment</a></li>
           <li ng-class="{active:activePulse['Sports']}" ><a href="#" ng-click="setPulse('Sports')">Sports</a></li>
           <li ng-class="{active:activePulse['Politics']}" ><a href="#" ng-click="setPulse('Politics')">Politics</a></li>
           <li ng-class="{active:activePulse['Technology']}" ><a href="#" ng-click="setPulse('Technology')">Technology</a></li>
           <li ng-class="{active:activePulse['Science']}" ><a href="#" ng-click="setPulse('Science')">Science</a></li>
           <li ng-class="{active:activePulse['Faith']}" ><a href="#" ng-click="setPulse('Faith')">Faith</a></li>
           <li ng-class="{active:activePulse['Parenting']}" ><a href="#" ng-click="setPulse('Parenting')">Parenting</a></li>
 
           
       </ul>
 
      <div class="row filter-buttons">
           <button class="col-xs-2 col-sm-2 col-md-1 well background-hot((greyTabs['hot']))" title="Hot" ng-click="setStateFilter('hot')">
           <span class="button-text"><i class="icon-home"></i> Hot</span>
           </button>
           <button class="col-xs-3 col-sm-3 col-md-1 well background-trending((greyTabs['trending']))" title="Trending" ng-click="setStateFilter('trending')">
           <span class="button-text"><i class="icon-home"></i> Trending</span>
           </button>
           <button class="col-xs-2 col-sm-2 col-md-1 well background-new((greyTabs['latest']))" title="New" ng-click="setStateFilter('latest')">
           <span class="button-text"><i class="icon-home"></i> New</span>
           </button>
           <button class="col-xs-2 col-sm-2 col-md-1 well background-flat((greyTabs['flat']))" title="Flat" ng-click="setStateFilter('flat')">
           <span class="button-text"><i class="icon-home"></i> Flat</span>
           </button>
           <button class="col-xs-2 col-sm-2 col-md-1 well background-stop((greyTabs['stop']))" title="Stop" ng-click="setStateFilter('stop')">
           <span class="button-text"><i class="icon-home"></i> Stop</span>
           </button>
 
           <div class="search input-group col-xs-12 col-sm-12 col-md-2">
              <input type="text" class="form-control" ng-model="q" placeholder="Search news stories ..">
           </div>
 
 
           <button class="col-xs-5 col-sm-5 col-md-2 well select" data-toggle="modal" href="#myModal">
             <i class="icon-home"></i> 
             <span class="button-text">Highlight Topics</span>
             <i class="icon-home"></i> 
           </button>
       
        <button class="col-xs-5 col-sm-5 col-md-2 well select" data-toggle="modal" href="#dataModal">
           
             <span class="button-text">Today @ ((currTime))</span>
         </button>
     

       </div>
         
      </div>

      <div class="tags">
        <a ng-repeat="(idx, tag) in tags"  class="tag" ng-click="remove(idx)">((tag))</a>
      </div>
    
    <p ng-show="loading"><i class="icon-spinner icon-spin icon-large"></i></p>

    <div class="stories" ng-repeat="story in show | filter:q" ng-show="!loading" ng-animate="{enter: 'animate-enter', leave: 'animate-leave'}">

        <!-- <story> -->
        <div class="row story well">
          <div class="col-md-12">
            <div class="row" data-toggle="modal" href="#storyModal" ng-click="setStory(story)" >
              <div class="col-xs-12 col-sm-6 col-md-1">  
                <div class="row story-header story-((story.status))-header"  ng-cloak>
                  <span style="font-size:1.3em;">((story.status))</span>
                  <span>since 2:45 AM</span>
                </div>
              </div>

              <div class="col-xs-12 col-sm-6 col-md-6" style="font-size:1.2em;" ng-cloak>
                <p  class="((story.taged))">((story.title))</p>   
              </div>

              <div class="col-xs-12 col-sm-6 col-md-1 background-(( story.status )) demographics">
                <i class="icon-male icon-2x"></i>
                <i class="icon-female icon-2x"></i>
              </div>

              <div class="col-xs-12 col-sm-6 col-md-1 background-(( story.status )) age">
                <strong>Age 35+</strong>
              </div>  

              <div class="col-xs-12 col-sm-6 col-md-3 background-(( story.status )) virality-box">
                <p style="padding-top:10px;">Popularity</p> 
                <div class="progress">
                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                    <span class="sr-only">40% Complete (success)</span>
                  </div>
                </div>
              </div>  
            </div>
          </div>
        </div>
        <!-- </story> -->

    </div>

   <!-- Modal -->
   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-hidden="true">
      <div class="modal-dialog ">
         <div class="modal-content ">
            <div class="modal-header ">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               <h4 class="modal-title"><i class="icon-pencil" style="margin:0 15px 0 15px;"></i>Highlight Topics</h4>
            </div>
            <div class="modal-body ">
               <form id="my_form" accept-charset="UTF-8" action="/tagging" data-remote="true" method="post">
                  <div class="row rows-margin">
                     <div class="col-xs-12 col-sm-6 col-md-6">
                        <!--By Popularity : -->
                        <div class="row rows-margin rows-marginb">
                           <h5>
                              <li>By Popularity :</li>
                           </h5>
                           <div class="row rows-margin rows-marginb">
                              <div class="form-inline" >
                                 <input type="checkbox"  ng-model="highlight_form.popularityOver" > Over
                                 <div class="form-group">
                                    <input type="text"  ng-model="highlight_form.overValue" class="form-controls">
                                 </div>
                                 % Relative Popularity
                              </div>
                           </div>
                           <div class="row rows-margin rows-margint">
                              <div class="form-inline" >
                                 <input type="checkbox" ng-model="highlight_form.popularityUnder" > Under
                                 <div class="form-group">
                                    <input type="text" ng-model="highlight_form.underValue" class="form-controls">
                                 </div>
                                 % Relative Popularity
                              </div>
                           </div>
                        </div>
                        <!--By Audience Gender : -->
                        <div class="row rows-margin rows-marginb">
                           <h5>
                              <li>By Audience Gender :</li>
                           </h5>
                           <div class="row rows-margin">
                              <div class="radio">
                                 <label>
                                 <input type="radio" ng-model="highlight_form.gender" name="optionsRadios"  value="Mostly Male" >
                                 Mostly Male Audience
                                 </label>
                              </div>
                           </div>
                           <div class="row rows-margin" >
                              <div class="radio">
                                 <label>
                                 <input type="radio" ng-model="highlight_form.gender" name="optionsRadios" value="Mostly Female">
                                 Mostly Female Audience
                                 </label>
                              </div>
                           </div>
                           <div class="row rows-margin" >
                              <div class="radio">
                                 <label>
                                 <input type="radio" ng-model="highlight_form.gender" name="optionsRadios" value="Netural">
                                 Netural Gender Audience
                                 </label>
                              </div>
                           </div>
                        </div>
                        <!--By Growth-->
                        <div class="row rows-margin rows-marginb">
                           <h5>
                              <li>By Growth :</li>
                           </h5>
                           <div class="rows-marginb">
                              <div class="form-inline" >
                                 <input type="checkbox" ng-model="highlight_form.moreGrowth"> Grown More Than
                                 <div class="form-group">
                                    <input type="text" ng-model="highlight_form.moreGrowthValue" class="form-controls">
                                 </div>
                                 % In Last
                              </div>
                              <select class="selectpicker">
                                 <option>Hour</option>
                              </select>
                           </div>
                        </div>
                        <div class="row rows-margin rows-margint">
                           <div class="form-inline" >
                              <input type="checkbox" ng-model="highlight_form.lessGrowth" > Grown Less Than
                              <div class="form-group">
                                 <input type="text" ng-model="highlight_form.lessGrowthValue" class="form-controls">
                              </div>
                              % In Last
                           </div>
                           <select class="selectpicker">
                              <option>Hour</option>
                          </select>
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-6 col-md-6">
                        <!--By Audience Age : -->
                        <div class="row rows-margin rows-marginb">
                           <h5>
                              <li>By Audience Age :</li>
                           </h5>
                           <div class="row rows-margin rows-marginb">
                              <div class="form-inline" >
                                 <input type="checkbox" ng-model="highlight_form.overAge" > Average Viewer Age Over
                                 <div class="form-group">
                                    <input type="text" ng-model="highlight_form.overAgeValue" class="form-controls">
                                 </div>
                              </div>
                           </div>
                           <div class="row rows-margin rows-margint">
                              <div class="form-inline" >
                                 <input type="checkbox" ng-model="highlight_form.underAge" > Average Viewer Age Under
                                 <div class="form-group">
                                    <input type="text" ng-model="highlight_form.underAgeValue" class="form-controls">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!--By Keyword : -->
                        <div class="row rows-margin rows-marginb" >
                           <h5>
                              <li>By Keyword :</li>
                           </h5>
                           <div class="form-group">
    
           <input type="text" ng-model="highlight_form.keywords" name="tags1" placeholder="Add Tags"
                   id="tagmanager" autocomplete="off">
                          <p class="help-block">Type a Keyword and press "Enter" or "Return" to add it to Keywords</p>
                           </div>
                        </div>
                        <!--Other Optaions :-->
                        <div class="row rows-margin rows-marginb" >
                           <h5>
                              <li>Other Options :</li>
                           </h5>
                           <div class="row rows-margin" >
                              <div class="form-inline">
                                 <input type="checkbox" ng-model="highlight_form.highlight" ng-true-value="Highlight Topics You're Following"> Highlight Topics You're Following
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
            <div class="modal-footer" style="text-align: center">
               <button type="button" class="btn btn-default" data-dismiss="modal" ng-click="addTodo()">Do Highlight</button>
               <button type="button" class="btn btn-default" data-dismiss="modal" >Cancel</button>
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <!-- /.modal -->

<!-- Time & Date modl-->
<!-- Modal -->
 <script>
 function enableDate()
 {
   document.getElementById("form.datefieldId").disabled = false;
 };
 function enableTime()
 {
   document.getElementById("form.timefieldId").disabled = false;
 };
 </script>
   <div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-hidden="true">
      <div class="modal-dialog ">
         <div class="modal-content ">
            <div class="modal-header ">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               <h4 class="modal-title">Today Time</h4>
            </div>
            <div class="modal-body ">
               <form id="date_form" accept-charset="UTF-8" action="/tagging" data-remote="true" method="post">
                  <div class="row rows-margin rows-marginb">
           <h5>
              <li>Date :</li>
           </h5>
        <div class="row rows-margin">
          <div class="radio">
           <label>
               <input type="radio" ng-model="todayTime_form.currentDate" name="optionsRadios" value="cd" >
                Current Date
           </label>
          </div>
        </div>
            
        <div class="row rows-margin" >
          <div class="radio">
            
               <input type="radio" ng-model="todayTime_form.currentDate"  name="optionsRadios" onclick="enableDate()"  value="sd" >
               
                <div id="datepicker" class="input-append">
                  <input data-format="yyyy-MM-dd" id="form.datefieldId" ng-model="todayTime_form.selectedDate" type="text" class="wells"></input>
                 <span class="add-on">
                   <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                 </i>
                 </span>
                </div>
              
               <script type="text/javascript">
                    $(function() {
                      $('#datepicker').datetimepicker({
                        language: 'en',
                        pick12HourFormat: true
                      });
                     $('#form.datefieldId').val('0000-00-00');
                     $('#form.datefieldId').change(function () {
                     console.log($('#form.datefieldId ').val());
                     }); 
                    });
               </script>
            
           </div>
         
        </div>
      </div>


<!--By Time : -->

  <div class="row rows-margin rows-marginb">
           <h5>
              <li>Time :</li>
           </h5>
        <div class="row rows-margin">
          <div class="radio">
           <label>
               <input type="radio" ng-model="todayTime_form.currentTime" name="optionsRadio" value="ct">
                Current Time
           </label>
          </div>
        </div>
            
        <div class="row rows-margin" >
          <div class="radio">
           
              <input type="radio" ng-model="todayTime_form.currentTime" onclick="enableTime()" name="optionsRadio" value="st">
                
              <div id="timepicker" class="input-append">
                <input data-format="hh:mm:ss PP" id="form.timefieldId" type="text" ng-model="todayTime_form.tempTime" disabled="disabled" class="wells"></input>
                <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                </i>
                </span>
              </div>

              <script type="text/javascript">
                $(function() {
                  $('#timepicker').datetimepicker({
                   
                    pickDate: false
                  });
                 
                });
              </script>
            
          </div>
        </div>
      </div>

<!--By Time-Zone : -->

       <div class="row rows-margin rows-marginb">
            <h5>
              <li>Time Zone :</li>
           </h5>
         <div class="row rows-margin">
          <select class="selectpicker" ng-model="todayTime_form.timeZone" >
              <option>Eastern Standard Time</option>
          </select>
         </div>
            
         <div class="row rows-margin" >
          <input type="checkbox" ng-model="todayTime_form.checktimeZone" ng-true-value="Change Global Time Zone"> 
          Also Change Global Time Zone
         </div>
       </div>
               </form>
            </div>
            <div class="modal-footer" style="text-align: center">
               <button type="button" class="btn btn-default" data-dismiss="modal" ng-click="addChangeTime()">Change Time</button>
               <button type="button" class="btn btn-default" data-dismiss="modal" >Cancel</button>
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <!-- /.modal -->



   <!-- Modal -->
   <div class="modal fade" id="storyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-hidden="true">
      <div class="modal-dialog ">
         <div class="modal-content ">
            <div class="modal-header " style="text-align: center">
            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Close</button>
               <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-flag"></span>Follow Topic</button>
               <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-bookmark"></span>Explore Topic</button>
               
            </div>
            <div class="modal-body ">
              
               
  <div class="row compare" ng-repeat="story in selectedStory">

    <div class="col-xs-12 col-sm-6 col-md-12 compare-item border-right-light-dotted">

      <div class="lead">
        <blockquote class="border-((story.status))" >
          <p>((story.title))</p>
          
        </blockquote>
      </div>

      <hr />

      <div>
          <span class="lead">Status </span>
      </div>
      <hr/>

        <div class=" col-md-3 col-sm-3 col-xs-3">
           
       <div class="row story-header story-((story.status))-header"  >
        <span style="font-size:1.3em;">((story.status))</span>
         <span>since 2:45 AM</span>
        </div>
           
        </div>

        <div class="col-md-2 col-sm-1 col-xs-1"></div>
        
             
        <div class="card col-md-3 col-sm-3 col-xs-3">
           <h3 class="card-heading simple">Category Rank</h3>
           <div class="card-body">
              <p class="lead">7</p>
           </div>
        </div>
           
        </div>      

      </div>

      <hr/>

      <div>
          <i class="icon-globe icon-2x"></i>
          <span class="lead">Audience Demographics</span>
      </div>
      <hr />

      <div class="clearfix status">

        <div class="card col-md-3 col-sm-3 col-xs-3">
           <h3 class="card-heading simple">Areas Best In</h3>
           <div class="card-body">
              <p class="lead">6</p>
           </div>
        </div>

        <div class="col-md-1 col-sm-1 col-xs-1"></div>
              
        <div class="card col-md-3 col-sm-3 col-xs-3">
           <h3 class="card-heading simple ">Category Rank</h3>
           <div class="card-body">
              <p class="lead">7</p>
           </div>
        </div>

        <div class="col-md-1 col-sm-1 col-xs-1"></div>
         
        <div class="card col-md-3 col-sm-3 col-xs-3">
           <h3 class="card-heading simple  ">Popular Age Group</h3>
           <div class="card-body">
              <p class="lead">35+</p>
           </div>
        </div>      

      </div>

      <hr />
      
      <div class="lead">
          <i class="icon-long-arrow-up"></i>
          <span class="lead">Growth</span>
      </div>
      <hr />

      <div class="clearfix growth">

        <div class="card col-md-3 col-sm-3 col-xs-3">
           <h3 class="card-heading simple">Last 2 Days</h3>
           <div class="card-body">
              <p class="lead">426%</p>
           </div>
        </div>
        
        <div class="col-md-1 col-sm-1 col-xs-1"></div>
        
        <div class="card col-md-3  col-sm-3 col-xs-3">
           <h3 class="card-heading simple">Last 24 hours</h3>
           <div class="card-body">
              <p class="lead">102%</p>
           </div>
        </div>

        <div class="col-md-1 col-sm-1 col-xs-1"></div>
        
        <div class="card col-md-3 col-sm-3 col-xs-3">
           <h3 class="card-heading simple">Last 12 hours</h3>
           <div class="card-body">
              <p class="lead">35%</p>
           </div>
        </div>     

      </div>

      <hr />


      <div class="lead virality-header">
          <i class="icon-dashboard icon-large"></i>
          <span>Virality</span>
      </div>
      <hr />

      <div class="clearfix virality">
        <div class="progress progress-striped">
          <div class="progress-bar progress-bar-success" role="progressbar" ng-repeat="story in selectedStory" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:((story.social_meter))%">
            <span class="sr-only">40% Complete (success)</span>
          </div>
        </div>

        <div class="card col-md-3 col-sm-3 col-xs-3">
           <h3 class="card-heading simple">Overall Virality</h3>
           <div class="card-body">
              <p class="lead" ng-repeat="story in selectedStory">((story.social_meter))%</p>
           </div>
        </div>
        
        <div class="col-md-1 col-sm-1 col-xs-1"></div>
        
        <div class="card col-md-3  col-sm-3 col-xs-3">
           <h3 class="card-heading simple">News Sources</h3>
           <div class="card-body">
              <p class="lead">315</p>
           </div>
        </div>

        <div class="col-md-1 col-sm-1 col-xs-1"></div>
        
        <div class="card col-md-3 col-sm-3 col-xs-3">
           <h3 class="card-heading simple">Social Sources</h3>
           <div class="card-body">
              <p class="lead">135</p>
           </div>
        </div>      

      </div>
      <hr />

      <div class="lead">
          <i class="icon-pencil"></i>
          <span class="lead">Sources</span>
      </div>
      <hr />

      <div class="sources" ng-repeat="article in articleStory">
          <ul class="icons-ul" style="margin-left:0;">
            <li><i class="icon-li icon-angle-right"></i><a href="((article))" target="_blank">((article))</a></li>
           </ul>

      </div>


      <hr />

      <div class="lead">
          <i class="icon-camera-retro"></i>
          <span class="lead">Pictures</span>
      </div>
      <hr />

      <div class="pictures">
        <div id="carousel-example-generic" class="carousel slide">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner"  >
            <div class="item active" ng-repeat="story in selectedStory">
              <img class="img-responsive" src="((story.img))">
            </div>
            </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="icon-prev"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="icon-next"></span>
          </a>
        </div>

      </div>

       <hr />
      <div class="lead">
          <i class="icon-play"></i>
          <span class="lead">Video</span>
      </div>
      <hr />


    </div>
    
               
            </div>
            
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <!-- /.modal -->


</div>
<!-- /.ng-controller -->
@stop
