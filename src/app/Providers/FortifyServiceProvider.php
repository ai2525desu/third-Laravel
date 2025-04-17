<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 下記はApp\Actions\Fortifyのファイルをクラスとして読み込んでいる。
        // 新規ユーザー登録用
        Fortify::createUsersUsing(CreateNewUser::class);

        // 初期値で入っていた内容は使用しない機能のため今回削除。下記は追記。

        // Getメソッドで/registerにアクセスしたときに表示するView
        Fortify::registerView(function () {
            return view('auth.register');
        });

        // Getメソッドで/loginにアクセスしたときに表示するView
        Fortify::loginView(function () {
            return view('auth.login');
        });

        // login処理の実行回数を1分あたり１０回までに制限
        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;
            return Limit::perMinute(10)->by($email . $request->ip());
        });
    }
}
