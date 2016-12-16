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

namespace Vain\Core\Config\Data\Provider;

/**
 * Class AbstractConfigDataProvider
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractConfigDataProvider implements ConfigDataProviderInterface
{
    private $next;

    /**
     * AbstractConfigProvider constructor.
     *
     * @param ConfigDataProviderInterface $provider
     */
    public function __construct(ConfigDataProviderInterface $provider = null)
    {
        $this->next = $provider;
    }

    /**
     * @return ConfigDataProviderInterface
     */
    public function getNext() : ConfigDataProviderInterface
    {
        return $this->next;
    }
}
