@extends('layout.main')
@section('title', 'Nova empresa')
@section('contents')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Empresa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active"><a href="/companies-create">Editar empresa</a></li>
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
        <div class="card-body">
          <div class="card">
            <!-- jquery validation -->
            <div class="card card-primary">
              <!-- form start -->
              
              <form id="quickForm" action="/companies-update-{{ $company->id }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                  <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" value="{{$company->nome}}">
                  </div>
                  <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input type="text" name="endereco" class="form-control" id="endereco" placeholder="Endereço" value="{{$company->endereco}}">
                  </div>
                  <div class="form-group">
                    <label for="logotipo">Logotipo</label>
                    <input type="file" name="logotipo" class="form-control" id="logotipo" placeholder="Logotipo" value="{{$company->logotipo}}">
                  </div>
                  <div class="form-group">
                    <label for="website">Website</label>
                    <input type="text" name="website" class="form-control" id="website" placeholder="website" value="{{$company->website}}">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Salvar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection