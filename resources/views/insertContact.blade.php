@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.60/inputmask/jquery.inputmask.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>

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
                                    <div class='mt-2'>
                                        <input type="file" accept="image/*" id='filepond' name='filepond' class='filepond'/>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <label>@lang('contacts.observation')</label>
                                    <textarea class="form-control @error('observation')
                                        is-invalid
                                    @enderror" name="observation" maxlength="500" style='height:11rem'>{{old('observation')}}</textarea>
                                    @error('observation')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    <small class="form-text text-muted">@lang('contacts.limit_500_caracters')</small>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-9">
                                <label>@lang('contacts.name')</label>
                                <input type="text" name="name" class="form-control @error('name')
                                    is-invalid
                                @enderror" value="{{old('name')}}" maxlength="50">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <label>@lang('contacts.zip_code')</label>
                                <input type="text" id='zip_code' name="zip_code" class="form-control @error('zip_code')
                                    is-invalid
                                @enderror" value="{{old('zip_code')}}" autocomplete="nope">
                                @error('zip_code')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm-7">
                                <label>@lang('contacts.public_place')</label>
                                <input type="text" id='public_place' name="public_place" class="form-control @error('public_place')
                                    is-invalid
                                @enderror" value="{{old('public_place')}}" maxlength="50" readonly>
                                @error('public_place')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-9 col-sm-3">
                                <label>@lang('contacts.number')</label>
                                <input type="number" name="number" class="form-control @error('number')
                                    is-invalid
                                @enderror" value="{{old('number')}}" maxlength="6" oninput="maxLengthCheck(this)">
                                @error('number')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-3 col-sm-2">
                                <label>@lang('contacts.state')</label>
                                <input type="text" id='state' name="state" class="form-control @error('state')
                                    is-invalid
                                @enderror" value="{{old('state')}}" readonly>
                                @error('state')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm-5">
                                <label>@lang('contacts.city')</label>
                                <input type="text" id='city' name="city" class="form-control @error('city')
                                    is-invalid
                                @enderror" value="{{old('city')}}" readonly>
                                @error('city')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-6 col-sm-4">
                                <label>@lang('contacts.phone')</label>
                                <input type="text" name="phone_number" id='phone_number' class="form-control @error('phone_number')
                                    is-invalid
                                @enderror" value="{{old('phone_number')}}">
                                @error('phone_number')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-6 col-sm-3">
                                <label>@lang('contacts.country')</label>
                                <input type="text" name="country" maxlength="50" class="form-control @error('country')
                                    is-invalid
                                @enderror" value="{{old('country')}}">
                                @error('country')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label>@lang('contacts.complement')</label>
                                <input type="text" id='complement' name="complement" class="form-control @error('complement')
                                    is-invalid
                                @enderror" value="{{old('complement')}}" maxlength="50">
                                @error('complement')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-right">
                                <a href="{{route('contacts.cancel')}}" class="btn btn-danger">@lang('contacts.cancel')</a>
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

    FilePond.registerPlugin(
        FilePondPluginFileValidateType,
        FilePondPluginImagePreview
    );

    FilePond.create(
        document.querySelector('input[type="file"]'),
        {
            labelIdle: `Clique aqui para adicionar uma foto`,
            stylePanelLayout: 'compact circle',
            styleButtonProcessItemPosition: 'center bottom'
        }
    );

    FilePond.setOptions({
        server: {
            url: '/contacts/upload',
            revert:'/revert',
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        }
    });

    $j("#phone_number").inputmask("+55 (99) 999999999");
    $j("#zip_code").inputmask("99999-999")
    
    function maxLengthCheck(object)
    {
        if (object.value.length > object.maxLength)
        object.value = object.value.slice(0, object.maxLength)
    }

    var lastCEP = '';
    $j('#zip_code').on('keyup focusout',function(){
        if(lastCEP != $j('#zip_code').val().replace('_','')&&
        $j('#zip_code').val().replace('_','').length == 9){
            getAddress();
        }
    });
    
    function validateRequest(event){
        if (event.keyCode == 13 && $j('#zip_code').val().replace('_','').length == 9 && 
        lastCEP != $j('#zip_code').val().replace('_','')){
            getAddress();
        }
    }
    
    function getAddress(event){
        lastCEP = $j('#zip_code').val().replace('_','');
        console.log('consultou');
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

    .filepond--root {
        width:170px;
        margin: 0 auto;
    }
</style>
@endsection