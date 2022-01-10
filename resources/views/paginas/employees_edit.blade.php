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
            <h1>Editar Empregado</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active"><a href="/employees-create">Editar empregado</a></li>
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
              
              <form id="quickForm" action="/employees-update-{{ $employees->id }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                  <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" value="{{$employees->nome}}">
                  </div>
                  <div class="form-group">
                    <label for="sobrenome">sobrenome</label>
                    <input type="text" name="sobrenome" class="form-control" id="sobrenome" placeholder="sobrenome" value="{{$employees->sobrenome}}">
                  </div>
                  <div class="form-group">
                    <label for="prontuario">prontuario</label>
                    <input type="text" name="prontuario" class="form-control" id="prontuario" placeholder="prontuario" value="{{$employees->prontuario}}">
                  </div>
                  <div class="form-group">
                    <label for="empresa">Empresa</label>
                    <input type="text" name="empresa" class="form-control" id="empresa" placeholder="empresa" value="{{$employees->empresa}}">
                  </div>
                  <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="email" value="{{$employees->email}}">
                  </div>
                  <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" class="form-control" id="telefone" placeholder="telefone" value="{{$employees->telefone}}">
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