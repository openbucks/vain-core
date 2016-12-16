<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-config
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-config
 */
declare(strict_types = 1);

namespace Vain\Core\Config\Provider;

use Vain\Core\Config\ConfigInterface;
use Vain\Core\Config\Data\Provider\ConfigDataProviderInterface;
use Vain\Core\Config\Factory\ConfigFactoryInterface;

/**
 * Class ConfigProvider
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ConfigProvider implements ConfigProviderInterface
{
    private $configFactory;

    private $configDataProvider;

    private $configDir;

    private $configs;

    /**
     * ConfigProvider constructor.
     *
     * @param ConfigFactoryInterface      $configFactory
     * @param ConfigDataProviderInterface $configDataProvider
     * @param string                      $configDir
     * @param ConfigInterface[]           $configs
     */
    public function __construct(
        ConfigFactoryInterface $configFactory,
        ConfigDataProviderInterface $configDataProvider,
        string $configDir,
        array $configs = []
    ) {
        $this->configFactory = $configFactory;
        $this->configDataProvider = $configDataProvider;
        $this->configs = $configs;
        $this->configDir = $configDir;
    }

    /**
     * @return string
     */
    public function getConfigDir() : string
    {
        return $this->configDir;
    }

    /**
     * @param string $configName
     *
     * @return string
     */
    public function getFileName(string $configName) : string
    {
        return $this->configDir . DIRECTORY_SEPARATOR . $configName;
    }

    /**
     * @inheritDoc
     */
    public function getConfig(string $configName) : ConfigInterface
    {
        if (false === array_key_exists($configName, $this->configs)) {
            $this->configs[$configName] = $this->configFactory
                ->createConfig($this->configDataProvider->getConfigData($this->getFileName($configName)));
        }

        return $this->configs[$configName];
    }
}
