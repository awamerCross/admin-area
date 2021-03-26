<?php

	use App\Models\Ads;
	use App\Models\Award;
use App\Models\Banner;
use App\Models\Blog;
	use App\Models\Category;
	use App\Models\City;
	use App\Models\ContactUs;
use App\Models\Country;
use App\Models\Elearn;
	use App\Models\Event;
	use App\Models\ExtraPage;
	use App\Models\ReportComment;
	use App\Models\Favourite;
	use App\Models\FavouriteAds;
	use App\Models\FavouriteMarket;
	use App\Models\HomeSlider;
	use App\Models\Job;
	use App\Models\News;
	use App\Models\Order;
	use App\Models\Payment;
	use App\Models\Payout;
	use App\Models\Permission;
	use App\Models\Practical;
	use App\Models\Research;
	use App\Models\Service;
	use App\Models\UserType;
	use App\User;
	use Illuminate\Support\Facades\App;
	use Illuminate\Support\Facades\Route;
	use Image as IM;
	use LaravelFCM\Facades\FCM;
	use LaravelFCM\Message\OptionsBuilder;
	use LaravelFCM\Message\PayloadDataBuilder;
	use LaravelFCM\Message\PayloadNotificationBuilder;


	function Home()
	{

		$colors = [ '#1abc9c', '#2ecc71', '#3498db', '#9b59b6', '#7FB3D5', '#e67e22', '#229954', '#f39c12', '#F6CD61',
		            '#FE8A71', '#199EC7', '#C39BD3', '#5b239c', '#73603e' ];
		$home   = [
			[
				'name'  => 'المشرفين',
				'count' => User ::where( 'role_id', '!=', 0 ) -> count(),
				'icon'  => '<i class="fa fa-users"></i>',
				'color' => $colors[ array_rand( $colors ) ]
			],
            [
                'name'  => 'الاقسام',
                'count' => Category ::  count(),
                'icon'  => '<i class="fa fa-list"></i>',
                'color' => $colors[ array_rand( $colors ) ]
            ],

			[
				'name'  => 'الاخبار',
				'count' => News :: count(),
				'icon'  => '<i class="fa fa-location-arrow"></i>',
				'color' => $colors[ array_rand( $colors ) ]
			],

		];

		return $blocks[] = $home;
	}


	function updateRole( $id )
	{


		//get all routes
		$routes      = Route ::getRoutes();
		$permissions = Permission ::where( 'role_id', $id ) -> pluck( 'permission' ) -> toArray();

		$m = null;
		foreach ( $routes as $value ) {
			if ( $value -> getName() !== null ) {

				//display main routes
				if ( isset( $value -> getAction()[ 'type' ] ) && $value -> getAction()[ 'type' ] == 'parent' &&
				     isset( $value -> getAction()[ 'icon' ] ) && $value -> getAction()[ 'icon' ] != null ) {

					echo '<div class = "col-xs-3">';
					echo '<div class = "per-box">';


					// main route
					echo ' <label>';
					echo '<input type = "checkbox" name = "permissions[]"';

					if ( in_array( $value -> getName(), $permissions ) )
						echo ' checked';

					echo '  value="' . $value -> getName()
					     . '">';
					echo ' <span class = "checkmark"></span>';
					echo '<span class = "name">' . $value -> getAction()[ "title" ] . '</span>';
					echo '</label>';

					//sub routes

					if ( isset( $value -> getAction()[ "child" ] ) ) {


						$childs = $value -> getAction()[ "child" ];

						$r2 = Route ::getRoutes();

						foreach ( $r2 as $r ) {


							if ( $r -> getName() !== null && in_array( $r -> getName(), $childs ) ) {

								echo ' <label>';
								echo '<input type = "checkbox" name = "permissions[]"';

								if ( in_array( $r -> getName(), $permissions ) )
									echo ' checked ';

								echo ' value="' . $r -> getName() . '">';
								echo ' <span class = "checkmark"></span>';
								echo '<span class = "name">' . $r -> getAction()[ "title" ] . '</span>';
								echo '</label>';
							}
						}
					}


					echo ' </div>';
					echo '</div>';

				}
			}
		}


	}


	#current route
	function currentRoute()
	{
		$routes               = Route ::getRoutes();
		foreach ( $routes as $value ) {
			if ( $value -> getName() === Route ::currentRouteName() ) {
				echo $value -> getAction()[ 'title' ];
			}
		}
	}


	function convert2english( $string )
	{
		$newNumbers            = range( 0, 9 );
		$arabic                = array( '٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩' );
		$string                = str_replace( $arabic, $newNumbers, $string );
		return $string;
	}


	function generate_code()
	{
		$characters             = '0123456789';
		$charactersLength       = strlen( $characters );
		$token                  = '';
		$length                 = 5;
		for ( $i = 0; $i < $length; $i++ ) {
			$token             .= $characters[ rand( 0, $charactersLength - 1 ) ];
		}
		return $token;
	}


	function Send_FCM( $device_id, $device_type = 'android', $sent_data )
	{
        $sent_data['title']     = 'Life Care';
		$optionBuilder          = new OptionsBuilder();
		$optionBuilder          -> setTimeToLive( 60 * 20 );
		$notificationBuilder    = new PayloadNotificationBuilder( $sent_data[ 'title' ] );
		$notificationBuilder    -> setBody( $sent_data[ 'body' ] ) -> setSound( 'default' );


		$option                 = $optionBuilder -> build();
		$notification           = $notificationBuilder -> build();
		$dataBuilder            = new PayloadDataBuilder();
		$dataBuilder            -> addData( $sent_data );
		$data                   = $dataBuilder -> build();
		$token                  = $device_id;


		if ( $device_type == 'android' ) {
			$downstreamResponse = FCM ::sendTo( $token, $option, null, $data );
		} else {
			$downstreamResponse = FCM ::sendTo( $token, $option, $notification, $data );
		}

		$downstreamResponse     -> numberSuccess();
		$downstreamResponse     -> numberFailure();
		$downstreamResponse     -> numberModification();

	}


    function lang()
    {
        return App() -> getLocale();
    }
