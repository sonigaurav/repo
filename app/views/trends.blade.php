@section('content')

<div class="col-sm-12">

  <div class="row compare">

    <div class="section col-md-4 compare-item border-right-light-dotted inset">

      <div class="lead">
          <p style="text-align:center;"><i class="icon-arrow-up icon-large" style="margin-right:15px;"></i>Gaining Speed</p>
      </div>
      <hr />

      <div class="stories">

        @for ($i = 0; $i < 5; $i++)

        <?php 

          $type = array("hot");
          $status = $type[array_rand($type)];

          $type = array("up");
          $direction = $type[array_rand($type)];

        ?>

        <!-- <story> -->
        <div class="row story border-{{ $status }} well">

          <div class="col-md-12">

            <div class="row">
              <div class="col-md-8 col-sm-8 col-xs-8 story-stats clearfix">
                 <span class="small time">2:45 PM</span>
                 <span class="demographic text-{{ $status }}"><i class="icon-arrow-{{ $direction }}" style="margin-right:5px;"></i><span>426%</span></span>
              </div>
            </div>
            
            <div class="row story-snippet">
              <p>A violin played by the Titanic's bandleader as the ship sank sold at auction Saturday for more than $1.7 million, a UK-based auction house said.</p>
            </div>

            <div class="row categories pull-right">
              <div class="col-md-12 col-sm-12 col-xs-12 small">
                <span>Politics</span>
                <span>World</span>
              </div>
            </div>

          </div>

        </div>
        <!-- </story> -->
        @endfor

      </div>  

    </div>

    <div class="section col-md-4 compare-item border-right-light-dotted inset">

        <ul id="myTab" class="nav nav-tabs" style="margin-bottom:20px;">
          <li class="active"><a href="#home" data-toggle="tab">Top</a></li>
          <li class=""><a href="#profile" data-toggle="tab">Topics</a></li>
          <li class="dropdown">
            <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown">National <b class="caret"></b></a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
              <li><a href="#dropdown1" tabindex="-1" data-toggle="tab">State</a></li>
              <li><a href="#dropdown2" tabindex="-1" data-toggle="tab">City</a></li>
            </ul>
          </li>
        </ul>
        <div id="myTabContent" class="tab-content">
          <div class="tab-pane fade active in" id="home">
            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
          </div>
          <div class="tab-pane fade" id="profile">
            <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
          </div>
          <div class="tab-pane fade" id="dropdown1">
            <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
          </div>
          <div class="tab-pane fade" id="dropdown2">
            <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
          </div>
        </div>
   
    </div>

    <div class="section col-md-4 compare-item inset">

      <div class="lead">
          <p style="text-align:center;"><i class="icon-comments-alt icon-large" style="margin-right:15px;"></i>Follow Up</p>
      </div>
      <hr />


      <div class="stories">

        @for ($i = 0; $i < 5; $i++)

        <?php 

          $type = array("hot", "new", "trending", "flat");
          $status = $type[array_rand($type)];

          $type = array("up","down");
          $direction = $type[array_rand($type)];

        ?>

        <!-- <story> -->
        <div class="row story border-{{ $status }} well">

          <div class="col-md-12">

            <div class="row">
              <div class="col-md-8 col-sm-8 col-xs-8 story-stats clearfix">
                 <span class="small time">2:45 PM</span>
                 <span class="demographic text-{{ $status }}"><i class="icon-arrow-{{ $direction }}" style="margin-right:5px;"></i><span>426%</span></span>
              </div>

              <div class="col-md-4 col-sm-4 col-xs-4 icon-options pull-right">
                <a href="/"><i class="icon-flag icon"></i></a>
              </div>

            </div>
            
            <div class="row story-snippet">
              <p>A violin played by the Titanic's bandleader as the ship sank sold at auction Saturday for more than $1.7 million, a UK-based auction house said.</p>
            </div>

            <div class="row categories pull-right">
              <div class="col-md-12 col-sm-12 col-xs-12 small">
                <span>Politics</span>
                <span>World</span>
              </div>
            </div>

          </div>

        </div>
        <!-- </story> -->
        @endfor

      </div>  



    </div>

  </div>

</div>

@stop

@section('scripts')

    <script>
      $(function () {
        $('#myTab a:first').tab('show')
      })
    </script>

@stop