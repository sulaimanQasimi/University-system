<div class="row">
    <div class="col-md-3">
        <x-cards.info>
            <div class="card-body box-profile">
                @if(config('university.student.image'))
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                             src="{{asset('storage/'.$profile->image)}}"
                             alt="User profile picture">
                    </div>
                @endif
                <h3 class="profile-username text-center">{{$profile->firstname}}</h3>

                <p class="text-muted text-center">{{$profile->lastname}}</p>

                <ul class="list-group list-group-unbordered mb-3">

                    @if(config('university.student.info'))
                        <x-cards.lists.link name="father name">
                            {{$profile->fathername}}
                        </x-cards.lists.link>
                        <x-cards.lists.link name="grand father name">
                            {{$profile->grandfathername}}
                        </x-cards.lists.link>
                        <x-cards.lists.link name="sex">
                            {{$profile->sex}}
                        </x-cards.lists.link>
                        <x-cards.lists.link name="date of birth">
                            {{$profile->dateofbirth}}
                        </x-cards.lists.link>
                    @endif

                    @if(config('university.student.school'))
                        <x-cards.lists.link name="school">
                            {{$profile->school}}
                        </x-cards.lists.link>
                        <x-cards.lists.link name="graduation year">
                            {{$profile->year}}
                        </x-cards.lists.link>
                        <x-cards.lists.link name="Grade">
                            {{$profile->grade}}
                        </x-cards.lists.link>
                    @endif

                    @if(config('university.student.national_exam'))
                        <x-cards.lists.link name="national exam id">
                            {{$profile->kankor_id}}
                        </x-cards.lists.link>
                    @endif
                    @if(config('university.student.contact'))
                        <x-cards.lists.link name="phone">
                            {{$profile->phone}}
                        </x-cards.lists.link>
                    @endif
                    @if(config('university.student.address'))
                        <x-cards.lists.link name="address">
                            {{$profile->address}}
                        </x-cards.lists.link>
                    @endif
                    @if(config('university.student.account'))
                        <x-cards.lists.link name="email">
                            {{$profile->user->email}}
                        </x-cards.lists.link>
                    @endif
                    <x-cards.lists.link name="college">
                        {{$profile->college->name}}
                    </x-cards.lists.link>
                    @if($profile->last_grade)

                        <x-cards.lists.link name="grade">
                            {{$profile->last_grade->grade}}
                        </x-cards.lists.link>
                        <x-cards.lists.link name="class">
                            {{$profile->last_grade->name}}
                        </x-cards.lists.link>
                    @endif

                    <x-cards.lists.link name="register date">
                        {{$profile->register_date}}
                    </x-cards.lists.link>

                </ul>
                @component('components.button.complex',['model'=>$profile,'edit'=>['link'=>route('student.edit', $profile->id),'title'=>'update','blank'=>true],
                'delete'=>['link'=>route('student.destroy', $profile->id),'title'=>"destroy",'blank'=>true]])

                @endcomponent
            </div>

        </x-cards.info>

    </div>
    <div class="col-md-9">
        <x-cards.simple title="class">
            <x-input.select name="class" wire:model="classroom">
                @forelse($profile->classrooms as $item)
                    <option value="{{\Illuminate\Support\Facades\Crypt::encrypt($item->id)}}">{{$item->name}}</option>
                @empty
                    <option>@lang('NOT FOUND')</option>
                @endforelse
            </x-input.select>
            @isset($class)
                <x-table>

                    <thead>
                    <tr>
                        <th>@lang('NAME')</th>
                        <th>@lang('GRADE')</th>
                        <th>@lang('COLLEGE')</th>
                        <th colspan="2">@lang('DATE')</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$class->name}}</td>
                        <td>{{$class->grade}}</td>
                        <td>{{$class->college->name}}</td>
                        <td colspan="2">{{$class->created_at}}</td>
                    </tr>
                    <tr>
                        <th colspan="5" class="text-center">@lang('EXAM')</th>
                    </tr>
                    <tr>
                        <th>@lang('SUBJECT')</th>
                        <th>@lang('TEACHER')</th>
                        <th>@lang('QUESTION')</th>
                        <th>@lang('SUCCESS MARK')</th>
                        <th>@lang('DATE')</th>
                    </tr>
                    @forelse($class->exams as $item)

                        <tr>
                            <td><a href="#" class="fa fa-plus-circle"
                                   wire:click="exam({{$item}})"></a> {{$item->subject->name}}</td>
                            <td>{{$item->teacher->firstname}}</td>
                            <td>{{$item->number_of_question}}</td>
                            <td>{{$item->pass_mark}}</td>
                            <td>{{$item->created_at}}</td>
                        </tr>
                        @isset($exam)
                            @if($item->id == $exam->exam->id)
                                <tr>
                                    <th>@lang("HOME WORD")</th>
                                    <th>@lang("CLASS ACTIVITY")</th>
                                    <th>@lang("MIDTERM")</th>
                                    <th>@lang("FINAL")</th>
                                    <th>@lang("RESULT")</th>
                                </tr>
                                <tr>
                                    <td>{{$exam->homework}}</td>
                                    <td>{{$exam->classActivity}}</td>
                                    <td>{{$exam->mid}}</td>
                                    <td>{{$exam->final}}</td>
                                    <td>{{$exam->result}}</td>
                                </tr>
                            @endif
                        @endisset
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">@lang('NOT FOUND')</td>
                        </tr>
                    @endforelse
                    </tbody>


                </x-table>
            @endisset
        </x-cards.simple>
    </div>
</div>
