<?php namespace Sanatorium\PathInstallers;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class PathInstaller extends LibraryInstaller {

	/**
	 * {@inheritDoc}
	 */
	public function getInstallPath(PackageInterface $package)
	{
		$basePath = $this->getPath('base');
		$root = $this->composer->getPackage();
		$rootExtra = $root->getExtra();

		$packageName = $package->getName();

		if (isset($rootExtra['paths'][$packageName]))
		{
			return $basePath.'/'.$rootExtra['paths'][$packageName];
		}

		$packageExtra = $package->getExtra();

		if (isset($packageExtra['path']))
		{
			return $basePath.'/'.$packageExtra['path'];
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function supports($packageType)
	{
		return $packageType == 'path-installer';
	}

}
