@extends('layouts.app')


<link href="{{ asset('/css/random_users.css') }}" rel="stylesheet">

@section('content')

<div class="container">
    <h4>Lista de Usuários</h4>
    {{-- Camada de fundo cinza para detalhes do usuário --}}
    <div class="overlay"></div>
     {{-- Tabela para listar os usuários --}}
    <table class="table" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Data de Nascimento</th>
                <th>Detalhes</th>
            </tr>
        </thead>
        <tbody>
            {{-- Loop pelos usuários da variável $random_users, variavel que foi preenchida no Controller --}}
            @foreach ($random_users as $user)
                <tr>
                    <td>{{ $user['id'] }}</td>
                    <td>{{ $user['first_name'] }} {{ $user['last_name'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['phone_number'] }}</td>
                    <td>{{ $user['date_of_birth'] }}</td>
                    <td>
                        <button class="show-details-btn btn btn-info btn-sm" data-details="{{ json_encode($user, JSON_PRETTY_PRINT) }}">Mostrar Detalhes</button>

                        {{-- Div oculta para os detalhes do usuário --}}
                        <div class="user-details overlay-content" style="display: none;">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h5 class="card-title">Detalhes do Usuário</h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="{{ $user['avatar'] }}" alt="Foto do Usuário" class="img-fluid rounded-border" style="max-width: 100px;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <dl>
                                                <dt><strong>Username:</strong></dt>
                                                <dd>{{ $user['username'] }}</dd>
                                                <dt><strong>Gênero:</strong></dt>
                                                <dd>{{ $user['gender'] }}</dd>
                                                <dt><strong>Data de Nascimento:</strong></dt>
                                                <dd>{{ $user['date_of_birth'] }}</dd>
                                            </dl>
                                        </div>
                                        <div class="col-md-6">
                                            <dl>
                                                <dt><strong>Emprego:</strong></dt>
                                                <dd>{{ $user['employment']['title'] }}</dd>
                                                <dt><strong>Habilidade:</strong></dt>
                                                <dd>{{ $user['employment']['key_skill'] }}</dd>
                                            </dl>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <dl>
                                                <dt><strong>Endereço:</strong></dt>
                                                <dd>
                                                    {{ $user['address']['street_name'] }},
                                                    {{ $user['address']['street_address'] }},
                                                    {{ $user['address']['city'] }},
                                                    {{ $user['address']['zip_code'] }},
                                                    {{ $user['address']['state'] }},
                                                    {{ $user['address']['country'] }}
                                                </dd>
                                            </dl>
                                        </div>
                                        <div class="col-md-6">
                                            <dl>
                                                <dt><strong>Coordenadas:</strong></dt>
                                                <dd>{{ $user['address']['coordinates']['lat'] }}</dd>
                                                <dd>{{ $user['address']['coordinates']['lng'] }}</dd>
                                            </dl>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <dl>
                                                <dt><strong>Cartão de Crédito:</strong></dt>
                                                <dd>{{ $user['credit_card']['cc_number'] }}</dd>
                                            </dl>
                                        </div>
                                        <div class="col-md-6">
                                            <dl>
                                                <dt><strong>Assinatura:</strong></dt>
                                                <dd>{{ $user['subscription']['plan'] }}</dd>
                                                <dd>{{ $user['subscription']['status'] }}</dd>
                                                <dd>{{ $user['subscription']['payment_method'] }}</dd>
                                                <dd>{{ $user['subscription']['term'] }}</dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Botões para fechar os detalhes e mostrar informações sensíveis --}}
                            <div class="d-flex justify-content-center">
                                <button class="close-details-btn btn btn-secondary btn-sm">Fechar Detalhes</button>
                                <button class="show-sensitive-details-btn btn btn-danger btn-sm" style="margin-top: 10px;">Mostrar Informações Sensíveis</button>
                            </div>
                            {{-- Informações sensíveis --}}
                            <div class="sensitive-details " style="display: none; border: none;">
                                <h6>Informações Sensíveis</h6>
                                <p><strong>UID:</strong> {{ $user['uid'] }}</p>
                                <p><strong>Password:</strong> {{ $user['password'] }}</p>
                                <p><strong>Número de Seguro Social:</strong> {{ $user['social_insurance_number'] }}</p>
                                <p><strong>Número do Cartão de Crédito:</strong> {{ $user['credit_card']['cc_number'] }}</p>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
        $(document).ready(function() {

            // Configuração da DataTable
            $('#users-table').DataTable({
                dom: '<"float-left" B><"float-left"><"float-right"f>t<"bottom"<"float-left" lri><"float-right" p>>',
                "oLanguage": { // Configuração de texto personalizado para a DataTable
                "sSearch": "Pesquisar:",
                "sLengthMenu": "Mostrar _MENU_ registros por página",
                "sZeroRecords": "Nenhum registro encontrado",
                "sInfo": "Mostrando _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(filtrado de _MAX_ registros no total)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLoadingRecords": "Carregando...",
                "oPaginate": {
                    "sFirst": "Primeira",
                    "sLast": "Última",
                    "sNext": "Próxima",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": ativar para ordenar a coluna em ordem ascendente",
                    "sSortDescending": ": ativar para ordenar a coluna em ordem descendente"
                }
            },
            "initComplete": function(settings, json) {
                $('#users-table').removeClass('form-inline');
                $('#users-table').addClass('table table-striped table-bordered');
            }
            });

            // Evento para mostrar detalhes do usuário
            $('#users-table').on('click', '.show-details-btn', function() {
                var $detailsDiv = $(this).closest('td').find('.user-details');
                var userDetails = $(this).data('details');

                $('.overlay').show(); // Mostra a camada de fundo cinza
                $detailsDiv.find('.user-details pre').html(JSON.stringify(userDetails, null, 4));
                $detailsDiv.show(); // Mostra a div de detalhes
            });

            // Evento para fechar detalhes do usuário
            $('#users-table').on('click', '.close-details-btn', function() {
                $('.sensitive-details').hide(); // Esconde os dados sensiveis
                $(this).closest('.user-details').hide();
                $('.overlay').hide(); // Esconde a camada cinza da tela
            });


            // Fechar a div de detalhes e a camada de fundo quando o usuário clica fora da div
            $(document).on('click', '.overlay', function() {
                $('.sensitive-details').hide();
                $('.overlay').hide();
                $('.user-details').hide();
            });

            // Evento para mostrar informações sensíveis
            $('#users-table').on('click', '.show-sensitive-details-btn', function() {
                var $sensitiveDetailsDiv = $(this).closest('.user-details').find('.sensitive-details');
                $sensitiveDetailsDiv.slideToggle(); // Alterna a exibição das informações sensíveis
            });


        });
    </script>

@endsection
