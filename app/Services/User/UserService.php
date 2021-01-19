<?php


namespace App\Services\User;

use App\Models\User;
use App\Repositories\User\UserInterface;
use Illuminate\Database\Eloquent\Model;

class UserService
{
    protected $userRepository;

    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function get($itemId)
    {
        return $this->userRepository->getById($itemId);
    }

    /**
     * Creates a item with the given data
     *
     * @param array $data
     * @return Model
     */

    public function save(array $data)
    {
        return $this->userRepository->saveItem($data);
    }

    public function delete(User $item)
    {
        return $this->userRepository->deleteItem($item);
    }
}
