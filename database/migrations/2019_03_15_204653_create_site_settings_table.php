<?php

	use App\Models\SiteSetting;
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;

	class CreateSiteSettingsTable extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema ::create( 'site_settings', function ( Blueprint $table ) {
				$table -> increments( 'id' );
				$table -> string( 'key', 50 );
				$table -> longText( 'value' );
				$table -> timestamps();
			} );

			$data = [
				[ 'key' => 'app_name'                       , 'value' => 'test' ],
				[ 'key' => 'email'                          , 'value' => 'test@test.com' ],
				[ 'key' => 'phone'                          , 'value' => '11223344' ],
				[ 'key' => 'facebook'                       , 'value' => 'www.facebook.com' ],
				[ 'key' => 'twitter'                        , 'value' => 'www.twitter.com' ],
				[ 'key' => 'instagram'                      , 'value' => 'www.instagram.com' ],
				[ 'key' => 'about_ar'                       , 'value' => 'من نحن' ],
				[ 'key' => 'about_en'                       , 'value' => 'about' ],
                [ 'key' => 'terms_ar'                       , 'value' => 'الشروط والاحكام' ],
                [ 'key' => 'terms_en'                       , 'value' => 'terms' ],
			];

			SiteSetting ::insert( $data );
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down()
		{
			Schema ::dropIfExists( 'site_settings' );
		}
	}
