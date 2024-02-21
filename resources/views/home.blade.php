@extends('layouts.app')
@section('breadcrumb')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{ __('main.home') }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('main.home') }}</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('content')
  <style>
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
      background: #41474d;
      color: #fff;
    }
    .nav-tabs .nav-link {
      background: none;
      border: none;
      border-radius: 0;
    }
  </style>

  <section>
    <h4 class="d-block">Kunduzgi</h4>
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>150 / 500</h3>

            <p>Abituriyentlar tolgan / jami</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-graduate"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>500 E / 450 A</h3>

            <p>Jami talabalar</p>
          </div>
          <div class="icon">
            <i class="fas fa-restroom"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>44 ta</h3>

            <p>Qarzdorlar</p>
          </div>
          <div class="icon">
            <i class="fas fa-hand-holding-usd"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>6.500.000 so'm</h3>

            <p>Qarzdorlik</p>
          </div>
          <div class="icon">
            <i class="fas fa-money-bill-alt"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <h4 class="d-block">Kechki</h4>
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>0 / 0</h3>

            <p>Abituriyentlar tolgan / jami</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-graduate"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>53 E / 97 A</h3>

            <p>Jami talabalar</p>
          </div>
          <div class="icon">
            <i class="fas fa-restroom"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>12</h3>

            <p>Qarzdorlar</p>
          </div>
          <div class="icon">
            <i class="fas fa-hand-holding-usd"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>3.750.000 so'm</h3>

            <p>Qarzdorlik</p>
          </div>
          <div class="icon">
            <i class="fas fa-money-bill-alt"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <div class="row">
      <div class="col-12">
        <nav class="bg-white p-3 mb-3">
          <div class="nav nav-tabs justify-content-between" id="nav-tab" role="tablist">
            <button class="nav-link flex-grow-1 active" id="nav-custom1-tab" data-bs-toggle="tab" data-bs-target="#nav-custom1" type="button" role="tab" aria-controls="nav-custom1" aria-selected="true">
              Qabul №13
            </button>
            <button class="nav-link flex-grow-1" id="nav-custom2-tab" data-bs-toggle="tab" data-bs-target="#nav-custom2" type="button" role="tab" aria-controls="nav-custom2" aria-selected="false">
              Talabalar fakultetlar kesimida
            </button>
            <button class="nav-link flex-grow-1" id="nav-custom3-tab" data-bs-toggle="tab" data-bs-target="#nav-custom3" type="button" role="tab" aria-controls="nav-custom3" aria-selected="false">
              Talabalar guruxlar kesimida
            </button>
            <button class="nav-link flex-grow-1" id="nav-custom4-tab" data-bs-toggle="tab" data-bs-target="#nav-custom4" type="button" role="tab" aria-controls="nav-custom4" aria-selected="false">
              Talabalar holati
            </button>
            <button class="nav-link flex-grow-1" id="nav-custom5-tab" data-bs-toggle="tab" data-bs-target="#nav-custom5" type="button" role="tab" aria-controls="nav-custom5" aria-selected="false">
              Qarzdorlik fakultet kesimida
            </button>
            <button class="nav-link flex-grow-1" id="nav-custom6-tab" data-bs-toggle="tab" data-bs-target="#nav-custom6" type="button" role="tab" aria-controls="nav-custom6" aria-selected="false">
              Qarzdorlik guruxlar kesimida
            </button>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-custom1" role="tabpanel" aria-labelledby="nav-custom1-tab">
            <div class="row">
              <div class="col-4">
                <div class="card h-100">
                  <div class="card-header">
                    <h4>Qabul</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                        <tr>
                          <th>Qabul</th>
                          <th>To'langan</th>
                          <th>Tasdiqlangan</th>
                          <th>Payme</th>
                          <th>To'ldirilmagan</th>
                          <th>Jami</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td>Sirtqi</td>
                          <td>100</td>
                          <td>80</td>
                          <td>33</td>
                          <td>14</td>
                          <td>157</td>
                        </tr>
                        <tr>
                          <td>Kunduzgi</td>
                          <td>100</td>
                          <td>80</td>
                          <td>33</td>
                          <td>14</td>
                          <td>157</td>
                        </tr>
                        <tr>
                          <td>Kunduzgi</td>
                          <td>100</td>
                          <td>80</td>
                          <td>33</td>
                          <td>14</td>
                          <td>157</td>
                        </tr>
                        <tr>
                          <td>Sirtqi</td>
                          <td>100</td>
                          <td>80</td>
                          <td>33</td>
                          <td>14</td>
                          <td>157</td>
                        </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="card h-100">
                  <div class="card-header">
                    <h4>Qabul Payme orqali</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                        <tr>
                          <th>Status</th>
                          <th>Soni</th>
                          <th>Summasi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td>To'langan</td>
                          <td>62</td>
                          <td>9.000.000</td>
                        </tr>
                        <tr>
                          <td>Jarayonda</td>
                          <td>19</td>
                          <td>6.500.000</td>
                        </tr>
                        <tr>
                          <td>Bekor qilingan</td>
                          <td>9</td>
                          <td>34000.000</td>
                        </tr>
                        </tbody>
                      </table>
                    </div>
                    <button class="btn btn-primary float-right">Yangilash</button>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="card h-100">
                  <div class="card-header">
                    <h4>Biz haqimizda qayerdan bildingiz</h4>
                  </div>
                  <div class="card-body">
                    <img src="{{ asset('assets/fake/chart1.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-custom2" role="tabpanel" aria-labelledby="nav-custom2-tab">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Talabalar fakultetlar kesimida</h4>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-center">
                      <img src="{{ asset('assets/fake/chart2.png') }}" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-custom3" role="tabpanel" aria-labelledby="nav-custom3-tab">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Talabalar guruxlar kesimida</h4>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-center">
                      <img src="{{ asset('assets/fake/chart2.png') }}" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-custom4" role="tabpanel" aria-labelledby="nav-custom4-tab">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Talabalar xolatlari kesimida</h4>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-center">
                      <img src="{{ asset('assets/fake/chart3.png') }}" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-custom5" role="tabpanel" aria-labelledby="nav-custom5-tab">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Qarzdorlik fakultetlar kesimida</h4>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-center">
                      <img src="{{ asset('assets/fake/chart4.png') }}" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-custom6" role="tabpanel" aria-labelledby="nav-custom6-tab">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Qarzdorlik guruxlar kesimida</h4>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-center">
                      <img src="{{ asset('assets/fake/chart5.png') }}" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
