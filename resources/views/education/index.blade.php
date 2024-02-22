@extends('layouts.app')
@section("content")
  @include('components.breadcrumb', ['active' => __('main.education_center')])
  <style>
    .border-left-primary {
      /*max-width: 250px;*/
      max-height: 250px;
      border-left: 3px solid #007bff;
    }
    .educations img {
      max-height: 180px;
      object-fit: contain;
    }
  </style>

<div class="educations">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title">{{ __('main.manage_course') }}</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>

    <div class="card-body">
      <div class="row">
        <div class="col-2">
          <div class="card border-left-primary">
            <div class="card-body">
              <a href="#">
                <img class="card-img-top" src="{{ asset('assets/images/department.jpg') }}" alt="{{ __('Department') }}">
              </a>
            </div>
            <div class="card-footer text-center">
              <a href="#" class="font-weight-bold text-gray-800 text-uppercase">
                {{ __('main.departments') }}
              </a>
            </div>
          </div>
        </div>

        <div class="col-2">
          <div class="card border-left-primary">
            <div class="card-body">
              <a href="#">
                <img class="card-img-top" src="{{ asset('assets/images/course.jpg') }}" alt="{{ __('Course') }}">
              </a>
            </div>
            <div class="card-footer text-center">
              <a href="#" class="font-weight-bold text-gray-800 text-uppercase">
                {{ __('main.course') }}
              </a>
            </div>
          </div>
        </div>

        <div class="col-2">
          <div class="card border-left-primary">
            <div class="card-body">
              <a href="#">
                <img class="card-img-top" src="{{ asset('assets/images/term.jpg') }}" alt="{{ __('terms') }}">
              </a>
            </div>
            <div class="card-footer text-center">
              <a href="#" class="font-weight-bold text-gray-800 text-uppercase">
                {{ __('main.terms') }}
              </a>
            </div>
          </div>
        </div>

        <div class="col-2">
          <div class="card border-left-primary">
            <div class="card-body">
              <a href="#">
                <img class="card-img-top" src="{{ asset('assets/images/session.jpg') }}" alt="{{ __('Sessions') }}">
              </a>
            </div>
            <div class="card-footer text-center">
              <a href="#" class="font-weight-bold text-gray-800 text-uppercase">
                {{ __('main.sessions') }}
              </a>
            </div>
          </div>
        </div>


      </div>
    </div>

  </div>



  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title">{{ __('main.manage_assessment') }}</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>

    </div>

    <div class="card-body">
      <div class="row">
        <div class="col-2">
          <div class="card border-left-primary">
            <div class="card-body">
              <a href="#">
                <img class="card-img-top" src="{{ asset('assets/images/quiz.png') }}" alt="{{ __('Quiz') }}">
              </a>
            </div>
            <div class="card-footer text-center">
              <a href="#" class="font-weight-bold text-gray-800 text-uppercase">
                {{ __('main.quizzes') }}
              </a>
            </div>
          </div>
        </div>

        <div class="col-2">
          <div class="card border-left-primary">
            <div class="card-body">
              <a href="#">
                <img class="card-img-top" src="{{ asset('assets/images/question.png') }}" alt="{{ __('Question') }}">
              </a>
            </div>
            <div class="card-footer text-center">
              <a href="#" class="font-weight-bold text-gray-800 text-uppercase">
                {{ __('main.questions') }}
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>


  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title">{{ __('main.manage_plugins') }}</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>

    </div>

    <div class="card-body">
      <div class="row">
        @can('rubric.index')
          <div class="col-2">
            <div class="card">
              <div class="card-body">
                <a href="#">
                  <img class="card-img-top img-circle" src="{{ asset('assets/images/rubric.png') }}" alt="{{ __('rubric') }}">
                </a>
              </div>
              <div class="card-footer text-center">
                <a href="#" class="font-weight-bold text-gray-800 text-uppercase">
                  {{ __('main.rubric') }}
                </a>
              </div>

            </div>

          </div>
        @endcan

        @can('feedback.index')
          <div class="col-2">

            <div class="card">
              <div class="card-body">
                <a href="#">
                  <img class="card-img-top img-circle" src="{{ asset('assets/images/feedback.png') }}" alt="{{ __('feedback') }}">
                </a>
              </div>
              <div class="card-footer text-center">
                <a href="#" class="font-weight-bold text-gray-800 text-uppercase">
                  {{ __('main.feedback') }}
                </a>
              </div>

            </div>
          </div>
        @endcan
        @can('file.index')
          <div class="col-2">

            <div class="card">
              <div class="card-body">
                <a href="#">
                  <img class="card-img-top img-circle" src="{{ asset('assets/images/file.png') }}" alt="{{ __('file') }}">
                </a>
              </div>
              <div class="card-footer text-center">
                <a href="#" class="font-weight-bold text-gray-800 text-uppercase">
                  {{ __('main.files') }}
                </a>
              </div>
            </div>

          </div>
        @endcan

        @can('document.index')
          <div class="col-2">

            <div class="card">
              <div class="card-body">
                <a href="#">
                  <img class="card-img-top img-circle" src="{{ asset('assets/images/document.png') }}" alt="{{ __('Document') }}">
                </a>
              </div>
              <div class="card-footer text-center">
                <a href="#" class="font-weight-bold text-gray-800 text-uppercase">
                  {{ __('main.documents') }}
                </a>
              </div>
            </div>

          </div>
        @endcan


        @can('badges.index')
          <div class="col-2">

            <div class="card">
              <div class="card-body">

                <a href="#">
                  <img class="card-img-top img-circle" src="{{ asset('assets/images/badge.png') }}" alt="{{ __('badges') }}">
                </a>

              </div>
              <div class="card-footer text-center">
                <a href="#" class="font-weight-bold text-gray-800 text-uppercase">
                  {{ __('main.badges') }}
                </a>
              </div>
            </div>

          </div>
        @endcan
      </div>
    </div>

  </div>
</div>

@endsection
