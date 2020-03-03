<?php
/**
 * Weave Laminas Config Adaptor.
 */
namespace Weave\Config\Laminas;

use Laminas\ConfigAggregator\ConfigAggregator;
use Laminas\ConfigAggregator\LaminasConfigProvider;

/**
 * Weave Laminas Config Adaptor.
 */
trait Laminas
{
	/**
	 * Load config and return as an array.
	 *
	 * Loads <emvironment>.{json, xml, ini} from configLocation.
	 *
	 * @param string $environment    Runtime environment.
	 * @param string $configLocation Location from which to load config.
	 *
	 * @return array
	 */
	protected function loadConfig($environment = null, $configLocation = null)
	{
		$aggregator = new ConfigAggregator(
			[
				new LaminasConfigProvider(realpath($configLocation . '/') . '/' . $environment . '.{json,xml,ini}'),
			]
		);
		return $aggregator->getMergedConfig();
	}
}
