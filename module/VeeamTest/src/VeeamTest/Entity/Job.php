<?php
/**
 * Veeam Software Test Application
 *
 * @link      https://github.com/ikarpovich/veeam-test
 * @copyright Copyright (c) 2014, Igor Karpovich
 * @license   GPL v2
 */

namespace VeeamTest\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Job
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /** @ORM\Column(type="string") */
    private $name;

    /** @ORM\Column(type="text") */
    private $text;

    /** @ORM\ManyToOne(targetEntity="Department") */
    private $department;

    /**
     * @ORM\OneToMany(targetEntity="JobLanguage", mappedBy="job", orphanRemoval=true, cascade={"persist", "remove", "merge"})
     */
    private $languages;

    public function __construct()
    {
        $this->languages = new ArrayCollection();
    }


    // getters/setters
}