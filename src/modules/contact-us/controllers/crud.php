<?php

namespace Application;

use Application\ContactUs;
use Bluz\Controller;

return
    /**
     * @privilege Management
     * @return mixed
     */
    function () {
        /**
         * @var Bootstrap $this
         */
        $crudController = new Controller\Crud();
        $crudController->setCrud(ContactUs\Crud::getInstance());
        return $crudController();
    };
