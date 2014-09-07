<?php
/**
 * Veeam Software Test Application
 *
 * @link      https://github.com/ikarpovich/veeam-test
 * @copyright Copyright (c) 2014, Igor Karpovich
 * @license   GPL v2
 */

namespace VeeamTest\Form;

use Zend\Form\Element;
use Zend\Form\Form;

class SearchForm extends Form
{
    protected $captcha;

    public function __construct($departments, $languages)
    {
        $departmentsArray=array();
        foreach($departments as $department)
        {
            $departmentsArray[$department->getId()]=$department->getName();
        }

        parent::__construct();

        $this->add(array(
            'name' => 'department',
            'options' => array(
                'label' => 'Department',
                'empty_option' => '(Select department)',
                'value_options'=>$departmentsArray
            ),
            'type'  => 'Select',
        ));

        $this->add(array(
            'name' => 'language',
            'options' => array(
                'label' => 'Language',
                'empty_option' => '(Select language)',
                'value_options'=>array(
                    '1' => 'Language 1'
                )
            ),
            'type'  => 'Select',
        ));

        $this->add(new Element\Csrf('security'));
        $this->add(array(
            'name' => 'send',
            'type'  => 'Submit',
            'attributes' => array(
                'value' => 'Search',
            ),
        ));

        // We could also define the input filter here, or
        // lazy-create it in the getInputFilter() method.
    }
}

?>