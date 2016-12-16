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

namespace Vain\Core\Config\Data\Provider\Cache;

use Vain\Core\Config\Data\Provider\AbstractConfigDataProvider;
use Vain\Core\Config\Data\Provider\ConfigDataProviderInterface;

/**
 * Class CacheConfigDataProvider
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CacheConfigDataProvider extends AbstractConfigDataProvider
{
    private $configsData;

    /**
     * CacheConfigDataProvider constructor.
     *
     * @param ConfigDataProviderInterface $provider
     * @param array                       $configsData
     */
    public function __construct(ConfigDataProviderInterface $provider, array $configsData = [])
    {
        $this->configsData = $configsData;
        parent::__construct($provider);
    }

    /**
     * @inheritdoc
     */
    public function getConfigData(string $fileName) : array
    {
        if (false === array_key_exists($fileName, $this->configsData)) {
            $this->configsData[$fileName] = $this->getNext()->getConfigData($fileName);
        }

        return $this->configsData[$fileName];
    }
}
