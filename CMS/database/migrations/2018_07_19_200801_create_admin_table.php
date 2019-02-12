<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateAdminTable
 *
 * @author Varun Reddy varun.reddy@goftx.com
 */
class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable("admin"))
        {
            Schema::create('admin',function(Blueprint $table)

            {

                $table->increments('id');
                $table->string("username",100);
                $table->string("email",50);
                $table->string('hash_password',100);
                $table->timestamps();

            }
            );
        }
        }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
