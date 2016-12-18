<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-core
 */
declare(strict_types = 1);

namespace Vain\Core\Api\Extension\Storage;

/**
 * Class ApiExtensionStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiExtensionStorage implements ApiExtensionStorageInterface
{
    private $paths = [];

    /**
     * @inheritDoc
     */
    public function addPath(string $path, string $namespace) : ApiExtensionStorage
    {
        $this->paths[$path] = $namespace;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getPaths() : array
    {
        return $this->paths;
    }
}