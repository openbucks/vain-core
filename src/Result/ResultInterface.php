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

namespace Vain\Core\Result;

use Vain\Core\Display\DisplayableInterface;
use Vain\Core\Equal\EquatableInterface;
use Vain\Core\PrivateX\PrivateInterface;
use Vain\Core\String\StringInterface;

/**
 * Interface ResultInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ResultInterface extends StringInterface, DisplayableInterface, PrivateInterface, EquatableInterface
{
    /**
     * @return bool
     */
    public function isSuccessful();

    /**
     * @return bool
     */
    public function getStatus();

    /**
     * @return ResultInterface
     */
    public function invert();
}
