<?php

namespace App\Services;

use stdClass;

class SupportService
{
    protected $respository;

    public function __construct()
    {
        
    }

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function findOne(string|int $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    public function new(
        string $subject,
        string $status,
        string $body
    ): stdClass
    {
        $this->respository->new(
            $subject,
            $status,
            $body
        );   
    }

    public function update(
        string $id,
        string $subject,
        string $status,
        string $body,
    ): stdClass|null
    {
        $this->respository->update(
            $id,
            $subject,
            $status,
            $body
        );   
    }

    public function delete(string|int $id): void
    {
        $this->repository->delete($id);
    }
}