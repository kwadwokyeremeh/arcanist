<?php

declare(strict_types=1);

/**
 * Copyright (c) 2022 Kai Sassnowski
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/laravel-arcanist/arcanist
 */

namespace Arcanist;

final class StepResult
{
    /**
     * @param array<string, mixed> $payload
     */
    private function __construct(
        private readonly bool    $successful,
        private readonly array   $payload = [],
        private readonly ?string $error = null,
    ) {
    }

    /**
     * @param array<string, mixed> $payload
     */
    public static function success(array $payload = []): self
    {
        return new self(true, payload: $payload);
    }

    public static function failed(?string $error = null): self
    {
        return new self(false, error: $error);
    }

    public function successful(): bool
    {
        return $this->successful;
    }

    /**
     * @return array<string, mixed>
     */
    public function payload(): array
    {
        return $this->payload;
    }

    public function error(): ?string
    {
        return $this->error;
    }
}
