<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">@lang("POST")</a>
                </li>
                @can('create',\App\Models\Post::class)
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">@lang("CREATE POST")</a>
                    </li>
                @endcan
            </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content">
                <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    @forelse($posts as $post)
                        <div class="post clearfix">

                            <span class="username">
                    {{$post->user->name}}
                                <span class="text-muted float-right">{{
                                \Illuminate\Support\Carbon::make($post->created_at)->format("h:i:s Y/m/d")}}</span>
                    </span>
                            <!-- /.user-block -->
                            <p class="text-gray">
                                {!! $post->txt !!}
                            </p>

                        </div>
                    @empty
                        <h5 class="text-center">@lang("NOT FOUND")</h5>
                @endforelse
                <!-- /.post -->
                </div>
                @can('create',\App\Models\Post::class)
                    <div class="tab-pane" id="settings">
                        <livewire:post.create/>
                    </div>
            @endcan
            <!-- /.tab-pane -->
            </div>

        </div>
        <!-- /.tab-content -->
    </div><!-- /.card-body -->
</div>

<!------------------This component creates by sulaiman Qasimi------------------->

