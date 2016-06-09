<?php

namespace TheWellCom\ContactBundle\Services;

use TheWellCom\ContactBundle\Model\ContactInterface as Contact;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\Translation\Translator;

class ContactManager
{
    protected $templating;
    protected $translator;
    protected $mailer;
    protected $mailTo;
    protected $entityClass;

    public function __construct(TwigEngine $templating, Translator $translator, \Swift_Mailer $mailer, $mailTo, $entityClass)
    {
        $this->templating = $templating;
        $this->translator = $translator;
        $this->mailer = $mailer;
        $this->mailTo = $mailTo;
        $this->entityClass = $entityClass;
    }

    public function getContact()
    {
        return new $this->entityClass();
    }

    public function sendMails(Contact $contact)
    {
        $message = $contact->getMessage();
        $customerEmail = $contact->getEmail();

        // send email for the website owner
        $this->sendMail(
            $contact->getSubject(),
            $customerEmail,
            $this->mailTo,
            $this->templating->render('TheWellComContactBundle:Contact:email.html.twig', array(
                'message' => $message,
                'contact' => $contact,
            ))
        );

        // send confirm email for client
        $this->sendMail(
            $contact->getSubject(),
            $this->mailTo,
            $customerEmail,
            $this->templating->render('TheWellComContactBundle:Contact:email_confirm.html.twig', array(
                'message' => $message,
                'contact' => $contact,
            ))
        );
    }

    public function sendMail($subject, $from, $to, $body)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($from)
            ->setTo($to)
            ->setBody(
                $body,
                'text/html'
            );
        $this->mailer->send($message);
    }
}
