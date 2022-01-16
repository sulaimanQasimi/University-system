<div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{asset('storage/'.$image)}}"
                             alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{__('student')}}</h3>

                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>{{$firstname}}</b> <h6 class="float-right">{{__('component.name')}}</h6>
                                </li>
                                <li class="list-group-item">
                                    <b>{{$fathername}}</b> <h6 class="float-right">{{__('component.fname')}}</h6>
                                </li>
                                <li class="list-group-item">
                                    <b>{{$grandfathername}}</b> <h6 class="float-right">{{__('component.gname')}}</h6>
                                </li>
                                <li class="list-group-item">
                                    <b>{{$lastname}}</b> <h6 class="float-right">{{__('component.lastname')}}</h6>
                                </li>

                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>{{$dateofBirth}}</b> <h6 class="float-right">{{__('component.dateofBirth')}}</h6>
                                </li>
                                <li class="list-group-item">
                                    <b>{{$phone}}</b> <h6 class="float-right">{{__('component.phone')}}</h6>
                                </li>
                                <li class="list-group-item">
                                    <b>{{$address}}</b> <h6 class="float-right">{{__('component.address')}}</h6>
                                </li>
                                <li class="list-group-item">
                                    <b>{{$class->count()}}</b> <h6 class="float-right">{{__('main.class')}}</h6>
                                </li>
                            </ul>
                        </div>
                    </div>


                </div>
            </div>

        </div>
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title text-right">
                        <i class="fas fa-bullhorn"></i>
                        {{ __('main.class') }}
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <select class="form-control" wire:model="select_id">
                        <option>{{__('main.class')}}</option>
                        @foreach($class as $c)
                            <option class="farsi-number text-right"
                                    value="{{$c->classes->id}}">{{$c->classes->name}}</option>
                        @endforeach
                    </select>


                    <table class="table table-head-fixed table-hover table-dark">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('component.subject') }}</th>
                            <th>{{ __('component.teacher') }}</th>
                            <th>{{ __('component.exam of',['name'=>__('component.mid')]) }}</th>
                            <th>{{ __('component.homeWork') }}</th>
                            <th>{{ __('component.classActivity') }}</th>
                            <th>{{ __('component.exam of',['name'=>__('component.final')]) }}</th>
                            <th>{{ __('component.result') }}</th>
                            <th>{{ __('component.total') }}</th>
                        </thead>
                        <tbody>
                        <div wire:poll="classView">
                            @if($studentClass!=null)
                                @foreach($studentClass as $c)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$c->exam->subject->name}}</td>
                                        <td>{{$c->exam->teacher->firstname}}</td>
                                        <td>{{$c->mid}}</td>
                                        <td>{{$c->final}}</td>
                                        <td>{{$c->homework}}</td>
                                        <td>{{$c->classActivity}}</td>
                                        <td>{{$c->result}}</td>
                                        @php($total=$c->final+$c->mid + $c->homework + $c->classActivity)
                                        <td>{{$total}}</td>


                                    </tr>
                                @endforeach
                            @endif
                        </div>
                        </tbody>


                        <tfoot>
                        <tr>
                            <th>#</th>

                            <th>{{ __('component.subject') }}</th>

                            <th>{{ __('component.teacher') }}</th>

                            <th>{{ __('component.exam of',['name'=>__('component.mid')]) }}</th>
                            <th>{{ __('component.homeWork') }}</th>
                            <th>{{ __('component.classActivity') }}</th>
                            <th>{{ __('component.exam of',['name'=>__('component.final')]) }}</th>

                            <th>{{ __('component.result') }}</th>
                            <th>{{ __('component.total') }}</th>
                        </tr>
                        </tfoot>

                    </table>

                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
</div>