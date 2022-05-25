@extends('layouts.admin')
@php
if ($experience) {
    $experienceText = 'Deneyim Düzenleme';
} else {
    $experienceText = 'Yeni Deneyim Ekleme';
}
@endphp

@section('title')
    {{ $experienceText }}
@endsection
@section('css')
    <style>
        .swal2-container.swal2-center>.swal2-popup {
            display: grid !important;
        }

    </style>
@endsection
@section('content')
    <div class="page-header">
        <h3 class="page-title">{{ $experienceText }}</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin Panel</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.experience.list') }}">Deneyim Bilgileri Listesi</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $experienceText }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" id="createExperienceForm" method="POST" action="">
                        @csrf
                        @if ($experience)
                            <input type="hidden" name="educationID" value="{{ $experience->id }}">
                        @endif
                        <div class="form-group">
                            <label for="date">Çalışma Tarihi</label>
                            <input type="text" class="form-control" name="date" id="date" placeholder="Çalışma Tarihi"
                                value="{{ $experience ? $experience->date : '' }}">
                            <small>Örneğin: 2012 - 2017</small>
                            @error('date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="task_name">Çalıştığınız Pozisyon</label>
                            <input type="text" class="form-control" name="task_name" id="task_name"
                                placeholder="Çalıştığınız Pozisyon"
                                value="{{ $experience ? $experience->task_name : '' }}">
                            @error('task_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="company_name">Çalıştığınız Firma</label>
                            <input type="text" class="form-control" name="company_name" id="company_name"
                                placeholder="Çalıştığınız Firma"
                                value="{{ $experience ? $experience->company_name : '' }}">
                            @error('company_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Açıklama</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10"
                                placeholder="Açıklama">{{ $experience ? $experience->description : '' }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="order">Görüntülünecek Deneyim Sırası</label>
                            <input type="text" class="form-control" name="order" id="order"
                                placeholder="Görüntülünecek Deneyim Sırası"
                                value="{{ $experience ? $experience->order : '' }}">
                            @error('order')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-check form-check-primary">
                                <label class="form-check-label" for="status">
                                    @php
                                        if ($experience) {
                                            $checkStatus = $experience->status ? 'checked' : '';
                                        } else {
                                            $checkStatus = '';
                                        }
                                    @endphp
                                    <input type="checkbox" name="status" id="status" class="form-check-input"
                                        {{ $checkStatus }}>
                                    Deneyim Anasaydafa Gösterilme Durumu</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-primary">
                                <label class="form-check-label" for="active">
                                    @php
                                        if ($experience) {
                                            $checkActive = $experience->active ? 'checked' : '';
                                        } else {
                                            $checkActive = '';
                                        }
                                    @endphp
                                    <input type="checkbox" name="active" id="active" class="form-check-input"
                                        {{ $checkActive }}>
                                    İlgili Pozisyonda Çalışmaya Devam Ediyormusunuz ?</label>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary me-2" id="createButton">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        let createButton = $('#createButton');
        createButton.click(function() {

            if ($('#date').val().trim() == '') {
                Swal.fire({
                    icon: 'info',
                    title: 'Uyarı !',
                    text: 'Lütfen Çalışma Tarihini Kontrol Edin.',
                    confirmButtonText: 'Tamam'
                });
            } else if ($('#task_name').val().trim() == '') {
                Swal.fire({
                    icon: 'info',
                    title: 'Uyarı !',
                    text: 'Lütfen Çalıştığınız Pozisyon Bilgisini Kontrol Edin.',
                    confirmButtonText: 'Tamam'
                });
            } else if ($('#company_name').val().trim() == '') {
                Swal.fire({
                    icon: 'info',
                    title: 'Uyarı !',
                    text: 'Lütfen Çalıştığınız Firma Bilgisini Kontrol Edin.',
                    confirmButtonText: 'Tamam'
                });
            } else {
                $('#createExperienceForm').submit();
            }
        });
    </script>
@endsection
