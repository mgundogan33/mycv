@extends('layouts.admin')
@section('title')
    Kişisel Bilgiler
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/ckeditor/samples/css/samples.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css') }}">
        <style>
            .swal2-container.swal2-center>.swal2-popup {
                display: grid !important;
            }

        </style>
@endsection
@section('content')
    <div class="page-header">
        <h3 class="page-title">Kişisel Bilgiler</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin Panel</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kişisel Bilgiler Düzenleme</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">

                    <a href="{{ route('personal_add') }}" class="btn btn-primary btn-rounded btn-fw mt-2 mb-3">
                        Cv Ekle
                    </a>
                    @if (!empty($information[0]))
                        <div class="table-responsive">
                            <table class="table table-bordered table-contextual">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> İsim Soyisim </th>
                                        <th> image </th>
                                        <th> cv </th>
                                        <th> Oluşturma Tarihi </th>
                                        <th>İşlem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($information as $cv)

                                    <tr class="table-info">
                                        <td> {{ $cv->id }}</td>
                                        <td> {{ $cv->full_name }}</td>
                                        <td align="center"> <img src="{{ asset('storage/image/' . $cv->image) }}" class="img-responsive" /></td>
                                        <td> {{ $cv->cv }}</td>

                                        <td> {{ $cv->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('personal_edit', $cv->id) }}"
                                                class="btn btn-warning editEducation">Düzenle <i
                                                    class="fa fa-edit"></i></a>
                                            <a onclick="event.preventDefault();document.getElementById('sil_{{ $cv->id }}').submit()"
                                                href="javascript:void(0)" class="btn btn-danger deleteEducation">Sil <i
                                                    class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <form id='sil_{{ $cv->id }}' method="POST"
                                action="{{ route('personal_delete', $cv->id) }}">
                                @csrf
                                @method('DELETE')
                            </form>
                            {{ $information->links() }}
                        </div>
                    @else
                        <div class="alert alert-info"> Şuan Kişisel bilginiz Bulunmamaktadır...</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
