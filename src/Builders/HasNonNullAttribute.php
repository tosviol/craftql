<?php

namespace markhuot\CraftQL\Builders;

use GraphQL\Type\Definition\Type;

trait HasNonNullAttribute {

    /**
     * If the schema is required
     *
     * @var boolean
     */
    protected $isNonNull;

    /**
     * Set if required
     *
     * @param boolean $nonnull
     * @return self
     */
    function nonNull(bool $nonNull=true): self {
        $this->isNonNull = $nonNull;
        return $this;
    }

    /**
     * Get if required
     *
     * @return boolean
     */
    function isNonNull(): boolean {
        return $this->isNonNull;
    }

}