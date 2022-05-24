@extends('layouts.admin')
@section('title')
    Yeni Eğitim Ekleme
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
        <h3 class="page-title">Yeni Eğitim Ekleme </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin Panel</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.education.list') }}">Eğitim Bilgileri Listesi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Yeni Eğitim Ekleme</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" id="createEducationForm" method="POST" action="">
                        @csrf
                        <div class="form-group">
                            <label for="education_date">Eğitim Tarih</label>
                            <input type="text" class="form-control" name="education_date" id="education_date"
                                placeholder="Eğitim Tarihi">
                            <small>Örneğin: 2012 - 2017</small>
                            @error('education_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="university_name">Üniversite Adı</label>
                            <input type="text" class="form-control" name="university_name" id="university_name"
                                placeholder="Üniversite Adı">
                            @error('university_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="university_branch">Üniversite Bölümü</label>
                            <input type="text" class="form-control" name="university_branch" id="university_branch"
                                placeholder="Üniversite Bölümü">
                            @error('university_branch')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Açıklama</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10"
                                placeholder="Açıklama"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-primary">
                                <label class="form-check-label" for="status">
                                    <input type="checkbox" name="status" id="status" class="form-check-input">
                                    Eğitim Anasaydafa Gösterilme Durumu</label>
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

            if ($('#education_date').val().trim() == '') {
                Swal.fire({
                    icon: 'info',
                    title: 'Uyarı !',
                    text: 'Lütfen Eğitim Tarihini Kontrol Edin.',
                    confirmButtonText: 'Tamam'
                });
            } else if ($('#university_name').val().trim() == '') {
                Swal.fire({
                    icon: 'info',
                    title: 'Uyarı !',
                    text: 'Lütfen Üniversite Adını Kontrol Edin.',
                    confirmButtonText: 'Tamam'
                });
            } else if ($('#university_branch').val().trim() == '') {
                Swal.fire({
                    icon: 'info',
                    title: 'Uyarı !',
                    text: 'Lütfen Üniversite Bölümünü Kontrol Edin.',
                    confirmButtonText: 'Tamam'
                });
            } else {
                $('#createEducationForm').submit();
            }
        });
    </script>
@endsection
