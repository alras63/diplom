<?php

namespace App\Providers;

use App\Course;
use App\CoursePay;
use App\Nova\Actions\AgreeRequests;
use App\Nova\Actions\ExportRequests;
use App\Nova\RequestR;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Cards\Help;
use App\Nova\Metrics\NewUsers;
use App\Nova\Metrics\CoursesCount;
use App\Nova\Metrics\UserLessonCompleteCount;
use Laravel\Nova\Nova;
use App\Nova\NovaMenuMenu;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();


    }


    protected function resources()
    {
        parent::resources();
        view()->composer('*', function($view)
        {
            $user = Auth::user();

            if(isset($user) && $user->hasRole('ruc-dop')) {
                Nova::resources([
                    \App\Nova\RequestR::class,
                    \App\Nova\Course::class,
                    \App\Nova\CoursePay::class,
                    \App\Nova\Module::class,
                    \App\Nova\Lesson::class,
                    \App\Nova\User::class,
                    \App\Nova\Polya::class,
                    \App\Nova\CompetentionsBlock::class,
                    \App\Nova\TgUser::class,
                    \App\Nova\TgEvent::class,
                    \App\Nova\PriemEventRequest::class,
                    \App\Nova\PriemEventRequest::class,
//                    ExportRequests::class,
//                    AgreeRequests::class
                ]);
            } else if($user->hasRole('super-admin')) {
                 Nova::resourcesIn(app_path('Nova'));
            }
        });
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return $user->hasRole('super-admin') || $user->hasRole('ruc-dop');
        });
        Gate::define('viewCourses', function ($user, CoursePay $coursepay) {
            return $user->id === $coursepay->user_id;
        });
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            new NewUsers,
            new CoursesCount,
            new UserLessonCompleteCount,
        ];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
//            new \Cloudstudio\ResourceGenerator\ResourceGenerator(),
//            new \OptimistDigital\MenuBuilder\MenuBuilder,
//            new \Vyuldashev\NovaPermission\NovaPermissionTool,

        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        Gate::before(function ($user, $ability) {
            return $user->hasRole('super-admin') ||  $user->hasRole('ruc-dop');
        });
    }
}
