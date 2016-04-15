TheWellComContactBundle
==

Configuration:
-

In `YourProjectContactBundle.php`:

    namespace YourProject\Bundle\ContactBundle;

    use Symfony\Component\HttpKernel\Bundle\Bundle;

    class YourProjectContactBundle extends Bundle
    {
        public function getParent()
        {
            return 'TheWellComContactBundle';
        }
    }

In app/config.config.yml:

    the_well_com_contact:
        mail_to: 'xy@domainname.com'
        site_name: 'Your site name'
        entity_class: 'YourProject\Bundle\ContactBundle\Entity\Contact'


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
