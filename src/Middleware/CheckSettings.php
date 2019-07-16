<?php

namespace RazorMeister\Installer\Middleware;

use Closure;
use RazorMeister\Installer\Helpers\SettingsManager;

class CheckSettings
{
    private $settingsManager;

    /**
     * CheckSettings constructor.
     *
     * @param SettingsManager $settingsManager
     */
    public function __construct(SettingsManager $settingsManager)
    {
        $this->settingsManager = $settingsManager;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->settingsManager->envFileExists()) {
            return $next($request);
        } else {
            return redirect(route('installer.mainSettings'))->with('error', trans('installer::lang.checkSettings'));
        }
    }
}
