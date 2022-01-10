@extends('layout.main')
@section('title', 'Empresas')
@section('contents')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Empresas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active"><a href="/companies">Empresas</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul class="nav">
                    <li class="nav-item">{{ \Session::get('success') }}</li>
                </ul>
            </div>
        @endif
        @if (\Session::has('error'))
            <div class="alert alert-danger">
                <ul class="nav">
                    <li class="nav-item">{{ \Session::get('error') }}</li>
                </ul>
            </div>
        @endif
        <div class="card-body">
          <div class="card">
            <div class="card-header">
              <div class="card-tools">
                <div>
                  {{ $companies->links() }}
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table id="example1" class="table">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Logotipo</th>
                    <th>website</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($companies as $company)
                    <tr>
                      <td>{{$company->id}}</td>
                      <td>{{$company->nome}}</td>
                      <td>{{$company->endereco}}</td>
                      <td>
                        <img src="{{ asset('../storage/logotipos/'.$company->logotipo) }}" alt="{{$company->name}}" style="max-width: 50px";>
                      </td>
                      <td>{{$company->website}}</td>
                      <td>
                        <div>
                          <span>
                            <a href="/companies-edit-{{$company->id}}" class="text-success">
                              <i class="far fa-edit"></i>
                            </a>
                          </span>
                          <span>
                            <a href="{{ route('companies.destroy', $company->id) }}" class="text-danger">
                              <i class="far fa-trash-alt"></i>
                            </a>
                          </span>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="btn btn-success">
            <a href="/companies-create" class="text-white">Criar nova empresa</a>
          </div>
        </div>
        <!-- /.card-body -->
        
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection