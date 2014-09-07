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
use VeeamTest\Form;


class JobsController extends AbstractActionController
{
    private $em;

    public function indexAction()
    {
        return new ViewModel(array("searchForm"=>new Form\SearchForm(
                $this->getEntityManager()->getRepository('VeeamTest\Entity\Department')->findAll(),
                $this->getEntityManager()->getRepository('VeeamTest\Entity\Language')->findAll()
            )));
    }

    public function setEntityManager(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getEntityManager()
    {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }
        return $this->em;
    }
}
