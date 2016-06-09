<?php

namespace TheWellCom\ContactBundle\Model;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\MappedSuperclass;

/** @MappedSuperclass */
abstract class Contact implements ContactInterface
{
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=32)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min=2,
     *      max= 32,
     *      minMessage = "Votre nom doit avoir au moins {{ limit }} caractères",
     *      maxMessage = "Votre nom doit avoir au maximum {{ limit }} caractères"
     * )
     * @Assert\Regex("/^\w+/")
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=32)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min=2,
     *      max= 32,
     *     minMessage = "Votre prénom doit avoir au moins {{ limit }} caractères",
     *      maxMessage = "Votre prénom doit avoir au maximum {{ limit }} caractères"
     * )
     * @Assert\Regex("/^\w+/")
     */
    protected $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="company_name", type="string", length=32)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min=2,
     *      max= 32,
     *     minMessage = "Le nom de votre entreprise doit avoir au moins {{ limit }} caractères",
     *      maxMessage = "Le nom de votre entreprise doit avoir au maximum {{ limit }} caractères"
     * )
     * @Assert\Regex("/^\w+/")
     */
    protected $companyName;

    /**
     * @var string
     *
     * @ORM\Column(name="civility", type="string", length=32)
     * @Assert\NotBlank()
     * @Assert\Regex("/^\w+/")
     */
    protected $civility;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=10)
     * @Assert\NotBlank()
     * @Assert\Regex("/^(0[1-9])(?:[ _.-]?(\d{2})){4}$/")
     */
    protected $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min=2,
     *      max=255,
     *      minMessage = "Votre objet doit avoir au moins {{ limit }} caractères",
     *      maxMessage = "Votre objet doit avoir au maximum {{ limit }} caractères"
     * )
     */
    protected $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string")
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text", length=65535)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 10,
     *      max = 65535,
     *      minMessage = "Votre message doit avoir au moins {{ limit }} caractères",
     *      maxMessage = "Votre message doit avoir au maximum {{ limit }} caractères"
     * )
     */
    protected $message;

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * {@inheritdoc}
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * {@inheritdoc}
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * {@inheritdoc}
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * {@inheritdoc}
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     *
     * @return Contact
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * @return string
     */
    public function getCivility()
    {
        return $this->civility;
    }

    /**
     * @param string $civility
     *
     * @return Contact
     */
    public function setCivility($civility)
    {
        $this->civility = $civility;

        return $this;
    }
}
