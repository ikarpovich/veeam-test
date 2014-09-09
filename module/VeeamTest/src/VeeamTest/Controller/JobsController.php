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

/** Job list controller */
class JobsController extends AbstractActionController
{
    private $em;

    public function indexAction()
    {
        $searchForm=new Form\SearchForm(
            $this->getEntityManager()->getRepository('VeeamTest\Entity\Department')->findAll(),
            $this->getEntityManager()->getRepository('VeeamTest\Entity\Language')->findAll()
        );

        $request=$this->getRequest();
        $messages=false;

        $departmentId=false;
        $languageId=false;

        if ($request->isPost())
        {
            $searchForm->setData($request->getPost());

            if ($searchForm->isValid()) {
                $validatedData = $searchForm->getData();

                $departmentId=$validatedData["department"];
                $languageId=$validatedData["language"];

            } else {
                $messages = $searchForm->getMessages();
            }
        }



        $qb = $this->getEntityManager()->createQueryBuilder();

        $select=array('j');
        if($languageId)
            $select[]='lj';

        $qb->select($select)
            ->from('VeeamTest\Entity\Job', 'j');

        if($languageId)
        {
            $qb->leftJoin('j.languages', 'lj', 'WITH',
                $qb->expr()->eq("lj.language", '?1')
            );
            $qb->setParameter(1, $languageId);

        }

        if($departmentId)
            $qb->where($qb->expr()->eq(
                'j.department',
                $departmentId));

        $query = $qb->getQuery();
        $jobs = $query->getResult();

        return new ViewModel(array('searchForm' => $searchForm, 'formErrors' => $messages, 'jobs' => $jobs, 'languageId'=>$languageId));
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
