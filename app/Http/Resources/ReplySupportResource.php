<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReplySupportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'identifier' => $this->id,
            'content' => $this->content,
            'support_id' => $this->support_id,
            'dt_created' => Carbon::make($this->created_at)->format('Y-m-d H:i:s'),
        ];
    }
}
