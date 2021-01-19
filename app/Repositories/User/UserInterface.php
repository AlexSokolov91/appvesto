<?php


namespace App\Repositories\User;

use App\Models\User;

interface UserInterface
{
    public function getById(int $itemId);

    public function saveItem(array $itemData);

    public function updateItem(User $item, array $itemData);

    public function deleteItem(User $item);
}
