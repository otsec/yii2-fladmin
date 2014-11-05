<?php

namespace otsec\yii2\fladmin;

use yii\widgets\Menu;

/**
 * Class MainMenu
 * @author Artem Belov <razor2909@gmail.com>
 */
class MainMenu extends Menu
{
    /**
     * @inheritdoc
     */
    public $options = [
        'class' => 'sidebar-menu',
        'id' => 'nav-accordion'
    ];

    /**
     * @inheritdoc
     */
    public $itemOptions = [
        'class' => 'sub-menu'
    ];

    /**
     * @inheritdoc
     */
    public $submenuTemplate = "\n<ul class='sub'>\n{items}\n</ul>\n";
}