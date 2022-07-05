<?php

declare(strict_types = 1);

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
	 * @param ?string $environment    Runtime environment.
	 * @param ?string $configLocation Location from which to load config.
	 *
	 * @return array
	 */
	protected function loadConfig(?string $environment = null, ?string $configLocation = null):array
	{
		$aggregator = new ConfigAggregator(
			[
				new LaminasConfigProvider(realpath($configLocation . '/') . '/' . $environment . '.{json,xml,ini}'),
			]
		);
		return $aggregator->getMergedConfig();
	}
}
