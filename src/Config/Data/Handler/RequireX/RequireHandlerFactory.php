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

namespace Vain\Core\Config\Data\Handler\RequireX;

use Vain\Core\Config\Data\Handler\Factory\AbstractHandlerFactory;
use Vain\Core\Config\Data\Handler\HandlerInterface;

/**
 * Class RequireHandlerFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class RequireHandlerFactory extends AbstractHandlerFactory
{
    private $applicationPath;

    private $cacheDir;

    private $configDir;

    /**
     * RequireHandlerFactory constructor.
     *
     * @param string $applicationPath
     * @param string $cacheDir
     * @param string $configDir
     */
    public function __construct(string $applicationPath, string $cacheDir, string $configDir)
    {
        $this->applicationPath = $applicationPath;
        $this->cacheDir = $cacheDir;
        $this->configDir = $configDir;
    }

    /**
     * @inheritDoc
     */
    public function createHandler(string $fileName) : HandlerInterface
    {
        return new RequireHandler(
            sprintf('%s%s%s%s', $this->applicationPath, DIRECTORY_SEPARATOR, $this->cacheDir, DIRECTORY_SEPARATOR),
            $this->configDir,
            $fileName
        );
    }
}
