<?php


namespace App\Services\User;


use App\Repositories\User\UserRepository;
use App\Models\User;
use Illuminate\Support\Facades\Facade;

class UserFacade extends Facade
{
    /**
     * Get the registered name of the component. This tells $this->app what record to return
     * (e.g. $this->app[‘userService’])
     *
     * @return string
     */

    protected static function getFacadeAccessor() {
        return 'UserService';
    }
    /**
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function createUser(array $data)
    {
        /**
         * @var $repository UserRepository
         */
        $repository = new UserRepository();
        $repository->saveItem($data);
    }

    public static function deleteUser(User $userId)
    {
        /**
         * @var $repository UserRepository
         */
        $repository = new UserRepository();
        $repository->deleteItem($userId);
    }

    public static function updateUser(User $user, array $item)
    {
        /**
         * @var $repository UserRepository
         */
        $repository = new UserRepository();
        $repository->updateItem($user, $item);
        return redirect()->route('users.index');
    }

    public static function getUserById(User $userId)
    {
        /**
         * @var $repository UserRepository
         */
        $repository = app()->get(self::getFacadeAccessor());

        return $repository->getById($userId);
    }
}
