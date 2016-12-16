<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-connection
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-connection
 */

namespace Vain\Core\Connection\Extension;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Vain\Core\Connection\Extension\Compiler\ConnectionFactoryCompilerPass;
use Vain\Core\Extension\AbstractExtension;

/**
 * Class ConnectionExtension
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ConnectionExtension extends AbstractExtension
{
    /**
     * @inheritDoc
     */
    public function load(array $configs, ContainerBuilder $container) : AbstractExtension
    {
        $container->addCompilerPass(new ConnectionFactoryCompilerPass());

        return parent::load($configs, $container);
    }
}
