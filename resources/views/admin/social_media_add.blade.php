@extends('layouts.admin')
@section('title')
    @php
    if ($socialMedia) {
        $socialMediaText = 'Sosyal Medya Hesabı Düzenleme';
    } else {
        $socialMediaText = 'Sosyal Medya Hesabı Ekleme';
    }
    @endphp
    {{$socialMediaText}}
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
        <h3 class="page-title">{{ $socialMediaText }}</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin Panel</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.socialMedia.list') }}">Sosyal Medya Hesaplarınız</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $socialMediaText }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" id="createsocialMediaForm" method="POST" action="">
                        @csrf
                        @if ($socialMedia)
                            <input type="hidden" name="socialMedia" value="{{ $socialMedia->id }}">
                        @endif
                        <div class="form-group">
                            <label for="name">Ad</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Ad"
                                value="{{ $socialMedia ? $socialMedia->name : '' }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" class="form-control" name="link" id="link" placeholder="Link"
                                value="{{ $socialMedia ? $socialMedia->link : '' }}">
                            @error('link')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="order">Görüntülencek Sosyal Medya Hesap Sırası</label>
                            <input type="text" class="form-control" name="order" id="order"
                                placeholder="Görüntülencek Sosyal Medya Hesap Sırası"
                                value="{{ $socialMedia ? $socialMedia->order : '' }}">
                            @error('order')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="icon">Sosyal Medya İconu</label>
                            <input type="text" class="form-control" name="icon" id="icon" placeholder="Sıralama"
                                value="{{ $socialMedia ? $socialMedia->icon : '' }}">
                            <small><a href="https://fontawesome.com/icons?d=gallery&s=brands"
                                    target="_blank">Kullanabileceğiniz Sosyal Medya İconları</a> </small>
                            @error('icon')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-primary">
                                <label class="form-check-label" for="status">
                                    @php
                                        if ($socialMedia) {
                                            $checkStatus = $socialMedia->status ? 'checked' : '';
                                        } else {
                                            $checkStatus = '';
                                        }
                                    @endphp
                                    <input type="checkbox" name="status" id="status" class="form-check-input"
                                        {{ $checkStatus }}>
                                    Hesabın Anasaydafa Gösterilme Durumu</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-2" id="createButton">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
