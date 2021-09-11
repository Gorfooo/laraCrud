@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('Contacts/create') }}" class='btn bg-success text-white mb-2'>@lang('contacts.register')</a>

                    <div class="table-responsive">
                      <table class="table table-striped">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">@lang('contacts.image')</th>
                              <th scope="col">@lang('contacts.name')</th>
                              <th scope="col">@lang('contacts.address')</th>
                              <th scope="col"></th>
                              <th scope="col"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">1</th>
                                <td class='align-middle'>Markasd</td>
                                <td class='align-middle'>Ottoasdasdasdasdasda</td>
                                <td class='align-middle'>Concórdia SC, bairro Itaíba, 154</td>
                                <td>
                                  <a href='{{ route('Contacts/edit') }}' class='btn bg-primary text-white'>@lang('contacts.edit')</a>
                                </td>
                                <td>
                                  <a href='#' class='btn bg-danger text-white'>@lang('contacts.remove')</a>
                                </td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
