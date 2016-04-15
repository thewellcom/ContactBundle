<?php

namespace TheWellCom\ContactBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('the_well_com_contact');

        $rootNode
            ->children()
                ->scalarNode('mail_to')->end()
                ->scalarNode('site_name')->end()
                ->scalarNode('entity_class')->end()
                ->scalarNode('form_class')
                    ->defaultValue('TheWellCom\ContactBundle\Form\ContactType')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
