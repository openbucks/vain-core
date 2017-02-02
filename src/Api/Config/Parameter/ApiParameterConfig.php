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

namespace Vain\Core\Api\Config\Parameter;

use Psr\Http\Message\ServerRequestInterface;
use Vain\Core\Api\Config\Parameter\Filter\ApiConfigParameterFilterInterface;
use Vain\Core\Api\Config\Parameter\Source\ApiConfigParameterSourceInterface;

/**
 * Class AbstractApiParameterConfig
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiParameterConfig implements ApiParameterConfigInterface
{
    private $name;

    private $config;

    private $source;

    private $filter;

    /**
     * ApiParameterConfig constructor.
     *
     * @param string                            $name
     * @param array                             $config
     * @param ApiConfigParameterSourceInterface $source
     * @param ApiConfigParameterFilterInterface $filter
     */
    public function __construct(
        string $name,
        array $config,
        ApiConfigParameterSourceInterface $source,
        ApiConfigParameterFilterInterface $filter
    ) {
        $this->name = $name;
        $this->config = $config;
        $this->source = $source;
        $this->filter = $filter;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [$this->name => $this->config];
    }

    /**
     * @inheritDoc
     */
    public function handle(ServerRequestInterface $serverRequest)
    {
        $result = $this->source->extract($serverRequest);
        if ($result->isSuccessful()) {
            return $result;
        }

        return $this->filter->filter($result->getValue());
    }
}
