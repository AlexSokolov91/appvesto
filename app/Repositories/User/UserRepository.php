<?php


namespace App\Repositories\User;


use App\Models\User;

class UserRepository implements UserInterface
{
    protected $model;

    public function __construct(User $item = null)
    {
        $this->model = $item;
    }

    /**
     * retrieves the Comment by id
     *
     * @param  int $itemId
     * @return int
     */

    public function getById(int $itemId)
    {
        return $this->model->find($itemId);
    }
    /**
     * creates a new item with the given data
     *
     * @param array $itemData
     * @return Model
     */

    public function saveItem(array $itemData)
    {
        $user = new User();
        $user->name = $user->create($itemData);
        return $user;
    }

    public function updateItem(User $item, array $itemData)
    {
        return $item->update($itemData);
    }

    public function deleteItem(User $item)
    {
        return $item->delete($item);
    }
}
