<?php

Route::get('contact',function(){
  return view('contact/index');
});

Route::post('contact','ContactController@postIndex');

?>
