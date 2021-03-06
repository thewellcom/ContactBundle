<?php

namespace TheWellCom\ContactBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ContactController extends Controller
{
    public function getContactAction()
    {
        $contact = $this->get('app.contact_manager')->getContact();
        $form = $this->getContactForm($contact);

        return $this->render('TheWellComContactBundle:Contact:contact.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function validateContactAction(Request $request)
    {
        $contactManager = $this->get('app.contact_manager');
        $contact = $contactManager->getContact();

        $form = $this
            ->getContactForm($contact)
            ->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();
            $messageSuccess = $this->get('translator')->trans('contact.sent_success');
            $contactManager->sendMails($contact);

            if ($request->isXmlHttpRequest()) {
                return new JsonResponse(array('message' => $messageSuccess), 201);
            }

            $request->getSession()->getFlashBag()->add('notice', $messageSuccess);

            return new RedirectResponse($this->generateUrl('the_well_com_contact'));
        }

        if ($request->isXmlHttpRequest()) {
            $errors = array();

            foreach ($form as $fieldName => $formField) {
                foreach ($formField->getErrors(true) as $error) {
                    $errors[$fieldName] = $error->getMessage();
                }
            }

            return new JsonResponse(array('errors' => $errors), 400);
        }

        return $this->render('TheWellComContactBundle:Contact:contact.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function getContactFormAction()
    {
        $contact = $this->get('app.contact_manager')->getContact();
        $form = $this->getContactForm($contact);

        return $this->render('TheWellComContactBundle:Contact:contact_form.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    protected function getContactForm($contact)
    {
        return $this
            ->createForm($this->getParameter('the_well_com_contact.form_class'), $contact, array(
                'action' => $this->generateUrl('the_well_com_contact.validate'),
            ));
    }
}
