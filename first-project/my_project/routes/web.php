<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('first');
});
Route::get('/about',function(){
    return view('about');
});
Route::get('/contact',function(){
    return view('contact');
});
Route::get('/posted{id?}',function(string $id=null){
    if($id){
     return "<h1> $id </h1>";
    }
    else{
        return "<h1>No any Id found</h1>";
    }

})
// Route::get('/',function(){
//     return view('welcome');
// })

// Route::prefix('page')->group(function(){
// Route::get('/about/newinformation',function(){
//     return view('prac1');
// });
// Route::view('/contact','contact');
// Route::get('/blog/oneblog/second',function(){
//     return view('firstblog');
// })->name('myblogs');
// });

// Route::get('/exit/{id}',function($id=null){
//     return"value of id : ".($id??"no any id found");
// });
// Route::get('/home',function(){
// return view('home');
// });
// Route::fallback(function(){
// return "Page Not Found";
// })

 ?>