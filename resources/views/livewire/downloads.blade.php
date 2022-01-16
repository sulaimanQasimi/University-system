<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

 <div class="pb-5">
     <ul class="list-unstyled text-right">
         @foreach($files as $file)

             <li>
                 {{$file->name}} <a href="#" wire:click="downloadPath({{$file->id}})"class="float-left">
                     <i class="fas fa-download "></i>
                 </a>
             </li>

         @endforeach
     </ul>
 </div>
@can('create',\App\Models\Subject::class)
    <button type="button" class="btn btn-dark btn-xl wi" data-toggle="modal" data-target="#modal-xl">
        ایجاد فایل

    </button>
    <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <livewire:download.create/>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @endcan
    <!-- /.modal -->
</div>
