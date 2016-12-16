<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-security
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-security
 */
declare(strict_types = 1);

namespace Vain\Core\Security\Extension;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Vain\Core\Extension\AbstractExtension;
use Vain\Core\Security\Extension\Compiler\AccessControlCompilerPass;
use Vain\Core\Security\Extension\Compiler\ProcessorStrategyCompilerPass;
use Vain\Core\Security\Extension\Compiler\ResourceProviderCompilerPass;
use Vain\Core\Security\Extension\Compiler\SecurityVoterCompilerPass;
use Vain\Core\Security\Extension\Compiler\TokenProviderCompilerPass;
use Vain\Core\Security\Extension\Compiler\VoterStrategyCompilerPass;

/**
 * Class SecurityExtension
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class SecurityExtension extends AbstractExtension
{
    /**
     * @inheritDoc
     */
    public function load(array $configs, ContainerBuilder $container) : AbstractExtension
    {
        $container
            ->addCompilerPass(new AccessControlCompilerPass())
            ->addCompilerPass(new ProcessorStrategyCompilerPass())
            ->addCompilerPass(new ResourceProviderCompilerPass())
            ->addCompilerPass(new SecurityVoterCompilerPass())
            ->addCompilerPass(new TokenProviderCompilerPass())
            ->addCompilerPass(new VoterStrategyCompilerPass());

        return parent::load($configs, $container);
    }
}
