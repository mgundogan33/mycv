@extends('layouts.admin')
@section('title')
Eğitim Bilgileri Listesi
@endsection
@section('css')
@endsection
@section('content')

<div class="page-header">
    <h3 class="page-title"> Eğitim Bilgileri Listesi </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Admin Panel</a></li>
        <li class="breadcrumb-item active" aria-current="page">Eğitim Bilgileri Listesi</li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
          <div class="card-header">
              <div class="row">
                  <div class="col-md-4">
                    <a href="{{route('admin.education.add')}}" class="btn btn-primary btn-block">Yeni Eğitim Ekle</a>
                  </div>
              </div>
          </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Eğitim Tarihi</th>
                  <th>Bölüm</th>
                  <th>Üniversite</th>
                  <th>Açıklama</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js')
@endsection
