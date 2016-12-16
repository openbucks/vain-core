<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-api
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-api
 */
declare(strict_types = 1);

namespace Vain\Core\Api\Request\Validator\Module\Storage;

use Vain\Core\Api\Config\Parameter\ApiParameterConfigInterface;
use Vain\Core\Exception\DuplicateValidatorFactoryException;
use Vain\Core\Exception\NoValidatorFactoryException;
use Vain\Core\Api\Request\Validator\Module\ApiValidatorModuleInterface;
use Vain\Core\Api\Request\Validator\Module\Factory\ApiValidatorModuleFactoryInterface;

/**
 * Class ApiValidatorModuleStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiValidatorModuleStorage implements ApiValidatorModuleStorageInterface
{
    /**
     * @var ApiValidatorModuleFactoryInterface[]
     */
    private $moduleFactories = [];

    /**
     * ApiValidatorModuleStorage constructor.
     *
     * @param ApiValidatorModuleFactoryInterface[] $moduleFactories
     */
    public function __construct(array $moduleFactories = [])
    {
        foreach ($moduleFactories as $validatorModule) {
            $this->addFactory($validatorModule);
        }
    }

    /**
     * @inheritDoc
     */
    public function addFactory(ApiValidatorModuleFactoryInterface $moduleFactory
    ) : ApiValidatorModuleStorageInterface
    {
        foreach ($moduleFactory->getNames() as $name) {
            if (array_key_exists($name, $this->moduleFactories)) {
                throw new DuplicateValidatorFactoryException($this, $moduleFactory, $this->moduleFactories[$name]);
            }
            $this->moduleFactories[$name] = $moduleFactory;
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getModule(ApiParameterConfigInterface $parameterConfig) : ApiValidatorModuleInterface
    {
        $module = null;
        foreach ([$parameterConfig->getSource(), $parameterConfig->getType(), 'optional'] as $requiredModule) {
            if (false === array_key_exists($requiredModule, $this->moduleFactories)) {
                throw new NoValidatorFactoryException($this, $requiredModule);
            }
            $module = $this->moduleFactories[$requiredModule]->createModule($parameterConfig, $module);
        }

        return $module;
    }
}
