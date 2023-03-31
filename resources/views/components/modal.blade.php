{{--

                                         @include('components.modal', [
                                                'id'        =>"btnid",
                                                'modalsize' => 'modal-lg',
                                                'modaltitle' => 'Title To put',
                                                'type' => 'Types',
                                            ])
  --}}

<div class="modal fade" id="{{$id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog {{$modalsize}}" style="z-index:4" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$modaltitle }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        @if(Auth::check())
        @switch($type)
        @case('addpasser')
        @include('components.modalcontents.addpasser')
        @break

        @case('importdata')
        @include('components.modalcontents.importlist')
        @break



        @endswitch
        @endif

      </div>


    </div>
  </div>
</div>
</div>