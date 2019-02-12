
/**
 * Created by PhpStorm.
 * User: varun.reddy
 * Date: 7/17/2018
 * Time: 4:07 PM
 */
<?php
    Route::get('/',function (){

    return view('welcome');

    });


Route::group(['middleware'=>['web']],function ()
{

});

?>