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

use Vain\Core\String\StringInterface;

/**
 * Class IdGeneratorInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface IdGeneratorInterface extends StringInterface
{
    /**
     * @return string
     */
    public function generate() : string;
}