
<div class="modal fade" id="modalSemServicos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        {{-- <div class="modal-header"> --}}
          <div class="d-flex justify-content-center">
          {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
        </div>
        <i style="font-size: 5em" class="bi bi-x-circle text-danger"></i>
          <h1 class="modal-title fs-5" id="exampleModalLabel">ATENÇÃO!</h1>
        {{-- </div> --}}
        <div class="modal-body">

            <p>Não é possível agendar um cliente <br>pois ainda não possui serviços cadastrados!</p>
        </div>
        {{-- <div class="modal-footer"> --}}
          <div class="gap-2 d-md-block">

          <button type="button" class="btn btn-danger mx-2 mb-3" data-bs-dismiss="modal">Cancelar</button>

          <a href="{{route('admin.servicos.index')}}"><button type="submit" class="btn btn-primary mx-2 mb-3">Cadastrar Serviço</button></a>

          </div>

        {{-- </div> --}}
      </div>
    </div>
  </div>