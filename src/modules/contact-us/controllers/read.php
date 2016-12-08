<?php
/**
 * Read page
 */

/**
 * @namespace
 */
namespace Application;

use Bluz\Controller\Controller;

return
    /**
     * @param int $id
     */
    function ($id) {
        /**
         * @var Controller $this
         */
        $row = ContactUs\Table::findRow(['id' => $id]);
        if (empty($row)) {
            throw new Exception('Row not found', 404);
        }
        if ($row->mark_read == 0) {
            $row->mark_read = 1;
            $row->save();
        }
        $this->assign('row', $row);
    };
