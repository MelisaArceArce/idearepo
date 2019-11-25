@if(session("mensaje"))
<div class="modal-content border-primary">
        <div class="modal-header">
            <h5 class="modal-title"  id="exampleModalLabel">
                <i class="pe-7s-speaker"></i>
                Error en el formulario
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach         
                </ul>
        </div>
        <div class="modal-footer">
            <button type="mt-2 btn btn-primary" class="btn btn-secondary" data-dismiss="modal">Ok</button>
        </div>
    </div>
@endif
