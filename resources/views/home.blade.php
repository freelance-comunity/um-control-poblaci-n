@extends('layouts.master-app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">UNIVERSIDAD MAYA</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bienvenido de nuevo {{Auth::user()->name}}
                </div>
            </div>
        </div>
    </div>
</div>
<!--Población por carreras -->
<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="pmd-card pmd-z-depth todos">
    <div class="pmd-card-title">
      <div class="media-left">
        <span class="service-icon img-circle bg-fill-feedback">
      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="31.999px" height="30.769px" viewBox="281.642 394.113 31.999 30.769" enable-background="new 281.642 394.113 31.999 30.769" xml:space="preserve">
        <g>
          <path fill="#FFFFFF" d="M290.526,394.574l-4.218,5.273l-2.753-1.835c-0.567-0.379-1.331-0.224-1.707,0.341
          s-0.224,1.331,0.341,1.707l3.692,2.461c0.209,0.139,0.447,0.207,0.683,0.207c0.362,0,0.72-0.16,0.961-0.462l4.923-6.154
          c0.425-0.53,0.338-1.306-0.192-1.729C291.726,393.958,290.951,394.044,290.526,394.574z"/>
          <path fill="#FFFFFF" d="M290.526,405.651l-4.218,5.272l-2.753-1.835c-0.566-0.379-1.331-0.225-1.707,0.341
          c-0.376,0.565-0.224,1.33,0.341,1.707l3.692,2.462c0.209,0.139,0.447,0.207,0.683,0.207c0.362,0,0.72-0.16,0.961-0.461l4.923-6.154
          c0.425-0.531,0.338-1.306-0.192-1.729C291.726,405.036,290.951,405.12,290.526,405.651z"/>
          <path fill="#FFFFFF" d="M290.526,416.729l-4.218,5.272l-2.753-1.835c-0.566-0.378-1.331-0.224-1.707,0.341
          c-0.376,0.566-0.224,1.329,0.341,1.707l3.692,2.462c0.209,0.139,0.447,0.206,0.683,0.206c0.362,0,0.72-0.159,0.961-0.461
          l4.923-6.154c0.425-0.531,0.338-1.306-0.192-1.73C291.726,416.113,290.951,416.198,290.526,416.729z"/>
          <rect x="296.41" y="419.959" fill="#FFFFFF" width="17.23" height="2.462"/>
          <rect x="296.41" y="408.882" fill="#FFFFFF" width="17.23" height="2.461"/>
          <rect x="296.41" y="397.805" fill="#FFFFFF" width="17.23" height="2.461"/>
        </g>
      </svg>
    </span>
      </div>
      <div class="media-body media-middle">
        <h2 class="pmd-card-title-text typo-fill-secondary">Población por carreras</h2>
      </div>
    </div>

    <span class="btn-loader loader hidden">Cargando...</span>
  </div>
</div>
<!--end población por carreras-->
@endsection
