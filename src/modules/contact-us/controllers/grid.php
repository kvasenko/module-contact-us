<?php
/**
 * Grid of contact us messages
 * @return closure
 */

/**
 * @namespace
 */
namespace Application;

use Bluz\Proxy\Layout;
use Bluz\Proxy\Request;
use Bluz\Controller\Controller;

/**
 * @param int $id
 * @param string $mark
 * @param int $value
 */
return function ($id, $mark, $value) {
    /**
     * @var Controller $this
     */
    Layout::setTemplate('dashboard.phtml');
    Layout::breadCrumbs(
        [
            Layout::ahref('Dashboard', ['dashboard', 'index']),
            __('Contact Us')
        ]
    );

    if (Request::isPost()) {
        $row = ContactUs\Table::findRow($id);
        if ($mark == 'read') {
            $row->mark_read = $value;
        } elseif ($mark == 'answered') {
            $row->mark_answered = $value;
        }
        $row->save();
    }

    $grid = new ContactUs\Grid();
    $grid->setModule($this->module);
    $grid->setController($this->controller);

    $this->assign('grid', $grid);
};
