<?php

namespace App\Repositories;

use App\DTO\Replies\CreateReplyDTO;
use App\Models\ReplySupport as ReplySupport;
use App\Repositories\Contracts\ReplyRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Auth;
use stdClass;

class ReplySupportRepository implements ReplyRepositoryInterface
{
    public function __construct(
        protected ReplySupport $model
    ) {}

    public function getAllBySupportId(string $supportId): array
    {
        $replies = $this->model
            ->with([
                'user',
                'support'
            ])->where('support_id', $supportId)
            ->get();

        return $replies->toArray();
    }

    public function createNew(CreateReplyDTO $dto): stdClass
    {
        $reply = $this->model->create([
            'content' => $dto->content,
            'support_id' => $dto->supportId,
            'user_id' => Auth::user()->id,
        ]);

        return (object)$reply->toArray();
    }

    public function delete(string $id): bool
    {
        if (! $reply = $this->model->find($id)) return false;
        return (bool)$reply->delete();
    }
}