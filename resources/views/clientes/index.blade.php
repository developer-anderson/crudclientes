@include('clientes.header')


<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="card">
                                <div class="card-header">
                                    <h5>Lista de Clientes</h5>
                                    <a class="btn btn-success btn-sm" style="float: right;" href="{{ route('clientes.novo') }}">Novo Cliente</a href="">
                                </div>
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="clientes-table">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>CPF</th>
                                                    <th>Data de Nascimento</th>
                                                    <th>Sexo</th>
                                                    <th>Estado</th>
                                                    <th>Cidade</th>
                                                    <th>Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
$(document).ready(function() {
    function carregarClientes() {
        $.ajax({
            url: '{{ route('clientes.index') }}',
            method: 'GET',
            success: function(data) {
                var clientes = data.clientes || [];
                var tableBody = $('#clientes-table tbody');

                tableBody.empty();

                if (data.length > 0) {
                    var rows = data.map(function(cliente) {
                        let dataNascimento = new Date(cliente.data_nascimento);
                let dataNascimentoFormatada = dataNascimento.getDate() + '/' + (dataNascimento.getMonth() + 1) + '/' + dataNascimento.getFullYear();
                        return '<tr>' +
                            '<td>' + cliente.nome + '</td>' +
                            '<td>' + cliente.cpf + '</td>' +
                            '<td>' +dataNascimentoFormatada + '</td>' +
                            '<td>' + cliente.sexo + '</td>' +
                            '<td>' + cliente.estado + '</td>' +
                            '<td>' + cliente.cidade + '</td>' +
                            '<td>' +
                                '<a href="clientes/' + cliente.id + '/edit" class="btn btn-primary btn-sm">Editar</a> ' +
                                '<button class="btn btn-danger btn-sm delete-cliente" data-cliente-id="' + cliente.id + '">Excluir</button>' +
                            '</td>' +
                        '</tr>';
                    });
                    console.log(rows)
                    tableBody.html(rows);
                } else {
                    tableBody.append('<tr><td colspan="7">Nenhum cliente encontrado.</td></tr>');
                }
            }
        });

    }

    // Carregar a lista inicial de clientes
    carregarClientes();

    // Deletar cliente via Ajax
    $(document).on('click', '.delete-cliente', function() {
        var clienteId = $(this).data('cliente-id');
        if (confirm('Tem certeza de que deseja excluir este cliente?')) {
            $.ajax({
                url: '{{ route('clientes.excluir', ['cliente' => ':cliente']) }}'.replace(':cliente', clienteId),
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function() {
                    carregarClientes();
                }
            });
        }
    });
});
</script>

@include('clientes.footer')
