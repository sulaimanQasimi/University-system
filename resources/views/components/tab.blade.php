<div id="accordion">
    <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
    <div class="card card-{{$color}}">
        <div class="card-header">
            <h4 class="card-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#{{$id}}" class="" aria-expanded="false">
                {{$name}}
                </a>
            </h4>
        </div>
        <div id="{{$id}}" class="panel-collapse in collapse " style="">
            <div class="card-body">
              {{$slot}}
            </div>
        </div>
    </div>
</div>