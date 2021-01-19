<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Transformers\UsersTransformers;
use Illuminate\Http\Request;
use App\Services\User\UserFacade;
use Yajra\DataTables\DataTables;

class UsersController extends BaseController
{
    public function index()
    {
        if(request()->ajax())
        {
            $data = User::latest()->get();
            return DataTables::of($data)->addColumn('action', function ($data) {
             $button = '<button type="button" name="edit" id="'.$data->id.'" data-action="'.route('users.edit', $data->id).'" class="edit btn btn-primary btn-sm edit">Edit</button>';
             $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="'.$data->id.'" data-action="'.route('users.delete', $data->id).'" class="delete btn btn-danger btn-sm delete">Delete</button>';

             return $button;
            })->rawColumns(['action'])->make(true);
        }
        return view('index');

    }

    public function createView()
    {
        return view('create');
    }

    /**
     * Create comment
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\TransformerException
     */

    public function store()
    {
        try{
            $user = UserFacade::createUser(
                request()->only('name', 'last_name', 'email')
            );

        } catch (\Exception $e){
            return $this->error('USER_ERRORS', 'CREATE_ERROR');
        }
        return redirect()->route('users.index');

    }

    public function edit($id)
    {
        return view('edit', [
            'user' => User::find($id)
        ]);
    }

    public function update($id)
    {
        try {
            UserFacade::updateUser(User::find($id),
                request()->only('name', 'last_name', 'email')
            );
        }catch (\Exception $e){
            return $this->error('USER_ERRORS', 'UPDATE_ERROR');
        }
    }

    public function delete($id)
    {
        try{
            UserFacade::deleteUser(User::find($id));
        }catch (\Exception $e){
            return $this->error('USER_ERRORS', 'DELETED_ERROR');
        }
    }
}
