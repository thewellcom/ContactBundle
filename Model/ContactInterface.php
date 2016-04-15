<?php

namespace TheWellCom\ContactBundle\Model;

interface ContactInterface
{
    /**
     * Get id.
     *
     * @return int
     */
    public function getId();

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return self
     */
    public function setName($name);

    /**
     * Get name.
     *
     * @return string
     */
    public function getName();

    /**
     * Set firstname.
     *
     * @param string $firstname
     *
     * @return self
     */
    public function setFirstname($firstname);

    /**
     * Get firstname.
     *
     * @return string
     */
    public function getFirstname();

    /**
     * Set phone.
     *
     * @param string $phone
     *
     * @return self
     */
    public function setPhone($phone);

    /**
     * Get phone.
     *
     * @return string
     */
    public function getPhone();

    /**
     * Set subject.
     *
     * @param string $subject
     *
     * @return self
     */
    public function setSubject($subject);

    /**
     * Get subject.
     *
     * @return string
     */
    public function getSubject();

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail($email);

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail();

    /**
     * Set message.
     *
     * @param string $message
     *
     * @return self
     */
    public function setMessage($message);

    /**
     * Get message.
     *
     * @return string
     */
    public function getMessage();
}
