<?php
/**
 * @Author: Daniel Lozano
 * @Date:   2016-06-18 20:17:58
 * @Last Modified by:   Daniel Lozano
 * @Last Modified time: 2016-06-20 07:33:36
 */
namespace BBAnalytics\Controllers;

use BBAnalytics\Models\ClicksTrackingTest;
use BBAnalytics\Classes\Controller;
use BBAnalytics\Classes\View;

class TopUserAgentsController extends Controller{

    /**
     * Show Top User Agents site
     */
    public function index()
    {
        $topUserAgents = (!empty($_GET)) ? (new ClicksTrackingTest)->getTopUserAgent($_GET) : '';

        return (new View('top_useragents.index'))->render(
            [
                'pageTitle' => 'TOP User Agents',
                'topUserAgents' => $topUserAgents
            ]
        );
    }

}