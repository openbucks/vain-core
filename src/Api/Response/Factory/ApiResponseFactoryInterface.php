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

namespace Vain\Core\Api\Response\Factory;

use Vain\Core\Api\Request\Tracker\Response\Factory\ApiTrackerResponseFactoryInterface;
use Vain\Core\Api\Response\ApiResponseInterface;
use Vain\Core\Api\Security\Response\Factory\ApiSecurityResponseFactoryInterface;

/**
 * Interface ApiResponseFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApiResponseFactoryInterface extends
    ApiTrackerResponseFactoryInterface,
    ApiSecurityResponseFactoryInterface
{
    /**
     * @param int   $status
     * @param array $data
     * @param array $headers
     *
     * @return ApiResponseInterface
     */
    public function createSuccessful(int $status, array $data = [], array $headers = []) : ApiResponseInterface;

    /**
     * @param int    $status
     * @param string $shortMessage
     * @param array  $data
     * @param array  $headers
     *
     * @return ApiResponseInterface
     */
    public function createFailed(
        int $status,
        string $shortMessage = '',
        array $headers = [],
        array $data = []
    ) : ApiResponseInterface;

    /**
     * @param int    $status
     * @param string $shortMessage
     * @param array  $data
     * @param array  $headers
     *
     * @return ApiResponseInterface
     */
    public function createFromData(
        int $status,
        string $shortMessage = '',
        array $data = [],
        array $headers = []
    ) : ApiResponseInterface;
}
