<?php
/**
 * @package   ImpressPages
 */


/**
 * Created by PhpStorm.
 * User: mangirdas
 * Date: 14.9.22
 * Time: 18.15
 */

namespace Plugin\GridWidget;


class Event
{
    public static function ipBeforeController()
    {
        if (ipIsManagementState()) {
            ipAddCss('assets/gridWidget.css');
        }
    }
}
