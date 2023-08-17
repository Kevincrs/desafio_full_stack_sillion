@extends('layouts.app') <!-- Estende o layout padrão da aplicação -->

<style type="text/css">

    /* Estilos para os elementos customizados do card */
    .small-box .icon>i {
      font-size: 80px;
      right: 15px;
      top: 15px;
    }

    .small-box>.small-box-footer {
      background-color: rgba(0,0,0,.1);
      z-index: 10;
    }

    .small-box .img-container:hover i{
      -webkit-transform: scale(1.1);
      transform: scale(1.1);
    }

    .small-box {
      box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
      max-width: 200px;
    }

    /* Estilos para o corpo do card do menu */
    .menu-card-body {
      padding: 0;
      background-color: #f8fafc; /* Usa o mesmo fundo da página */
      border: none; /* Remove a borda do corpo do card */
    }

    /* Estilos para o cabeçalho do card do menu */
    .menu-card-header{
      border: 1px solid rgba(0, 0, 0, 0.03) !important; /* Define a borda do cabeçalho do card */
    }
    .menu-card{
        border: none !important; /* Remove a borda do card do menu */
    }

</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card menu-card"> <!-- Card principal do menu -->
                <div class="card-header menu-card-header">{{ __('Menus') }}</div> <!-- Cabeçalho do card com o título "Menus" -->
                <div class="card-body menu-card-body"> <!-- Corpo do card do menu -->

                    <div class="small-box bg-success rounded mb-4">
                        <a href="{{ route('random-users-data') }}" class="text-decoration-none d-block"> <!-- Link para a rota de dados de usuários aleatórios -->
                            <div class="inner p-3" style="height: 6rem;">
                                <h4 class="text-light font-weight-bold">Users</h4> <!-- Título do card -->
                                <div class="icon img-container position-relative">
                                    <i class="fas fa-users position-absolute m-2" style="color: rgba(0, 0, 0, 0.1); font-size: 40px; top: -15px; right: 1%"></i> <!-- Ícone de usuários -->
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('random-users-data') }}" class="small-box-footer text-light text-decoration-none text-center d-block py-2 rounded-bottom"> <!-- Rodapé do card de destaque -->
                            Ir para <i class="fas fa-arrow-circle-right ml-1"></i> <!-- Ícone de seta para direita -->
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
