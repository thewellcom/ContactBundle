<?php

namespace TheWellCom\ContactBundle\Twig;

class TheWellComContactExtension extends \Twig_Extension
{
    /**
     * @var string
     */
    protected $siteName;

    public function __construct($siteName)
    {
        $this->siteName = $siteName;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('twcSiteName', array($this, 'siteName')),
        );
    }

    /**
     * @return string
     */
    public function siteName()
    {
        return $this->siteName;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'the_well_com_contact_extension';
    }
}
