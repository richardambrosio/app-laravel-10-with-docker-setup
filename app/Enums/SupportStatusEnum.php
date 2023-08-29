<?php

namespace App\Enums;

enum SupportStatusEnum: string
{
    case A = "Open";
    case P = "Closed";
    case C = "Pendent";

    public static function fromValue(string $value): string
    {
        foreach (self::cases() as $status) {
            if ($value === $status->name) return $status->value;
        }

        throw new \ValueError("$status is not valid.");
    }
}