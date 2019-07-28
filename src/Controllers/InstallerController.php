<?php

namespace RazorMeister\Installer\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RazorMeister\Installer\Helpers\AccountManager;
use RazorMeister\Installer\Helpers\ConfigManager;
use RazorMeister\Installer\Helpers\InfoFileChecker;
use RazorMeister\Installer\Helpers\PackageChecker;
use RazorMeister\Installer\Helpers\PermissionsChecker;
use RazorMeister\Installer\Helpers\SettingsManager;

class InstallerController extends Controller
{
    private $configManager;

    /**
     * InstallerController constructor.
     *
     * @param ConfigManager $configManager
     */
    public function __construct(ConfigManager $configManager)
    {
        $this->configManager = $configManager;
    }

    /**
     * Show greeting site.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function start()
    {
        session(['timeStart' => time()]);

        return view('installer::start');
    }

    /**
     * Show packages page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function packages()
    {
        $packageChecker = new PackageChecker();
        $phpVerInfo = $packageChecker->checkPhpVersion(config('installer.minPhpVersion'));
        $packagesInfo = $packageChecker->checkPackages(config('installer.requiredPackages'));

        return view('installer::packages')->with(['phpVerInfo' => $phpVerInfo, 'packagesInfo' => $packagesInfo]);
    }

    /**
     * Show permission page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function permissions()
    {
        $permissionsChecker = new PermissionsChecker();
        $permsInfo = $permissionsChecker->checkPermission(config('installer.neededPermissions'));

        return view('installer::permissions')->with(['permsInfo' => $permsInfo]);
    }

    /**
     * Show mainSettings page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mainSettings()
    {
        $settingManager = new SettingsManager();
        $isEnvFile = $settingManager->envFileExists();
        $currentSettings = $settingManager->getEnvInfo();
        $zones = config('installer.mainSettings');
		$setUpDbError = session('setUpDbError') ? session('setUpDbError') : false;

        return view('installer::mainSettings')->with(['isEnvFile' => $isEnvFile, 'currentSettings' => $currentSettings, 'zones' => $zones, 'setUpDbError' => $setUpDbError]);
    }

    /**
     * Validate and save settings.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function mainSettingsSave(Request $request)
    {
        $settingManager = new SettingsManager();

        $request->validate($this->configManager->getMainSettingsRules());

        $result = $settingManager->saveEnvInfo($request->all());

        if ($result['success']) {
            return redirect()->back()->with('success', trans('installer::lang.controller.settingsSaved'));
        } elseif (isset($result['createEnv'])) {
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', $result['error'])->withInput();
        }
    }

    /**
     * Set Up Db (run migrations and seeders).
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setUpDb(Request $request)
    {
        $settingManager = new SettingsManager();

        $result = $settingManager->setUpDb();

        if ($result['success']) {
            return redirect()->route('installer.account')->with('success', trans('installer::lang.controller.setUpDb'));
        } else {
            return redirect()->back()->with('error', $result['error'])->withInput();
        }
    }

    /**
     * Show account page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function account()
    {
        $accountManager = new AccountManager();
        $fields = config('installer.account.fields');

        if ($isInDb = $accountManager->isUserInDb()) {
            $user = $accountManager->getFirstUser();
        } else {
            $user = [];
        }

        return view('installer::account')->with(['isInDb' => $isInDb, 'user' => $user, 'fields' => $fields]);
    }

    /**
     * Validate user's data and save user to db.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function accountSave(Request $request)
    {
        $accountManager = new AccountManager();

        if ($accountManager->isUserInDb()) {
            return redirect()->back()->with('error', trans('installer::lang.controller.alreadyInDb'));
        }

        $request->validate($this->configManager->getAccountRules());

        if ($accountManager->createAccount($request->all())) {
            return redirect()->route('installer.finish')->with('success', trans('installer::lang.controller.accountCreated'));
        } else {
            return redirect()->back()->with('error', trans('installer::lang.controller.errorAccount'))->withInput();
        }
    }

    /**
     * Show finish info.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function finish()
    {
        if (session('timeStart')) {
            $time = (time() - session('timeStart')).' second(s)';
        } else {
            $time = '---';
        }

        return view('installer::finish')->with(['time' => $time]);
    }

    /**
     * Save installerInfo file.
     *
     * @param Request $request
     *
     * @return string
     */
    public function finishSave(Request $request)
    {
        $infoFileChecker = new InfoFileChecker();
        $infoFileChecker->saveFile();

        return redirect()->route('login');
    }
}
