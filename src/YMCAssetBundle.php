<?php

namespace YMC\AssetBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use YMC\AssetBundle\GulpRev\DependencyInjection\Compiler\AssetHelperOverrideCompilerPass;

class YMCAssetBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new AssetHelperOverrideCompilerPass());
    }
}
