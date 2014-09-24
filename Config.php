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

/**
 * Class Config
 * @package Plugin\GridWidget
 */

class Config
{
    /**
     * Table name to store records
     */
    const TABLE_NAME = 'grid_widget';

    /**
     * GRID config
     */
    public static function grid()
    {
        $gridConfig = array(
            'title' => 'Items',
            'table' => Config::TABLE_NAME,
            'sortField' => 'itemOrder',
            'createPosition' => 'top',
            'createFilter' => function($data) {
                $data['widgetId'] = ipRequest()->getQuery('widgetId');
                return $data;
            },
            'fields' => array(
                array(
                    'label' => 'Title',
                    'field' => 'title',
                    'validators' => array('Required')
                ),
                array(
                    'label' => 'Image',
                    'field' => 'image',
                    'type' => 'RepositoryFile'
                ),
                array(
                    'label' => 'Visible',
                    'field' => 'isVisible',
                    'type' => 'Checkbox',
                    'defaultValue' => 1
                )
            )
        );
        return $gridConfig;
    }
}
