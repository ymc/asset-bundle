<?php

namespace YMC\AssetBundle\GulpRev\Twig;

use Symfony\Bridge\Twig\Extension\AssetExtension;

class GulpRevAssetExtension extends AssetExtension
{
    private $manifest = [];
    private $manifestFiles = [];

    public function loadManifests(array $manifestGlobs) {
        $resolvedGlobs = array_map('glob', $manifestGlobs);

        foreach ($resolvedGlobs as $fileList) {
            foreach($fileList as $file) {
                $this->manifest = array_merge($this->manifest, json_decode(file_get_contents($file), true));
                $this->manifestFiles[] = $file;
            }
        }
    }

    public function getLoadedManifestFiles()
    {
        return $this->manifestFiles;
    }

    public function getAssetUrl($path, $packageName = null, $absolute = false, $version = null)
    {
        if (array_key_exists($path, $this->manifest) || array_key_exists($path = ('/'.$path), $this->manifest)) {
            $path = $this->manifest[$path];
        }
        return parent::getAssetUrl($path, $packageName, $absolute, $version);
    }
}
