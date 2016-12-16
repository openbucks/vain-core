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

namespace Vain\Core\Config\Data\Handler\Yaml;

use Vain\Core\Config\Data\Handler\Factory\AbstractHandlerFactory;
use Vain\Core\Config\Data\Handler\HandlerInterface;

/**
 * Class YamlHandlerFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class YamlHandlerFactory extends AbstractHandlerFactory
{
    private $applicationPath;

    /**
     * YamlHandlerFactory constructor.
     *
     * @param string $applicationPath
     */
    public function __construct(string $applicationPath)
    {
        $this->applicationPath = $applicationPath;
    }

    /**
     * @inheritDoc
     */
    public function createHandler(string $fileName) : HandlerInterface
    {
        return new YamlHandler($this->applicationPath . DIRECTORY_SEPARATOR . $fileName);
    }
}
