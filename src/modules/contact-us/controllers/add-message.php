<?php
/**
 * Add message page
 */
namespace Application;

use Bluz\Proxy\Request;
use Bluz\Proxy\Messages;
use Bluz\Controller;
use Bluz\Proxy\Session;
use Application\ContactUs\Row;
use Bluz\Proxy\Layout;

return
    /**
     * @param string $name
     * @param string $email
     * @param string $subject
     * @param string $message
     * @param string $captcha
     * @return \closure
     */
    function($name, $email, $subject, $message, $captcha) use ($view) {
        /**
         * @var Bootstrap $this
         * @var View $view
         */

        Layout::breadCrumbs(
            [
                __('Contact us')
            ]
        );

        if (Request::isPost()) {

            $row = new Row();
            $result = '';

            if ($this->user() != null) {
                $row->name = $this->user()->login;
                $row->email = $this->user()->email;
                $row->subject = $subject;
                $row->message = $message;
                $result = $row->save();
            } else {
                if ($captcha == Session::get('captcha')) {
                    $row->name = $name;
                    $row->email = $email;
                    $row->subject = $subject;
                    $row->message = $message;
                    $result = $row->save();
                }
            }

            if ($result) {
                Messages::addSuccess('Message was successfully save');
                Session::delete('captcha');
            } else {
                Messages::addError('Invalid form data');
            }
        } else {
            $captcha = rand(1234, 9123);
            Session::set('captcha', $captcha);

            $view->captcha = $captcha;
            $view->user = $this->user();
        }
    };