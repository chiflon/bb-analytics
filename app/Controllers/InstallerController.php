<?php
/**
 * @Author: Daniel Lozano
 * @Date:   2016-06-19 09:33:51
 * @Last Modified by:   Daniel Lozano
 * @Last Modified time: 2016-06-20 10:09:44
 */
namespace BBAnalytics\Controllers;

use BBAnalytics\Classes\Controller;
use BBAnalytics\Classes\Installer;
use BBAnalytics\Classes\View;

class InstallerController extends Controller {

    public function install()
    {
        $installer = new Installer;

        if(Installer::isInstalled())
            header('location:/');

        if(isset($_GET['install']))
        {
            if ($installer->install())
            {
                header('location:/');
            }
        }

        return (new View('installer.install'))->render(
            [
                'pageTitle' => 'Installation',
                'installer' => $installer
            ]
        );
    }
}