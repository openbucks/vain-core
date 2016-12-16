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

namespace Vain\Core\Api\Config\Composite;

use Vain\Core\Config\ConfigInterface;

/**
 * Interface ApiCompositeConfigInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApiCompositeConfigInterface extends ConfigInterface
{
    /**
     * @param string $filename
     *
     * @return ApiCompositeConfigInterface
     */
    public function addFile(string $filename) : ApiCompositeConfigInterface;
}
