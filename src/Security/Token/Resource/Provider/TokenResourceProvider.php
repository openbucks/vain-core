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

namespace Vain\Core\Security\Token\Resource\Provider;

use Vain\Core\Api\Request\ApiRequestInterface;
use Vain\Core\Security\Context\SecurityContextInterface;
use Vain\Core\Api\Resource\Provider\ApiResourceProviderInterface;
use Vain\Core\Api\Resource\ApiResourceInterface;

/**
 * Class TokenResourceProvider
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class TokenResourceProvider implements ApiResourceProviderInterface
{
    private $context;

    /**
     * TokenResourceProvider constructor.
     *
     * @param SecurityContextInterface $context
     */
    public function __construct(SecurityContextInterface $context)
    {
        $this->context = $context;
    }

    /**
     * @inheritDoc
     */
    public function getName() : string
    {
        return 'token';
    }

    /**
     * @inheritDoc
     */
    public function getResource(string $resourceName, ApiRequestInterface $request) : ApiResourceInterface
    {
        return $this->context->getToken();
    }
}
