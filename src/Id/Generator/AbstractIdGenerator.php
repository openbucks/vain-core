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

namespace Vain\Core\Id\Generator;

/**
 * Class AbstractIdGenerator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractIdGenerator implements IdGeneratorInterface
{
    /**
     * @inheritDoc
     */
    public function __toString() : string
    {
        return $this->generate();
    }
}