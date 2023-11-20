
<div class="modal fade" id="modal-deletar-{{$cliente->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">ATENÇÃO!</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Deseja realmente deletar o cliente?</p>
            <p class="text-capitalize"><strong>{{$cliente->nome }}</strong></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

          <form action="{{route('admin.clientes.destroy',$cliente->id)}}" method="POST">
            @csrf
            @method('DELETE')
          <button type="submit" class="btn btn-danger">Confirmar</button>
        </form>
        </div>
      </div>
    </div>
  </div>