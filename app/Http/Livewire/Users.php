<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class Users extends LivewireDatatable
{
    public $exportable =true;
    public $model=User::class;


    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label(__('property.id'))
                ->filterable()
                ->sortBy('id'),
            Column::name(
                'name')
                ->label(__('property.name'))
                ->filterable(),
            NumberColumn::name('email')
                ->label(__('property.email')),
            NumberColumn::name('role.Rolename')
                ->label(__('property.role')),
            Column::callback(['id'], function ($id) {
                return view('component.btn', ['url' => route('user.show',$id),'name'=>__("button.view")]);
            })->label(__("button.view"))->width(30),
        ];
    }
}
