<?php
/**
 * @package   ImpressPages
 */


/**
 * Created by PhpStorm.
 * User: mangirdas
 * Date: 14.9.22
 * Time: 23.27
 */

namespace Plugin\GridWidget;


class Model {

    public static function widgetItems($widgetId, $visibleOnly = true)
    {
        $params = array(
            'widgetId' => $widgetId
        );
        if ($visibleOnly) {
            $params['isVisible'] = 1;
        }
        return ipDb()->selectAll(Config::TABLE_NAME, '*', $params, ' ORDER BY `itemOrder` asc');
    }



    public static function addItem($data)
    {
        ipDb()->insert(Config::TABLE_NAME, $data);
    }

    public static function removeWidgetItems($widgetId)
    {
        return ipDb()->delete(Config::TABLE_NAME, array('widgetId' => $widgetId));
    }

}
