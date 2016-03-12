<?php namespace Sanatorium\PathInstallers;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class PathInstallerPlugin implements PluginInterface {

	/**
	* {@inheritDoc}
	*/
	public function activate(Composer $composer, IOInterface $io)
	{
		$installer = new PathInstaller($io, $composer);

		$composer->getInstallationManager()->addInstaller($installer);
	}

}
