<?php

namespace BioCorp\Genetics;

class Strand
{
    public function __construct(
        private readonly string $dnaStrand
    )
    {
    }

    /**
     * @return int
     */
    private function length(): int
    {
        return strlen($this->dnaStrand);
    }

    public function lengthEqual(Strand $otherStrand): bool
    {
        return $this->length() === $otherStrand->length();
    }

    /**
     * @return array<string>
     */
    public function nucleotidesChars(): array
    {
        return str_split($this->dnaStrand);
    }

    public function __toString(): string
    {
        return $this->dnaStrand;
    }
}