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

namespace Vain\Core\Config\Data\Handler;

/**
 * Class AbstractHandler
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractHandler implements HandlerInterface
{
    private $fileName;

    private $extension;

    /**
     * AbstractHandler constructor.
     *
     * @param string $fileName
     * @param string $extension ;
     */
    public function __construct(string $fileName, string $extension)
    {
        $this->fileName = $fileName;
        $this->extension = $extension;
    }

    /**
     * @return string
     */
    public function getFileName() : string
    {
        return $this->fileName;
    }

    /**
     * @return string
     */
    public function getFullName() : string
    {
        return $this->fileName . '.' . $this->extension;
    }
}
