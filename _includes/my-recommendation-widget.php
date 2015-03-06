<?php
@session_start();
include_once('core/core.php');

$email = $_SESSION['email'];
//$email = 'aboon@gmail.com';

if( !isset($email) ) { echo 'Not logged in'; return; }

/* $quest_whitening = file_get_contents('http://blackboxdev.co/projects/garnierx/hazrat/json/whitening.json');
$json = json_decode($quest_whitening, true); // decode the JSON into an associative array
echo '<pre>' . print_r($json, true) . '</pre>'; */

$image_root = 'hazrat/';
$last_recommendation = Recommendation::where('user_email' , '=', $email)->orderBy('updated_at', 'desc')->first();

//echo $last_recommendation->image;

?>

<style>
.glyphicon {  margin-bottom: 10px;margin-right: 10px;}

small {
	display: block;
	line-height: 1.428571429;
	color: #999;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="<?php echo $image_root . $last_recommendation->image; ?>" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4><?php echo $last_recommendation->product_name; ?></h4>
                        <small><cite title="San Francisco, USA">Your selections:</cite></small>
                        <ul class="list-group">
							<?php 
							foreach(explode('|', $last_recommendation->options_selected) as $opt){
							?>
								<li class="list-group-item"><i class="fa fa-check-square-o"></i>
								<?php echo $opt;?></li>
							<?php
							}
							?>
						  
						</ul>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


