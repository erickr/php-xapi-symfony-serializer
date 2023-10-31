<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Serializer\Symfony;

use Symfony\Component\Serializer\SerializerInterface;
use Xabbuh\XApi\Model\Activity;
use Xabbuh\XApi\Model\Actor;
use Xabbuh\XApi\Serializer\ActivitySerializerInterface;

/**
 * Serializes and deserializes {@link Actor actors} using the Symfony Serializer component.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
final class ActivitySerializer implements ActivitySerializerInterface
{
    /**
     * @var SerializerInterface
     */
    private $serializer;


    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function serializeActivity(Activity $activity)
    {
        return $this->serializer->serialize($activity, 'json');
    }

    /**
     * {@inheritDoc}
     */
    public function deserializeActivity($data)
    {
        return $this->serializer->deserialize($data, 'Xabbuh\XApi\Model\Activity', 'json');
    }
}
