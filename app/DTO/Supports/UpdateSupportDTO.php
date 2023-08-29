<?php

namespace App\DTO\Supports;

use App\Enums\SupportStatusEnum;
use App\Http\Requests\StoreUpdateSupportRequest;

class UpdateSupportDTO
{
    public function __construct(
        public string $id,
        public string $subject,
        public SupportStatusEnum $status,
        public string $body
    ) {}

    public static function makeFromRequest(StoreUpdateSupportRequest $request, string $id = null): self
    {
        return new self(
            $id ?? $request->id,
            $request->subject,
            SupportStatusEnum::A,
            $request->body
        );
    }
}