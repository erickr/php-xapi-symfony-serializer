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
use Xabbuh\XApi\Model\Actor;
use Xabbuh\XApi\Model\Person;
use Xabbuh\XApi\Serializer\Exception\PersonSerializationException;
use Xabbuh\XApi\Serializer\PersonSerializerInterface;

/**
 * Serializes and deserializes {@link Actor actors} using the Symfony Serializer component.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
final class PersonSerializer implements PersonSerializerInterface
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function serializePerson(Person $person)
    {
        return $this->serializer->serialize($person, 'json');
    }

    /**
     * {@inheritDoc}
     */
    public function deserializePerson($data)
    {
        return $this->serializer->deserialize($data, 'Xabbuh\XApi\Model\Person', 'json');
    }
}
