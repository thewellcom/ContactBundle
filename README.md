TheWellComContactBundle
==

Configuration:
-

In app/AppKernel.php

    class AppKernel extends Kernel
    {
        ...

        public function registerBundles()
        {
            ...
            new TheWellCom\ContactBundle\TheWellComContactBundle(),
            ...
        }
    }

You need to create your own ContactBundle.

And in `YourProjectContactBundle.php`:

    namespace YourProject\Bundle\ContactBundle;

    use Symfony\Component\HttpKernel\Bundle\Bundle;

    class YourProjectContactBundle extends Bundle
    {
        public function getParent()
        {
            return 'TheWellComContactBundle';
        }
    }

Create the entity Contact:

And in YourProject\Bundle\ContactBundle\Entity\Contact.php:

    <?php

    namespace TM\Bundle\ContactBundle\Entity;

    use Doctrine\ORM\Mapping as ORM;
    use TheWellCom\ContactBundle\Model\Contact as BaseContact;

    /**
     * Contact.
     *
     * @ORM\Table(name="contact")
     * @ORM\Entity
     */
    class Contact extends BaseContact
    {
        ...
    }

In app/config/config.yml:

    the_well_com_contact:
        mail_to: 'xy@domainname.com'
        site_name: 'Your site name'
        entity_class: 'YourProject\Bundle\ContactBundle\Entity\Contact'

In app/config/routing.yml

    the_well_com_contact:
        resource: "@TheWellComContactBundle/Resources/config/routing.yml"


Admin with sonataAdminBundle:
-

You need to install sonataAdminBundle: https://github.com/sonata-project/SonataAdminBundle

### ContactAdmin.php #

If you need to add an admin manager, you just have to add in your `ContactAdmin.php`:

    namespace YourProject\Bundle\ContactBundle\Admin;

    use Sonata\AdminBundle\Datagrid\ListMapper;
    use Sonata\AdminBundle\Show\ShowMapper;
    use TheWellCom\ContactBundle\Admin\ContactAdmin as BaseAdmin;

    class ContactAdmin extends BaseAdmin
    {
        ...
    }

### service.yml #

In your `service.yml` file add:

    services:
        admin.contact:
            class: YourProject\Bundle\ContactBundle\Admin\ContactAdmin
            arguments: [~, YourProject\Bundle\ContactBundle\Entity\Contact, ~]
            tags:
                - { name: sonata.admin, manager_type: orm, label: Contact }
