<?php


namespace YMC\AssetBundle\GulpRev\DependencyInjection\Compiler;


use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class AssetHelperOverrideCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if ($container->getParameter('ymc_asset.gulp_rev.enabled')) {
            $assetService = $container->getDefinition('twig.extension.assets');
            $assetService->setClass('YMC\AssetBundle\GulpRev\Twig\GulpRevAssetExtension');
            $assetService->addMethodCall('loadManifests', ['%ymc_asset.gulp_rev.manifest_files%']);
        }
    }
}
