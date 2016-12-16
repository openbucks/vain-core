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

use Vain\Core\Config\Data\Writer\WriterInterface;

/**
 * Class WriteFailedException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class WriteFailedException extends WriterException
{
    /**
     * WriteFailedException constructor.
     *
     * @param WriterInterface $writer
     * @param string          $filename
     */
    public function __construct(WriterInterface $writer, string $filename)
    {
        parent::__construct($writer, sprintf('Cannot write data to file %s', $filename));
    }
}
