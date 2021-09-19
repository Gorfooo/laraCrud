<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.60/inputmask/jquery.inputmask.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-9">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form id='form' enctype="multipart/form-data" method="POST" action="{{route("contacts.store")}}">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-5">
                                    <label>@lang('contacts.photo')</label>
                                    <div class='text-center'>
                                        <img src="{{asset('img/default_user.png')}}" class='rounded-circle' id='imgDisplay' style='width:7rem; height:7rem'>
                                        <div class='mt-2'>
                                            <label class="custom-file-upload btn btn-primary">
                                                <input type="file" accept="image/*" id='inputImage' name='photo' style='display: none' 
                                                onchange="document.getElementById('imgDisplay').src = window.URL.createObjectURL(this.files[0])"/>
                                                @lang('contacts.include')
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-7" style='height:10rem'>
                                    <label>@lang('contacts.observation')</label>
                                    <textarea class="form-control" name="observation" maxlength="500" style='height:8rem'></textarea>
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
                                <input type="text" id='zip_code' name="zip_code" class="form-control" autocomplete="nope" onkeypress="validateRequest(event)">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm-7">
                                <label>@lang('contacts.public_place')</label>
                                <input type="text" id='public_place' name="public_place" class="form-control" maxlength="50" readonly>
                            </div>
                            <div class="col-9 col-sm-3">
                                <label>@lang('contacts.number')</label>
                                <input type="number" name="number" class="form-control" maxlength="6" oninput="maxLengthCheck(this)">
                            </div>
                            <div class="col-3 col-sm-2">
                                <label>@lang('contacts.state')</label>
                                <input type="text" id='state' name="state" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm-5">
                                <label>@lang('contacts.city')</label>
                                <input type="text" id='city' name="city" class="form-control" readonly>
                            </div>
                            <div class="col-6 col-sm-4">
                                <label>@lang('contacts.phone')</label>
                                <input type="text" name="phone_number" class="form-control">
                            </div>
                            <div class="col-6 col-sm-3">
                                <label>@lang('contacts.country')</label>
                                <input type="text" name="country" maxlength="50" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label>@lang('contacts.complement')</label>
                                <input type="text" id='complement' name="complement" class="form-control" maxlength="50">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-right">
                                <a href="{{route('/cancel')}}" class="btn btn-danger">@lang('contacts.cancel')</a>
                                <button type='button' class="btn btn-success" id='send'>@lang('contacts.save')</button>
                            </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $j=jQuery.noConflict();

    $j(document).ready(function () {
        $j("#phone").inputmask("+55 (99) 999999999");
        $j("#zip_code").inputmask("99999-999")
    });
    
function maxLengthCheck(object)
{
    if (object.value.length > object.maxLength)
      object.value = object.value.slice(0, object.maxLength)
}

$j('#zip_code').on('focusout',function(){
    var formatted_zip_code = $j('#zip_code').val().replace('_','');
    if (formatted_zip_code.length == 9){
        getAddress();
    }
});

function validateRequest(event){
    var formatted_zip_code = $j('#zip_code').val().replace('_','');
    if (event.keyCode == 13 && formatted_zip_code.length == 9){
        getAddress();
    }
}

function getAddress(event){
    axios.get('https://viacep.com.br/ws/'+$j('#zip_code').val()+'/json/')
  .then(function (response) {
    $j('#public_place').val(response.data.logradouro);
    $j('#city').val(response.data.localidade);
    $j('#state').val(response.data.uf);
  })
  .catch(function (error) {
    console.log(error);
  })
}

$j('#send').on('click',function(){
    $j('#form').submit();
});
</script>

<style>
    input[type=number]::-webkit-inner-spin-button { 
        -webkit-appearance: none !important;
        display: none !important;
    }
</style>
@endsection