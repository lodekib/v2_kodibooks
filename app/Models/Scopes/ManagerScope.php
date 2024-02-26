<?php

namespace App\Models\Scopes;

use App\Models\Caretaker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class ManagerScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if(Auth::user()->hasRole('Manager')){
            $builder->where('manager_id',Auth::id());
        }else if(Auth::user()->hasRole('Caretaker')){
            $builder->where('manager_id',Caretaker::find(Auth::id())->manager_id);
        }
    }
}
