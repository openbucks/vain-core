<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-api
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-api
 */
declare(strict_types = 1);

namespace Vain\Core\Api\Config\Storage;

use Vain\Core\Api\Config\ApiConfigInterface;
use Vain\Core\Api\Config\Provider\ApiConfigProviderInterface;

/**
 * Interface ApiConfigStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApiConfigStorageInterface extends ApiConfigProviderInterface
{
    /**
     * @return ApiConfigInterface[]
     */
    public function getConfigs() : array;
}
