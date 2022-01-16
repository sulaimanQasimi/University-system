<div>
    @if($class != null)
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <p class="text-muted text-center">{{$class->department->department->name}}</p>
                <p class="text-muted text-center">{{$class->department->name}}</p>
                <h3 class="profile-username text-center">{{$class->name}}</h3>
                <p class="text-muted text-center">{{$class->grade}}</p>

                <a type="button"  target="_blank" href="{{route('file.class.pdf.schedule',$class->id)}}"
                   class="btn btn-block btn-outline-warning float-right d-print-none" >
                    <i class="fa fa-file-pdf-o"></i> {{trans_choice('menu.schedule',1)}}
                </a>
                {{--<p>{{$class->exams}}</p>--}}
                <table class="table table-bordered table-responsive ">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ trans_choice('menu.subject',1)}}</th>
                        <th>{{ trans_choice('menu.class',1)}}</th>
                        <th>{{ __('property.grade')}}</th>
                        <th>{{ trans_choice('menu.sub_department',1)}}</th>
                        <th>{{ __('exam.midterm')}}</th>
                        <th>{{ __('exam.class_activity')}}</th>
                        <th>{{ __('exam.home_work')}}</th>
                        <th>{{ __('exam.final')}}</th>
                        <th>{{ __('exam.total')}}</th>
                        <th>{{ __('exam.result')}}</th>
                        <th>{{ __('exam.date')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($class->exams as $exam)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$exam->subject->name}}</td>
                            <td>{{$exam->classes->name}}</td>
                            <td>{{$exam->classes->grade}}</td>
                            <td>{{$exam->classes->department->name}}</td>
                            @php($d=$exam->Examstudents()->where('student_id',$student->id)->first())
                            <td>{{$d->mid ?? ""}}</td>
                            <td>{{$d->classActivity ?? ""}}</td>
                            <td>{{$d->homework ?? ""}}</td>
                            <td>{{$d->final ?? ""}}</td>
                            <td>{{$d->total_marks ?? ""}}</td>
                            <td>{{$d->result ?? ""}}</td>
                            <td>{{$exam->date}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>{{ trans_choice('menu.subject',1)}}</th>
                        <th>{{ trans_choice('menu.class',1)}}</th>
                        <th>{{ __('property.grade')}}</th>
                        <th>{{ trans_choice('menu.sub_department',1)}}</th>
                        <th>{{ __('exam.midterm')}}</th>
                        <th>{{ __('exam.class_activity')}}</th>
                        <th>{{ __('exam.home_work')}}</th>
                        <th>{{ __('exam.final')}}</th>
                        <th>{{ __('exam.total')}}</th>
                        <th>{{ __('exam.result')}}</th>
                        <th>{{ __('exam.date')}}</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    @endif
</div>
