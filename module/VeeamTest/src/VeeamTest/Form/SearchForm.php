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
use Zend\InputFilter\Factory;

class SearchForm extends Form
{
    public function __construct($departments, $languages)
    {
        $factory = new Factory();

        $departmentsArray=array();
        foreach($departments as $department)
        {
            $departmentsArray[$department->getId()]=$department->getName();
        }

        $languagesArray=array();
        foreach($languages as $language)
        {
            $languagesArray[$language->getId()]=$language->getName();
        }

        parent::__construct();

        $this->add(array(
            'name' => 'department',
            'options' => array(
                'label' => 'Department',
                'empty_option' => '(Select department)',
                'value_options'=>$departmentsArray
            ),
            'required' => false,
            'type'  => 'Select',
        ));

        $this->add(array(
            'name' => 'language',
            'options' => array(
                'label' => 'Language',
                'empty_option' => '(Select language)',
                'value_options'=>$languagesArray,
                'allow_empty' => true,
                'required' => false,
            ),
            'required' => false,
            'allow_empty' => true,
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

        $this->getInputFilter()->add($factory->createInput(array(
            'name' => 'language',
            'required' => false,
        )));

        $this->getInputFilter()->add($factory->createInput(array(
            'name' => 'department',
            'required' => false,
        )));
    }
}

?>