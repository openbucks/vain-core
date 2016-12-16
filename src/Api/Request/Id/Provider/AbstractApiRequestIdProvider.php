<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   api_V2
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/api_V2
 */
declare(strict_types = 1);

namespace Vain\Core\Api\Request\Id\Provider;

/**
 * Class AbstractApiRequestIdProvider
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractApiRequestIdProvider implements ApiRequestIdProviderInterface
{
    private $nextProvider;

    /**
     * AbstractApiRequestIdProvider constructor.
     *
     * @param ApiRequestIdProviderInterface $nextProvider
     */
    public function __construct(ApiRequestIdProviderInterface $nextProvider)
    {
        $this->nextProvider = $nextProvider;
    }

    /**
     * @return ApiRequestIdProviderInterface
     */
    public function getNextProvider() : ApiRequestIdProviderInterface
    {
        return $this->nextProvider;
    }
}
