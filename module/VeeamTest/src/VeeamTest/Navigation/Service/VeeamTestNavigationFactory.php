<?php
/**
 * Veeam Software Test Application
 *
 * @link      https://github.com/ikarpovich/veeam-test
 * @copyright Copyright (c) 2014, Igor Karpovich
 * @license   GPL v2
 */

namespace VeeamTest\Navigation\Service;;

use Zend\Navigation\Service\DefaultNavigationFactory;

class VeeamTestNavigationFactory extends DefaultNavigationFactory
{
    protected function getName()
    {
        return 'veeam-test';
    }
}