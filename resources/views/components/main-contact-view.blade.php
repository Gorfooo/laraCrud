{{-- <script src="node_modules\vue\dist\vue.min.js"></script>
<script src=".\node_modules\vue-picture-input\umd\vue-picture-input.js"></script> --}}
<script src="https://unpkg.com/vue"></script> 
<script src="https://unpkg.com/vue-picture-input"></script>

@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-9">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form enctype="multipart/form-data" method="POST" action="{{url('Contacts/create')}}">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <small class="form-text text-muted mt-0">@lang('contacts.code'):</small>
                                </div>
                                <div class="col">
                                    <small class='form-text text-muted text-right'>@lang('contacts.registration_date'):</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <p>@lang('contacts.photo')</p>
                                        <div id="app">
                                            <picture-input 
                                              ref="pictureInput" 
                                              width="100" 
                                              height="100" 
                                              margin="16" 
                                              :plain="true"
                                              accept="image/jpeg,image/png" 
                                              size="10" 
                                              radius="50"
                                              :hide-change-button="true"
                                              :removable= "true"
                                              remove-Button-Class="btn btn-info text-white"
                                              prefill="img\default_user.png"
                                              :custom-strings="{
                                                remove: '@lang('contacts.remove')'
                                              }">
                                            </picture-input>
                                        </div>
                                </div>
                                <div class="col-7" style='height:6.5rem'>
                                    <label for="Obs">@lang('contacts.observation')</label>
                                    <textarea class="form-control h-100" maxlength="500"></textarea>
                                    <small class="form-text text-muted">@lang('contacts.limit_500_caracters')</small>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-9">
                                <label for="Nome">@lang('contacts.name')</label>
                                <input type="text" class="form-control" maxlength="50">
                            </div>
                            <div class="col-sm-3">
                                <label for="Cep">@lang('contacts.zip_code')</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm-7">
                                <label for="Logradouro">@lang('contacts.public_place')</label>
                                <input type="text" class="form-control" maxlength="50" readonly>
                            </div>
                            <div class="col-9 col-sm-3">
                                <label for="Numero">@lang('contacts.number')</label>
                                <input type="number" class="form-control">
                            </div>
                            <div class="col-3 col-sm-2">
                                <label for="UF">@lang('contacts.state')</label>
                                <input type="text" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm-5">
                                <label for="Cidade">@lang('contacts.city')</label>
                                <input type="text" class="form-control" readonly>
                            </div>
                            <div class="col-6 col-sm-4">
                                <label for="Telefone">@lang('contacts.phone')</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-6 col-sm-3">
                                <label for="Pais">@lang('contacts.country')</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label for="Complemento">@lang('contacts.complement')</label>
                                <input type="text" class="form-control" maxlength="50">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-right">
                                <a href="{{ route('/cancel')}}" class="btn btn-danger">@lang('contacts.cancel')</a>
                                <a href="route('{{$route}}')" class="btn btn-success">@lang('contacts.save')</a>
                            </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // import Vue from 'vue'

    var app = new Vue({
        el: '#app',
        components: {
          'picture-input': PictureInput
        }
    })
</script> 
@endsection