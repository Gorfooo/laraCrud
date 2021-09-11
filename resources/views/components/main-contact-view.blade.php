{{-- <script src="node_modules\vue\dist\vue.min.js"></script> --}}
<script src="https://unpkg.com/vue"></script> 
{{-- <script src="{{mix('/js/app.js')}}"></script> --}}
{{-- <script src="node_modules\vue-picture-input\umd\vue-picture-input.js"></script> --}}
<script src="https://unpkg.com/vue-picture-input"></script>

@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-9">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form enctype="multipart/form-data" method="POST" action="{{route("$route")}}">
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
                                        <div id="app"></div>
                                        {{-- <picture-input 
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
                                            </picture-input> --}}
                                </div>
                                <div class="col-7" style='height:6.5rem'>
                                    <label>@lang('contacts.observation')</label>
                                    <textarea class="form-control h-100" name="observation" maxlength="500"></textarea>
                                    <small class="form-text text-muted">@lang('contacts.limit_500_caracters')</small>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-9">
                                <label>@lang('contacts.name')</label>
                                <input type="text" name="name" class="form-control" maxlength="50">
                            </div>
                            <div class="col-sm-3">
                                <label>@lang('contacts.zip_code')</label>
                                <input type="text" name="zip_code" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm-7">
                                <label>@lang('contacts.public_place')</label>
                                <input type="text" name="public_place" class="form-control" maxlength="50" readonly>
                            </div>
                            <div class="col-9 col-sm-3">
                                <label>@lang('contacts.number')</label>
                                <input type="number" name="number" class="form-control">
                            </div>
                            <div class="col-3 col-sm-2">
                                <label>@lang('contacts.state')</label>
                                <input type="text" name="state" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm-5">
                                <label>@lang('contacts.city')</label>
                                <input type="text" name="city" class="form-control" readonly>
                            </div>
                            <div class="col-6 col-sm-4">
                                <label>@lang('contacts.phone')</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                            <div class="col-6 col-sm-3">
                                <label>@lang('contacts.country')</label>
                                <input type="text" name="country" maxlength="50" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label>@lang('contacts.complement')</label>
                                <input type="text" name="complement" class="form-control" maxlength="50">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-right">
                                <a href="{{route('/cancel')}}" class="btn btn-danger">@lang('contacts.cancel')</a>
                                <button type='submit' class="btn btn-success">@lang('contacts.save')</button>
                            </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection