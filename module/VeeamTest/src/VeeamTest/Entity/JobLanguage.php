<?php
/**
 * Veeam Software Test Application
 *
 * @link      https://github.com/ikarpovich/veeam-test
 * @copyright Copyright (c) 2014, Igor Karpovich
 * @license   GPL v2
 */

namespace VeeamTest\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class JobLanguage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Job", inversedBy="languages")
     */
    private $job;

    /**
     * @ORM\Column(type="string", length=2, options={"fixed": true})
     * @ORM\ManyToOne(targetEntity="Language", inversedBy="id")
     */
    private $language;

    /** @ORM\Column(type="text") */
    private $text;

    // getters/setters
}