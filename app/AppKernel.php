<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            // Bundles para hacer a Symfony mas RESTFul
            new JMS\SerializerBundle\JMSSerializerBundle(),
            new FOS\RestBundle\FOSRestBundle(),
            // Enrutamiento desde js
            new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
            // Bundle para conectar el proyecto con MongoDB
            new Doctrine\Bundle\MongoDBBundle\DoctrineMongoDBBundle(),
            // Bundle para hacer uso de extension para Doctrine; como timestamp
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            new AppBundle\AppBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'), true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
    public function getCacheDir()
    {
         if (in_array($this->environment, array('dev', 'test'))) {
             return '/var/cache/symfony/clinica' .  $this->environment;
         }

        return parent::getCacheDir();
    }

    public function getLogDir()
    {
         if (in_array($this->environment, array('dev', 'test'))) {
             return '/var/log/symfony/clinica';
         }

        return parent::getLogDir();
    }
 
}
