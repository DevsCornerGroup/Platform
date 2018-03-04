<?php

namespace App\Http\Controllers;

use Artisan;
use Illuminate\Support\Facades\Cache;

class SSHController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'administrator']);
    }

    /**
     * flushes all the cache in redis.
     *
     * @return redirect
     */
    public function flushAll()
    {
        Cache::flush();

        session()->flash('status', 'Redis cache cleared');

        return back();
    }

    /**
     * clears the artisan cache.
     *
     * @return redirect
     */
    public function clearCache()
    {
        Artisan::call('cache:clear');

        session()->flash('status', 'Artisan cache cleared');

        return back();
    }

    /**
     * clears the artisan cache.
     *
     * @return redirect
     */
    public function viewCache()
    {
        Artisan::call('view:clear');

        session()->flash('status', 'Views cleared');

        return back();
    }

    /**
     * clears the artisan cache.
     *
     * @return redirect
     */
    public function startMaintenanceMode()
    {
        Artisan::call('down');

        return back();
    }

    /**
     * clears the artisan cache.
     *
     * @return redirect
     */
    public function stopMaintenanceMode()
    {
        Artisan::call('up');

        return back();
    }
}
