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

namespace Vain\Core\Exception;

use Vain\Core\Config\Data\Reader\ReaderInterface;

/**
 * Class ReadFailedException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ReadFailedException extends ReaderException
{
    /**
     * ReadFailedException constructor.
     *
     * @param ReaderInterface $reader
     * @param string          $fileName
     */
    public function __construct(ReaderInterface $reader, string $fileName)
    {
        parent::__construct($reader, sprintf('Cannot read data from file %s', $fileName));
    }
}
