<?php

// Put this into Controller.php

namespace Plugin\GridWidget\Widget\GridWidget;

use \Plugin\GridWidget\Model;

class Controller extends \Ip\WidgetController
{
    public function generateHtml($revisionId, $widgetId, $data, $skin)
    {

        $items = Model::widgetItems($widgetId);


        $data['items'] = $items;

        return parent::generateHtml($revisionId, $widgetId, $data, $skin);
    }



    /**
     * Duplicate widget action
     *
     * This function is executed after the widget has been duplicated.
     * All widget data is duplicated automatically. This method is used only in case a widget
     * needs to do some maintenance tasks on duplication.
     *
     * @param int $oldId Old widget ID
     * @param int $newId Duplicated widget ID
     * @param array $data Data that has been duplicated from old widget to the new one
     * @return array
     */
    public function duplicate($oldId, $newId, $data)
    {
        $oldItems = Model::widgetItems($oldId);
        foreach($oldItems as $item) {
            $item['widgetId'] = $newId;
            unset($item['id']);
            Model::addItem($item);
        }
    }


    /**
     * Delete a widget
     *
     * This method is executed before actual deletion of a widget.
     * It is used to remove widget data (e.g., photos, files, additional database records and so on).
     * Standard widget data is being deleted automatically. So you don't need to extend this method
     * if your widget does not upload files or add new records to the database manually.
     * @param int $widgetId Widget ID
     * @param array $data Data that is being stored in the widget
     */
    public function delete($widgetId, $data)
    {
        Model::removeWidgetItems($widgetId);
    }
}

