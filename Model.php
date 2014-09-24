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
    const TABLE_NAME = 'grid_widget';

    public static function widgetItems($widgetId, $visibleOnly = true)
    {
        $params = array(
            'widgetId' => $widgetId
        );
        if ($visibleOnly) {
            $params['isVisible'] = 1;
        }
        return ipDb()->selectAll(self::TABLE_NAME, '*', $params, ' ORDER BY `itemOrder` asc');
    }



    public static function addItem($data)
    {
        ipDb()->insert(self::TABLE_NAME, $data);
    }

    public static function removeWidgetItems($widgetId)
    {
        return ipDb()->delete(self::TABLE_NAME, array('widgetId' => $widgetId));
    }

}
