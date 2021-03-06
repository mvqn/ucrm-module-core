<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use MVQN\Annotations\AnnotationReaderException;
use MVQN\Collections\CollectionException;
use MVQN\Common\ArraysException;
use MVQN\Common\PatternsException;

use MVQN\REST\Endpoints\EndpointException;
use MVQN\REST\RestClientException;

use UCRM\REST\Endpoints\Organization;

/**
 * Trait OrganizationHelpers
 *
 * @package UCRM\REST\Endpoints\Helpers\Common
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait OrganizationHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Organization|null
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public function getOrganization(): ?Organization
    {
        if (property_exists($this, "organizationId") && $this->{"organizationId"} !== null)
            $organization = Organization::getById($this->organizationId);

        /** @var Organization $organization */
        return $organization;
    }

    /**
     * @param Organization $value
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     */
    public function setOrganization(Organization $value): self
    {
        $this->{"organizationId"} = $value->getId();

        /** @var self $this */
        return $this;
    }

    /**
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     * @throws AnnotationReaderException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public function setOrganizationByDefault(): self
    {
        /** @var Organization $organization */
        $organization = Organization::getByDefault();
        $this->{"organizationId"} = $organization->getId();

        /** @var self $this */
        return $this;
    }


}