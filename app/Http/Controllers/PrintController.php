<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\ClassRoom;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function single_bill($id)
    {
        $bill=Bill::query()->findOrFail($id);
        return view('print.bill.single',compact('bill'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function all_bill($id)
    {
        $class=ClassRoom::query()->findOrFail($id);
        return view('print.bill.all',compact('class'));
    }

}
