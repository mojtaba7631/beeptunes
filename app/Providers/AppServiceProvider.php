<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\ContactUs;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Paginator::useBootstrap();

        View::composer(["admin.*"], function ($view) {
            $user_info = \App\Models\User::query()
                ->where('id', auth()->id())
                ->firstOrFail();

            //get profile image
            $images = $user_info->images;
            $placeholder = asset('admin/assets/images/placeholders/user_placeholder.png');
            $profile = $this->get_user_image($images, 'profile', $placeholder, false);
            $user_info['profile'] = $profile;

            $view->with('user_info', $user_info);
        });

        View::composer(["site.*", "login.*"], function ($view) {

            if (isset($_COOKIE['cart'])) {
                $cookie = $_COOKIE['cart'];

                $cart_count = Cart::query()
                    ->where('cookie', $cookie)
                    ->count();
            } else {
                $cart_count = 0;
            }

            $contact_us_info_provider = ContactUs::query()->first();

            $view->with('cart_count', $cart_count);
            $view->with('contact_us_info_provider', $contact_us_info_provider);
        });
    }

    function get_user_image($images, $image_name, $placeholder, $withoutAsset)
    {
        $profile = $placeholder;
        foreach ($images as $image) {
            if ($image['image_name'] == $image_name) {
                $profile = $image->pivot->image_src;
                break;
            }
        }

        if (file_exists($profile) and !is_dir($profile)) {
            if ($withoutAsset) {
                return $profile;
            } else {
                return asset($profile);
            }
        } else {
            if ($placeholder) {
                return $placeholder;
            } else {
                return '';
            }
        }
    }
}
