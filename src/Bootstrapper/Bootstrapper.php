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

namespace Vain\Core\Bootstrapper;

use Vain\Core\Application\ApplicationInterface;

/**
 * Class Bootstrapper
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class Bootstrapper implements BootstrapperInterface
{
    /**
     * @inheritDoc
     */
    public function bootstrap(ApplicationInterface $application) : BootstrapperInterface
    {
        return $this;
    }
}