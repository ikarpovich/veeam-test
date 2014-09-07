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
class Language
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="string", length=2, options={"fixed":true})
     */
    private $id;

    /** @ORM\Column(type="string", options={"fixed":true}) */
    private $name;

    // getters/setters
}