<?php

	use App\Models\Role;
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;

	class CreateRolesTable extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema ::create( 'roles', function ( Blueprint $table ) {
				$table -> increments( 'id' );
				$table -> string( 'name_ar');
				$table -> string( 'name_en');
                $table -> softDeletes();
				$table -> timestamps();
			} );


			Role ::create( [ 'name_ar' => 'ادمن','name_en'=>'admin' ] );

		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down()
		{
			Schema ::dropIfExists( 'roles' );
		}
	}
