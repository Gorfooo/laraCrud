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

                    <div class="row form-inline">
                        <div class="col mb-2">
                            <form action="{{route('contacts.search')}}">
                                <a href="{{ route('contacts.create') }}" class='btn bg-success text-white'>@lang('contacts.register')</a>
                                <button type="submit" class="btn btn-outline-success float-right" type="submit">@lang('contacts.search')</button>
                                <input class="form-control float-right mr-2" name='search' type="search" 
                                placeholder="@lang('contacts.search')" aria-label="Search" @isset($parameters)
                                value="{{$parameters['search']}}"
                                @endisset>
                            </form>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">@lang('contacts.image')</th>
                                    <th scope="col">@lang('contacts.name')</th>
                                    <th scope="col">@lang('contacts.address')</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                <tr>
                                    <th class='align-middle'>{{$contact->id}}</th>
                                    <td class='align-middle'><img src="{{asset("$contact->photo_path")}}" 
                                        class='rounded-circle' style='width:3.5rem; height:3.5rem'></td>
                                    <td class='align-middle'>{{$contact->name}}</td>
                                    <td class='align-middle'>{{$contact->city}}, {{$contact->public_place}}, {{$contact->number}}</td>
                                    <td class='align-middle'>
                                        <a href='{{ route('contacts.edit',['contact' => $contact->id]) }}'
                                            class='btn bg-primary text-white'>@lang('contacts.edit')</a>
                                    </td>
                                    <td class='align-middle'>
                                        <a href='{{route('contacts.destroy',['contact' => $contact->id])}}' class='btn bg-danger text-white'>@lang('contacts.remove')</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$contacts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
