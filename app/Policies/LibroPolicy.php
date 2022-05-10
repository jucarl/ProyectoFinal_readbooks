<?php

namespace App\Policies;

use App\Models\Libro;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Arr;

class LibroPolicy
{
    use HandlesAuthorization;

   /**
    * Perform pre-authorization checks.
    *
    * @param  \App\Models\User  $user
    * @param  string  $ability
    * @return void|bool
    */
    public function before(User $user, $ability)
    {
        if ($user->isAdmin()) {
            Response::allow();
        }
    
    }


    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        dd($user);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Libro $libro)
    {
       
    
    }
    

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
       
            
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Libro $libro)
    {
        $data = Arr::pluck($libro->autor,'id');
        //dd($user,$libro,$data,strcmp($user->id,$data[0])=== 1);
        return strcmp($user->id,$data[0]) === 0
            ? Response::allow()
            : Response::deny('Este libro no te pertenece.');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Libro $libro)
    {
        $data = Arr::pluck($libro->autor,'id');
        //dd($user,$libro,$data,strcmp($user->id,$data[0])=== 1);
        return strcmp($user->id,$data[0]) === 0
            ? Response::allow()
            : Response::deny('Este libro no te pertenece.');
        
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Libro $libro)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Libro $libro)
    {
        
        $data = Arr::pluck($libro->autor,'id');
        //dd($user,$libro,$data,strcmp($user->id,$data[0])=== 1);
        return strcmp($user->id,$data[0]) === 0
            ? Response::allow()
            : Response::deny('Este libro no te pertenece.');
    }
}
