@include('clientes.header')


<h2>{{ isset($cliente) ? 'Editar Cliente' : 'Novo Cliente' }}</h2>

    <form id="cliente-form">
        @csrf
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" value="{{ $cliente->nome ?? '' }}" name="nome">
        </div>
        <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" class="form-control" id="cpf"  value="{{ $cliente->cpf ?? '' }}" name="cpf">
        </div>
        <div class="form-group">
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" class="form-control" id="data_nascimento" value="{{ $cliente->data_nascimento ?? '' }}" name="data_nascimento">
        </div>
        <div class="form-group">
            <label for="sexo">Sexo:</label>
            <select class="form-control" id="sexo" name="sexo">
                <option value="Masculino" {{ isset($cliente) && $cliente->sexo == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="Feminino" {{ isset($cliente) && $cliente->sexo == 'Feminino' ? 'selected' : '' }}>Feminino</option>
            </select>
        </div>
        <div class="form-group">
            <label for="estado">Estado:</label>
            <input type="text" class="form-control" id="estado"  value="{{ $cliente->estado ?? '' }}" name="estado">
        </div>
        <div class="form-group">
            <label for="cidade">Cidade:</label>
            <input type="text" class="form-control" id="cidade" value="{{ $cliente->cidade ?? '' }}" name="cidade">
        </div>
        <input type="hidden" id="cliente-id" name="cliente_id" value="{{ $cliente->id ?? '' }}">

        <button type="submit" class="btn btn-primary">Salvar</button>
        <button type="button" class="btn btn-secondary" id="limpar-form">Limpar</button>
    </form>


    <script>
        $(document).ready(function() {
            // Preencher formulário se estiver editando um cliente
            var clienteId = $('#cliente-id').val();
            var url, method;
            url = '{{ route('clientes.atualizar', ['cliente' => ':cliente']) }}'.replace(':cliente', clienteId)
                console.log(url)
            $('#cliente-form').on('submit', function(e) {
                e.preventDefault();

                var formData = $(this).serialize();




if (clienteId) {
    if(!url.includes('/'+clienteId)){
        url = url+'/'+clienteId;
    }
    else{
        url = url;
    }


    method = 'PUT';
} else {
    url = '{{ route('clientes.salvar') }}';
    method = 'POST';
}
                $.ajax({
                    url: url,
                    method:method,
                    data: formData,
                    success: function(response) {

                        window.location.href = '/'
                    },
                    error: function(xhr) {
                        console.log(xhr.responseJSON);
                        // Exibir erros de validação, se houver
                    }
                });
            });
            //window.location.href = '{{ route('clientes.index') }}';

            $('#limpar-form').on('click', function() {
                $('#cliente-form')[0].reset();
            });
        });
    </script>
@include('clientes.footer')
