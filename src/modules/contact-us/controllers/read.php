<?php
/**
 * Read page
 */
namespace Application;

use Bluz\Proxy\Request;

return
    /**
     * @param int $id
     */
    function($id) use ($view, $module, $controller) {
        /**
         * @var Bootstrap $this
         * @var View $view
         */
        $row = ContactUs\Table::findRow(['id' => $id]);
        if (empty($row)) {
            throw new Exception('Row not found', 404);
        }
        if ($row->mark_read == 0) {
            $row->mark_read = 1;
            $row->save();
        }
        $view->row = $row;
    };