<?php

namespace AssetManager\Service;

use AssetManager\Resolver\AliasPathStackResolver;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use AssetManager\Resolver\PathStackResolver;

class AliasPathStackResolverServiceFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @return PathStackResolver
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config            = $serviceLocator->get('config');
        $pathStackResolver = new AliasPathStackResolver();
        $paths             = array();

        if (isset($config['asset_manager']['resolver_configs']['aliases'])) {
            $aliases = $config['asset_manager']['resolver_configs']['aliases'];
        }

        $pathStackResolver->setAliases($aliases);

        return $pathStackResolver;
    }
}
