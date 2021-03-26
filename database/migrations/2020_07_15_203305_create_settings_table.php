<?php

use App\Models\Setting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table -> string( 'key', 50 );
			$table -> longText( 'value' );
            $table->timestamps();
        });

        $data = [

            [ 'key' => 'email'                          , 'value' => 'email@yahoo.com'              ],
            [ 'key' => 'phone'                          , 'value' => '01069541294'                  ],
            [ 'key' => 'facebook'                       , 'value' => 'https://www.facebook.com'     ],
            [ 'key' => 'twitter'                        , 'value' => 'https://www.twitter.com'      ],
            [ 'key' => 'instagram'                      , 'value' => 'https://www.instagram.com'    ],
            [ 'key' => 'terms_ar'                       , 'value' => 'terms_ar'                     ],
            [ 'key' => 'terms_en'                       , 'value' => 'terms_en'                     ],
            [ 'key' => 'about_ar'                       , 'value' => 'about_ar'                     ],
            [ 'key' => 'about_en'                       , 'value' => 'about_en'                     ],
        ];

        Setting ::insert( $data );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
