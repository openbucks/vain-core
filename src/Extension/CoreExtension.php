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

namespace Vain\Core\Extension;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Vain\Core\Extension\Compiler\AccessControlCompilerPass;
use Vain\Core\Extension\Compiler\CacheFactoryCompilerPass;
use Vain\Core\Extension\Compiler\ConnectionCompilerPass;
use Vain\Core\Extension\Compiler\ProcessorStrategyCompilerPass;
use Vain\Core\Extension\Compiler\QueueFactoryCompilerPass;
use Vain\Core\Extension\Compiler\QueueMessageFactoryCompilerPass;
use Vain\Core\Extension\Compiler\ResourceProviderCompilerPass;
use Vain\Core\Extension\Compiler\SecurityVoterCompilerPass;
use Vain\Core\Extension\Compiler\TimeLocaleCompilerPass;
use Vain\Core\Extension\Compiler\TokenProviderCompilerPass;
use Vain\Core\Extension\Compiler\ValidatorModuleCompilerPass;
use Vain\Core\Extension\Compiler\VoterStrategyCompilerPass;

/**
 * Class CoreExtension
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CoreExtension extends AbstractExtension
{
    /**
     * @inheritDoc
     */
    public function load(array $configs, ContainerBuilder $container) : AbstractExtension
    {
        $container
            ->addCompilerPass(new AccessControlCompilerPass())
            ->addCompilerPass(new CacheFactoryCompilerPass())
            ->addCompilerPass(new ConnectionCompilerPass())
            ->addCompilerPass(new ProcessorStrategyCompilerPass())
            ->addCompilerPass(new QueueFactoryCompilerPass())
            ->addCompilerPass(new QueueMessageFactoryCompilerPass())
            ->addCompilerPass(new ResourceProviderCompilerPass())
            ->addCompilerPass(new SecurityVoterCompilerPass())
            ->addCompilerPass(new TimeLocaleCompilerPass())
            ->addCompilerPass(new TokenProviderCompilerPass())
            ->addCompilerPass(new VoterStrategyCompilerPass())
            ->addCompilerPass(new ValidatorModuleCompilerPass());

        return parent::load($configs, $container);
    }
}
