<?php

namespace App\Http\Middleware;

use Session;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'appName' => config('app.name'),
            'auth' => fn () => $request->user()? $request->user()->only('id', 'name', 'email'): null,
            'baseURL' => config('app.url'),
            'publicURL' => config('app.asset_url'),
            'flash' => [
                'message' => function () use ($request) {
                    return [
                        'success' => $request->session()->get('success'),
                        'error' => $request->session()->get('error'),
                        'info' => $request->session()->get('info'),
                        'link' => $request->session()->get('link'),
                    ];
                }
            ],
            'errors' => function () {
                return Session::get('errors')
                ? Session::get('errors')->getBag('default')->getMessages()
                : (object) [];
            }
        ]);
    }
}
