@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-9">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <small class="form-text text-muted mt-0">Código:</small>
                                </div>
                                <div class="col">
                                    <label for="Data" class='form-text text-muted text-right'>Data de cadastro:</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <p>Foto</p>
                                </div>
                                <div class="col-7">
                                    <label for="Obs">Observações</label>
                                    <textarea class="form-control"></textarea>
                                    <small class="form-text text-muted">Limite de 500 caracteres</small>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-9">
                                <label for="Nome">Nome</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-3">
                                <label for="Cep">Cep</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-7">
                                <label for="Logradouro">Logradouro</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-3">
                                <label for="Numero">Número</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-2">
                                <label for="UF">UF</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-5">
                                <label for="Cidade">Cidade</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-4">
                                <label for="Telefone">Telefone</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-3">
                                <label for="Pais">País</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label for="Complemento">Complemento</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection