<?php
/**
 * Grid of contact us messages
 * @return closure
 */
namespace Application;

use Bluz\Proxy\Layout;
use Bluz\Proxy\Request;
use Bluz\Controller;

return
    /**
     * @param int $id
     * @param string $mark
     * @param int $value
     *
     * @return \closure
     */
    function ($id, $mark, $value) use ($view, $module, $controller) {
        /**
         * @var Bootstrap $this
         * @var \Bluz\View\View $view
         */
        Layout::setTemplate('dashboard.phtml');
        Layout::breadCrumbs(
            [
                $view->ahref('Dashboard', ['dashboard', 'index']),
                __('Contact Us')
            ]
        );

        if (Request::isPost()) {
            $row = ContactUs\Table::findRow($id);
            if ($mark == 'read') {
                $row->mark_read = $value;
            } elseif($mark == 'answered') {
                $row->mark_answered = $value;
            }
            $row->save();
        }

        $grid = new ContactUs\Grid();
        $grid->setModule($module);
        $grid->setController($controller);

        $view->grid = $grid;

    };
