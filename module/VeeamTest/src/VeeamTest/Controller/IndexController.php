<?php
/**
 * Veeam Software Test Application
 *
 * @link      https://github.com/ikarpovich/veeam-test
 * @copyright Copyright (c) 2014, Igor Karpovich
 * @license   GPL v2
 */

namespace VeeamTest\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/** Index page controller */
class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
}
