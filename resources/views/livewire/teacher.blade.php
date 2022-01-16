<div>

    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{asset('storage/'.$teacher->image)}}"
                             alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{$teacher->firstname}}</h3>

                    <p class="text-muted text-center">{{$teacher->lastname}}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <strong class="float-right">{{$teacher->fathername}}</strong> <b
                                    class="float-left">{{__('property.f_name')}}</b>
                        </li>
                        <li class="list-group-item">
                            <strong class="float-right">{{$teacher->dateofbirth}}</strong> <b
                                    class="float-left">{{__('property.date_birth')}}</b>
                        </li>
                        <li class="list-group-item">
                            <strong class="float-right">{{$teacher->schedules->count()}}</strong>
                            <b class="float-left">{{trans_choice('menu.class',$teacher->schedules->count())}}</b>
                        </li>
                        <li class="list-group-item">
                            <strong class="float-right">{{$teacher->exams->count()}}</strong> <b
                                    class="float-left">{{trans_choice('menu.exam',$teacher->exams->count())}}</b>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" href="#schedule" data-toggle="tab">{{trans_choice('menu.schedule',2)}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#exam" data-toggle="tab">{{trans_choice('menu.exam',2)}}</a>
                        </li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="schedule">
                            <livewire:teacher.schedule :teacher="$teacher">
                        </div>
                        <div class="tab-pane" id="exam">

                            <livewire:teacher.exam.search :teacher="$teacher">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="show-teacher-exam">
        <div class="modal-dialog modal-xl" style="max-width: 100%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('page.show',['name'=>trans_choice('menu.super_department',1)])}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <livewire:teacher.exam.show :teacher="$teacher">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
