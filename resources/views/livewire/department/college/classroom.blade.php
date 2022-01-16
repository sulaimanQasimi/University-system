<div class="col-md-6">
    <h6 wire:loading class="fa fa-sync-alt fa-spin">{{--{{__("LOADING ...")}}--}}</h6>

    @if($classroom)

        <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="custom-content-above-classroom-tab" data-toggle="pill"
                   href="#custom-content-above-classroom" role="tab" aria-controls="custom-content-above-classroom"
                   aria-selected="true">{{__("CLASSROOM")}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-content-above-student-tab" data-toggle="pill"
                   href="#custom-content-above-student" role="tab" aria-controls="custom-content-above-student"
                   aria-selected="false">{{__("STUDENT")}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-content-above-schedule-tab" data-toggle="pill"
                   href="#custom-content-above-schedule" role="tab" aria-controls="custom-content-above-schedule"
                   aria-selected="false">{{__("SCHEDULE")}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-content-above-exam-tab" data-toggle="pill"
                   href="#custom-content-above-exam" role="tab" aria-controls="custom-content-above-exam"
                   aria-selected="false" wire:click="">{{__("EXAM")}}</a>
            </li>
        </ul>
        <div class="tab-custom-content">
            <p class="lead mb-0">{{$classroom->name}}</p>
        </div>
        <div class="tab-content" id="custom-content-above-tabContent">
            <div class="tab-pane fade active show" id="custom-content-above-classroom" role="tabpanel"
                 aria-labelledby="custom-content-above-classroom-tab">

            </div>
            <div class="tab-pane fade" id="custom-content-above-student" role="tabpanel"
                 aria-labelledby="custom-content-above-student-tab">
                <div x-data="{openStudent :true,createStudent:false,importStudent:false}">
                    <div class="row">
                        <x-button @click="openStudent=! openStudent" class="btn btn-primary btn-sm m-5">
                            {{__("STUDENT")}}
                        </x-button>
                        @can('view',$classroom)
                            <x-button @click="createStudent=! createStudent"
                                      wire:click="$emitTo('import.students-by-id','ImportStudentById',{{$classroom}})"
                                      class="btn btn-primary btn-sm m-5">
                                {{__("CREATE STUDENT BY ID")}}
                            </x-button>
                            <x-button @click="importStudent=! importStudent"
                                      wire:click="$emitTo('import.students-by-class','ImportStudentByClass',{{$classroom}})"
                                      class="btn btn-primary btn-sm m-5">
                                {{__("IMPORT STUDENT OF CLASS")}}
                            </x-button>
                        @endcan
                    </div>
                    <div x-show="openStudent">
                        <x-table>
                            <thead>
                            <tr>
                                <th>@lang("#")</th>
                                <th>@lang("NAME")</th>
                                <th>@lang("LAST NAME")</th>
                                <th>@lang("ID")</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($classroom->classStudents as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->student->firstname}}</td>
                                    <td>{{$item->student->lastname}}</td>
                                    <td>{{$item->student->id}}</td>
                                </tr>

                            @empty
                            @endforelse
                            </tbody>
                        </x-table>
                    </div>

                    @can('view',$classroom)
                        <div x-show="createStudent">
                            <livewire:import.students-by-id/>
                        </div>
                        <div x-show="importStudent">
                            <livewire:import.students-by-class/>
                        </div>
                    @endcan
                </div>


            </div>
            <div class="tab-pane fade " id="custom-content-above-schedule" role="tabpanel"
                 aria-labelledby="custom-content-above-schedule-tab">
                <div x-data="{openSchedule :true,createSchedule:false}">
                    <div class="row">
                        <x-button @click="openSchedule=! openSchedule" class="btn btn-primary btn-sm m-5 ">
                            {{__("SCHEDULE")}}
                        </x-button>

                        @can('view',$classroom)
                            <x-button @click="createSchedule=! createSchedule" class="btn btn-primary btn-sm m-5">
                                {{__("CREATE SCHEDULE")}}
                            </x-button>
                        @endcan
                    </div>

                    <div x-show="openSchedule">
                        <x-table>
                            <thead>
                            <tr>
                                <th>@lang("DAY")/{{__("CREDIT")}}</th>
                                <th>@lang("FIRST")</th>
                                <th>@lang("SECOND")</th>
                                <th>@lang("THIRD")</th>
                                <th>@lang("FORTH")</th>
                                <th>@lang("FIFTH")</th>
                                <th>@lang("SIXTH")</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if($schedule)
                                <tr>
                                    <td class="text-success">@lang("SATURDAY")</td>
                                    <td>{{$saturday[1]}}</td>
                                    <td>{{$saturday[2]}}</td>
                                    <td>{{$saturday[3]}}</td>
                                    <td>{{$saturday[4]}}</td>
                                    <td>{{$saturday[5]}}</td>
                                    <td>{{$saturday[6]}}</td>
                                </tr>
                                <tr>
                                    <td class="text-success">@lang("SUNDAY")</td>
                                    <td>{{$sunday[1]}}</td>
                                    <td>{{$sunday[2]}}</td>
                                    <td>{{$sunday[3]}}</td>
                                    <td>{{$sunday[4]}}</td>
                                    <td>{{$sunday[5]}}</td>
                                    <td>{{$sunday[6]}}</td>
                                </tr>
                                <tr>
                                    <td class="text-success">@lang("MONDAY")</td>
                                    <td>{{$monday[1]}}</td>
                                    <td>{{$monday[2]}}</td>
                                    <td>{{$monday[3]}}</td>
                                    <td>{{$monday[4]}}</td>
                                    <td>{{$monday[5]}}</td>
                                    <td>{{$monday[6]}}</td>

                                </tr>
                                <tr>

                                    <td class="text-success">@lang("TUESDAY")</td>
                                    <td>{{$tuesday[1]}}</td>
                                    <td>{{$tuesday[2]}}</td>
                                    <td>{{$tuesday[3]}}</td>
                                    <td>{{$tuesday[4]}}</td>
                                    <td>{{$tuesday[5]}}</td>
                                    <td>{{$tuesday[6]}}</td>
                                </tr>
                                <tr>
                                    <td class="text-success">@lang("WEDNESDAY")</td>
                                    <td>{{$wednesday[1]}}</td>
                                    <td>{{$wednesday[2]}}</td>
                                    <td>{{$wednesday[3]}}</td>
                                    <td>{{$wednesday[4]}}</td>
                                    <td>{{$wednesday[5]}}</td>
                                    <td>{{$wednesday[6]}}</td>
                                </tr>
                                <tr>
                                    <td class="text-success">@lang("THURSDAY")</td>
                                    <td>{{$thursday[1]}}</td>
                                    <td>{{$thursday[2]}}</td>
                                    <td>{{$thursday[3]}}</td>
                                    <td>{{$thursday[4]}}</td>
                                    <td>{{$thursday[5]}}</td>
                                    <td>{{$thursday[6]}}</td>
                                </tr>
                                <tr>
                                    <td class="text-success">@lang("FRIDAY")</td>
                                    <td>{{$friday[1]}}</td>
                                    <td>{{$friday[2]}}</td>
                                    <td>{{$friday[3]}}</td>
                                    <td>{{$friday[4]}}</td>
                                    <td>{{$friday[5]}}</td>
                                    <td>{{$friday[6]}}</td>
                                </tr>
                            @endif
                            </tbody>

                        </x-table>


                    </div>

                    @can('view',$classroom)
                        <div x-show="createSchedule">
                            <livewire:schedule.create/>
                        </div>
                    @endcan
                </div>

            </div>
            <div class="tab-pane fade" id="custom-content-above-exam" role="tabpanel"
                 aria-labelledby="custom-content-above-exam-tab">
                <div x-data="{open :true,create:false}">
                    <div class="row">
                        <x-button @click="open=! open"
                                  class="btn btn-primary btn-sm m-5 table-bordered table-hover table-active">
                            {{__("EXAM")}}
                        </x-button>

                        @can('view',$classroom)
                            <x-button @click="create=! create" class="btn btn-primary btn-sm m-5">
                                {{__("CREATE EXAM")}}
                            </x-button>
                        @endcan
                    </div>

                    <div x-show="open">

                        <x-table>
                            <thead>
                            <tr>
                                <th>{{__("#")}}</th>
                                <th>{{__("SUBJECT")}}</th>
                                <th>{{__("TEACHER")}}</th>
                                <th>{{__("QUESTION")}}</th>
                                <th>{{__("MARK")}}</th>
                                <th>{{__("SUCCESS")}}</th>
                                <th>{{__("DATE")}}</th>
                                <th>{{__("RESULT")}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($classroom->exams as $exam)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$exam->subject->name}}</td>
                                    <td>{{$exam->teacher->firstname}}</td>
                                    <td>{{$exam->number_of_question}}</td>
                                    <td>{{$exam->question_mark}}</td>
                                    <td>{{$exam->pass_mark}}</td>
                                    <td>{{$exam->date}}</td>
                                    <td>{{$exam->result}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center"></td>
                                </tr>
                            @endforelse
                            </tbody>


                        </x-table>

                    </div>

                    @can('view',$classroom)
                        <div x-show="create">
                            <livewire:exam.create/>
                        </div>
                    @endcan
                </div>

            </div>
        </div>

    @endif

</div>
{{-- Nothing in the world is as soft and yielding as water. --}}

