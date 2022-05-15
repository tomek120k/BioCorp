<?php

namespace BioCorp\Genetics;

class Strand
{
    public function __construct(
        private readonly string $dnaStrand
    )
    {
    }

    public function __toString(): string
    {
        return $this->dnaStrand;
    }
}