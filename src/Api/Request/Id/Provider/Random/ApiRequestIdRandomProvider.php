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

namespace Vain\Core\Api\Request\Id\Provider\Random;

use Psr\Http\Message\ServerRequestInterface;
use Vain\Core\Api\Request\Id\Provider\ApiRequestIdProviderInterface;
use Vain\Core\Id\Generator\IdGeneratorInterface;

/**
 * Class ApiRequestIdRandomProvider
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiRequestIdRandomProvider implements ApiRequestIdProviderInterface
{
    private $idGenerator;

    /**
     * ApiRequestIdRandomProvider constructor.
     *
     * @param IdGeneratorInterface $idGenerator
     */
    public function __construct(IdGeneratorInterface $idGenerator)
    {
        $this->idGenerator = $idGenerator;
    }

    /**
     * @inheritDoc
     */
    public function getRequestId(ServerRequestInterface $request) : string
    {
        return $this->idGenerator->generate();
    }
}
