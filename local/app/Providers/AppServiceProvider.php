<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $data['listcat'] = DB::table('vp_cat')->get();
        $data['featured'] = DB::table('vp_post')->where('post_featured',1)->orderBy('post_id','desc')->get();
        //phương thức view()->share() giúp truyền dữ liệu đến tất cả các view được tải lên
        view()->share($data);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
