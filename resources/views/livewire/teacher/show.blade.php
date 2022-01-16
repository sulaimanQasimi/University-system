<div>
    {{-- Do your work, then step back. --}}
    <div class="row">
        <div class="col-md-3">
            <x-cards.info>
                @if(config('university.teacher.image'))
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                             src="{{asset('storage/'.$teacher->image)}}"
                             alt="User profile picture">
                    </div>
                @endif
                <h3 class="profile-username text-center">{{$teacher->firstname}}</h3>

                <p class="text-muted text-center">{{$teacher->lastname}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <x-cards.lists.link name="department">
                        {{$teacher->college->department->name}}
                    </x-cards.lists.link>
                    <x-cards.lists.link name="college">
                        {{$teacher->college->name}}
                    </x-cards.lists.link>
                    @if(config('university.teacher.info'))
                        <x-cards.lists.link name="father name">
                            {{$teacher->fathername}}
                        </x-cards.lists.link>
                        <x-cards.lists.link name="sex">
                            {{$teacher->sex}}
                        </x-cards.lists.link>
                        <x-cards.lists.link name="date of birth">
                            {{$teacher->dateofbirth}}
                        </x-cards.lists.link>
                        <x-cards.lists.link name="field">
                            {{$teacher->field}}
                        </x-cards.lists.link>
                        <x-cards.lists.link name="experience">
                            {{$teacher->experience}}
                        </x-cards.lists.link>

                        <x-cards.lists.link name="salary">
                            {{$teacher->salary}}
                        </x-cards.lists.link>
                    @endif
                    @if(config('university.phone.contact'))
                        <x-cards.lists.link name="phone">
                            {{$teacher->phone}}
                        </x-cards.lists.link>
                    @endif
                    @if(config('university.teacher.address'))
                        <x-cards.lists.link name="address">
                            {{$teacher->address}}
                        </x-cards.lists.link>
                    @endif
                    @if(config('university.teacher.account'))
                        <x-cards.lists.link name="email">
                            {{$teacher->user->email}}
                        </x-cards.lists.link>
                    @endif
                </ul>
                @component('components.button.complex',['model'=>$teacher,'edit'=>['link'=>route('teacher.edit', $teacher->id),'title'=>'update','blank'=>true],
                'delete'=>['link'=>route('teacher.destroy', $teacher->id),'title'=>"destroy",'blank'=>true]])

                @endcomponent
            </x-cards.info>
        </div>

        <div class="col-md-9">

            <x-cards.simple title="{{$teacher->firstname}}">
                <div x-data="{schedule :false,exam:false}">
                    <div class="row">
                        <x-button @click="schedule=! schedule" class="btn btn-primary btn-sm m-5 ">
                            @lang("SCHEDULE")
                        </x-button>
                        <x-button @click="exam=! exam" class="btn btn-primary btn-sm m-5">
                            @lang("EXAM")
                        </x-button>
                    </div>

                    <div x-show="schedule">
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
                    <div x-show="exam">
                        <x-input.input name="year" wire:model="year" type="number"></x-input.input>
                        <hr>
                        <x-table>
                            <thead>
                            <tr>
                                <th>@lang("#")</th>
                                <th>@lang("CLASS")</th>
                                <th>@lang("SUBJECT")</th>
                                <th>@lang("QUESTION")</th>
                                <th>@lang("SUCCESS")</th>
                                <th>@lang("DATE")</th>
                                <th>@lang("RESULT")</th>
                                <th>@lang("DOCUMENT")</th>
                            </tr>
                            </thead>
                            @forelse($exams as $exam)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$exam->classroom->name}}</td>
                                    <td>{{$exam->subject->name}}</td>
                                    <td>{{$exam->number_of_question}}</td>
                                    <td>{{$exam->pass_mark}}</td>
                                    <td>{{$exam->created_at}}</td>
                                    <td>
                                        <x-button.link color="dark"
                                                       href="{{route('exam.result.create',$exam->id)}}">@lang("CREATE RESULT")</x-button.link>
                                    </td>
                                    <td>
                                        <x-button.link color="dark"
                                                       href="{{route('exam.question.create',$exam->id)}}">@lang("CREATE QUESTION")</x-button.link>
                                        <x-button.link color="dark"
                                                       href="{{route('file.exam.pdf.list',$exam->id)}}">@lang("LIST")</x-button.link>
                                        <x-button.link color="dark"
                                                       href="{{route('file.exam.pdf.list.empty',$exam->id)}}">@lang("EMPTY LIST")</x-button.link>
                                        <x-button.link color="dark"
                                                       href="{{route('file.exam.pdf.paper',$exam->id)}}">@lang("PRINT QUESTION")</x-button.link>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">@lang("NOT FOUND")</td>
                                </tr>
                            @endforelse

                        </x-table>
                    </div>
                </div>
            </x-cards.simple>

        </div>
    </div>


</div>
</div>

</div>
