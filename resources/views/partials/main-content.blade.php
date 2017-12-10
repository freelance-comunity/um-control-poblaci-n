<!--Statistics-->
<div class="col-xs-12 col-sm-12 col-md-12">
  <div class="pmd-card pmd-z-depth statistics-content">
    <div class="pmd-card-title">
      <div class="media-left set-svg">
        <span class="service-icon img-circle bg-fill-green">
      <svg version="1.1" id="Layer_1" x="0px" y="0px" width="36px" height="26.25px" viewBox="279.765 332.782 36 26.25" enable-background="new 279.765 332.782 36 26.25" xml:space="preserve">
        <g>
          <path fill="#FFFFFF" d="M312.318,332.782c-1.928,0-3.485,1.558-3.485,3.485c0,0.89,0.334,1.706,0.89,2.336l-6.117,8.898
            c-0.371-0.112-0.742-0.186-1.148-0.186c-0.557,0-1.077,0.111-1.521,0.334l-4.82-4.932c0.296-0.519,0.445-1.075,0.445-1.706
            c0-1.927-1.557-3.485-3.485-3.485c-1.928,0-3.485,1.558-3.485,3.485c0,0.853,0.296,1.595,0.779,2.225l-6.155,8.972
            c-0.296-0.074-0.63-0.148-0.964-0.148c-1.928,0-3.485,1.558-3.485,3.486c0,1.927,1.557,3.485,3.485,3.485
            c1.928,0,3.485-1.558,3.485-3.485c0-0.89-0.333-1.706-0.889-2.336l6.118-8.935c0.333,0.111,0.742,0.185,1.112,0.185
            c0.593,0,1.187-0.148,1.669-0.445l4.782,4.931c-0.334,0.556-0.556,1.187-0.556,1.854c0,1.927,1.556,3.485,3.485,3.485
            c1.927,0,3.484-1.558,3.484-3.485c0-0.816-0.297-1.595-0.78-2.188l6.155-9.009c0.296,0.074,0.63,0.148,0.964,0.148
            c1.93,0,3.485-1.558,3.485-3.486C315.765,334.339,314.244,332.782,312.318,332.782z"/>
        </g>
      </svg>
    </span>
      </div>
      <div class="media-body media-middle">
        <h2 class="pmd-card-title-text typo-fill-secondary">Informe</h2>
      </div>
    </div>
    <div class="pmd-card-body statistics text-center">
      <ul class="list-group list-inline">
        <li>
          <div class="statistic-img-circle">
            <svg version="1.1" id="Layer_1" x="0px" y="0px" width="30px" height="30px" viewBox="281.64 330.535 32 32" enable-background="new 281.64 330.535 32 32" xml:space="preserve">
          <g>
            <polygon fill="#40AC45" points="296.29,330.535 296.29,353.696 288.187,345.594 286.182,347.599 297.762,359.18 309.139,347.599
              307.093,345.594 299.154,353.655 299.154,330.535 	"/>
            <polygon fill="#40AC45" points="313.64,354.72 310.776,354.72 310.776,359.589 284.504,359.589 284.504,354.72 281.64,354.72
              281.64,362.454 313.64,362.454 	"/>
          </g>
        </svg>
          </div>
          <div class="pmd-display2">{{$actives->count()}}</div>
          <div class="source-semibold typo-fill-secondary">Alumnos activos</div>
        </li>
        <li>
          <div class="statistic-img-circle">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="34px" height="17.711px" viewBox="280.699 426.316 34 17.711" enable-background="new 280.699 426.316 34 17.711" xml:space="preserve">
          <g>
            <path fill="#40AC45" d="M297.696,444.027c-9.155,0-16.394-7.752-16.698-8.085c-0.397-0.434-0.397-1.106,0-1.54
              c0.304-0.333,7.543-8.086,16.698-8.086c9.156,0,16.402,7.753,16.706,8.086c0.397,0.434,0.397,1.106,0,1.54
              C314.09,436.275,306.852,444.027,297.696,444.027z M283.449,435.169c2.018,1.887,7.702,6.588,14.247,6.588
              c6.559,0,12.236-4.693,14.247-6.581c-2.018-1.888-7.702-6.581-14.247-6.581C291.137,428.588,285.46,433.281,283.449,435.169z"/>
            <path fill="#40AC45" d="M297.696,440.368c-2.864,0-5.2-2.336-5.2-5.199c0-2.864,2.336-5.2,5.2-5.2c0.629,0,1.135,0.506,1.135,1.136
              c0,0.629-0.506,1.135-1.135,1.135c-1.613,0-2.929,1.316-2.929,2.93c0,1.612,1.316,2.929,2.929,2.929s2.929-1.31,2.929-2.929
              c0-0.63,0.506-1.136,1.135-1.136c0.63,0,1.136,0.506,1.136,1.136C302.896,438.039,300.56,440.368,297.696,440.368z"/>
            <circle fill="#40AC45" cx="297.696" cy="435.024" r="1.685"/>
          </g>
        </svg>
          </div>
          <div class="pmd-display2">{{$lows->count()}}</div>
          <div class="source-semibold typo-fill-secondary">Alumnos inactivos</div>
        </li>
        <li>
          <div class="statistic-img-circle">
            <svg version="1.1" id="Layer_1" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:cc="http://creativecommons.org/ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
              xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="32px" height="28.541px" viewBox="281.64 332.265 32 28.541" enable-background="new 281.64 332.265 32 28.541"
              xml:space="preserve">
          <g transform="translate(0,-952.36218)">
            <path fill="#40AC45" d="M297.64,1284.627c-4.044,0-7.352,3.307-7.352,7.351c0,4.045,3.307,7.352,7.352,7.352
              c4.045,0,7.352-3.307,7.352-7.352C304.991,1287.934,301.685,1284.627,297.64,1284.627z M297.64,1287.222
              c2.643,0,4.757,2.114,4.757,4.757s-2.114,4.757-4.757,4.757s-4.757-2.114-4.757-4.757S294.997,1287.222,297.64,1287.222z
               M297.64,1300.195c-4.283,0-8.164,1.021-11.067,2.743s-4.933,4.255-4.933,7.203v1.73c0,0.716,0.581,1.297,1.297,1.297h29.406
              c0.716,0,1.297-0.581,1.297-1.297v-1.73c0-2.948-2.028-5.48-4.933-7.203C305.804,1301.215,301.923,1300.195,297.64,1300.195z
               M297.64,1302.789c3.862,0,7.332,0.948,9.743,2.378c2.411,1.43,3.662,3.235,3.662,4.973v0.433h-26.811v-0.433
              c0-1.737,1.251-3.542,3.662-4.973C290.308,1303.737,293.778,1302.789,297.64,1302.789z"/>
          </g>
        </svg>
      </div>
          <div class="pmd-display2">{{$titles->count()}}</div>
          <div class="source-semibold typo-fill-secondary">Graduados</div>
        </li>
      </ul>
    </div>
    <span class="btn-loader loader hidden">Loading...</span>
  </div>
</div>
<!-- end statistics-->

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

<!--Población por estatus -->
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
        <h2 class="pmd-card-title-text typo-fill-secondary">Población por estatus</h2>
      </div>
    </div>

    <span class="btn-loader loader hidden">Loading...</span>
  </div>
</div>
<!--end población por estatus-->

<!--Activos por sistema -->
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
        <h2 class="pmd-card-title-text typo-fill-secondary">Activos por sistema</h2>
      </div>
    </div>

    <span class="btn-loader loader hidden">Loading...</span>
  </div>
</div>
<!--end activos por sistema-->

<!--Activos con documentación -->
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

    <span class="btn-loader loader hidden">Loading...</span>
  </div>
</div>
<!--end activos con documentación-->

<!--Baja por sistema -->
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
        <h2 class="pmd-card-title-text typo-fill-secondary">Baja por sistema</h2>
      </div>
    </div>

    <span class="btn-loader loader hidden">Loading...</span>
  </div>
</div>
<!--end baja por sistema-->

<!--Titulo -->
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

    <span class="btn-loader loader hidden">Loading...</span>
  </div>
</div>
<!--end titulo-->

<!--alumnos por estatus -->
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
        <h2 class="pmd-card-title-text typo-fill-secondary">Alumnos por estatus</h2>
      </div>
    </div>

    <span class="btn-loader loader hidden">Loading...</span>
  </div>
</div>
<!--end alumnos por estatus-->

<!--activos con documentación -->
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
        <h2 class="pmd-card-title-text typo-fill-secondary">Activos con documentación</h2>
      </div>
    </div>

    <span class="btn-loader loader hidden">Loading...</span>
  </div>
</div>
<!--end activos con documentación-->

<!--Browser Usage card-->
<div class="col-lg-4 col-sm-6 col-xs-12 value-added-service-card">
  <div class="pmd-card pmd-z-depth">
    <div class="pmd-card-title">
      <div class="media-left set-svg">
        <span class="service-icon img-circle bg-fill-violet">
      <svg  x="0px" y="0px" width="32px" height="30px" viewBox="0 0 32 30" enable-background="new 0 0 32 30" xml:space="preserve">
        <g>
          <path fill="#FFFFFF" d="M16.413,3.584l2.832,6.83l0.594,1.431l1.546,0.105l7.196,0.491L23,17.036l-1.227,1.01l0.394,1.539
            l1.835,7.174l-6.187-3.846l-1.32-0.82l-1.32,0.82L8.99,26.758l1.834-7.173l0.394-1.539l-1.226-1.01l-5.579-4.595l7.194-0.491
            l1.583-0.108l0.577-1.477L16.413,3.584 M16.395-0.053c-0.708,0-1.416,0.404-1.72,1.213l-3.238,8.296l-8.902,0.607
            c-1.619,0.202-2.428,2.226-1.011,3.237l6.879,5.665l-2.225,8.701c-0.316,1.263,0.724,2.28,1.87,2.28
            c0.322,0,0.651-0.08,0.962-0.258l7.486-4.653l7.486,4.653c0.311,0.178,0.641,0.258,0.962,0.258c1.146,0,2.187-1.018,1.871-2.28
            l-2.226-8.701l6.88-5.665c1.416-1.012,0.606-3.036-1.012-3.237l-8.903-0.607l-3.439-8.296C17.811,0.352,17.103-0.053,16.395-0.053
            L16.395-0.053z"/>
        </g>
      </svg>
    </span>
      </div>
      <div class="media-body media-middle">
        <h2 class="pmd-card-title-text typo-fill-secondary">Activos por sistema</h2>
      </div>
    </div>
    <div class="pmd-card-body text-center value-added">
      <div class="row">
        <div class="col-xs-6 value-added-section">
          <div class="source-semibold typo-fill-secondary title">Firefox</div>
          <div class="pmd-display2"><a href="javascript:void(0)">25%</a></div>
        </div>
        <div class="col-xs-6 value-added-section">
          <div class="source-semibold typo-fill-secondary title">Google Chrome</div>
          <div class="pmd-display2"><a href="javascript:void(0)">32%</a></div>
        </div>
        <div class="col-xs-6 value-added-section">
          <div class="source-semibold typo-fill-secondary title">Safari</div>
          <div class="pmd-display2"><a href="javascript:void(0)">13%</a></div>
        </div>
        <div class="col-xs-6 value-added-section">
          <div class="source-semibold typo-fill-secondary title">Opera</div>
          <div class="pmd-display2"><a href="javascript:void(0)">7%</a></div>
        </div>
        <div class="col-xs-6 value-added-section">
          <div class="source-semibold typo-fill-secondary title">Mobile & Tablet</div>
          <div class="pmd-display2"><a href="javascript:void(0)">4%</a></div>
        </div>
        <div class="col-xs-6 value-added-section">
          <div class="source-semibold typo-fill-secondary title">Others</div>
          <div class="pmd-display2"><a href="javascript:void(0)">2%</a></div>
        </div>
      </div>
    </div>
    <span class="btn-loader loader hidden">Loading...</span>
  </div>
</div>
<!--end Browser Usage card-->



<!--Recent Posts-->
<div class="col-lg-4 col-sm-6 col-xs-12">
  <div class="pmd-card pmd-z-depth recent-post">
    <div class="pmd-card-title">
      <div class="media-left set-svg">
        <span class="service-icon img-circle bg-fill-red">
      <svg version="1.1" id="XMLID_1_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32" enable-background="new 0 0 32 32" xml:space="preserve">
        <path fill="#FFFFFF" d="M10,22h6L32,6l-6-6L10,16V22z M13,17L25,5l2,2L15,19h-2V17z M22,28H4V10h8l4-4H0v26h26V16l-4,4V28z"/>
      </svg>
    </span>
      </div>
      <div class="media-body media-middle">
        <h2 class="pmd-card-title-text typo-fill-secondary">Población por estatus</h2>
      </div>
    </div>
    <ul class="list-group pmd-card-list pmd-list-avatar">
      <li class="list-group-item">
        <div class="media-left">
          <a href="javascript:void(0);" class="avatar-list-img" title="profile-link">
          <img alt="40x40" data-src="holder.js/40x40" class="img-responsive" src="themes/images/profile-1.png" data-holder-rendered="true">
        </a>
        </div>
        <div class="media-body media-middle">
          <h3 class="list-group-item-heading">Christopher Columbus</h3>
          <span class="list-group-item-text">This theme is Awesome!!</span>
        </div>
        <div class="media-right post">
          <span class="post-time">5 mins ago</span>
        </div>
      </li>
      <li class="list-group-item">
        <div class="media-left">
          <a href="javascript:void(0);" class="avatar-list-img" title="profile-link">
          <img alt="40x40" data-src="holder.js/40x40" class="img-responsive" src="themes/images/profile-2.png" data-holder-rendered="true">
        </a>
        </div>
        <div class="media-body media-middle">
          <h3 class="list-group-item-heading">Sandra Smith</h3>
          <span class="list-group-item-text">Hey! I'm thankful to you.</span>
        </div>
        <div class="media-right post">
          <span class="post-time">6 hours ago</span>
        </div>
      </li>
      <li class="list-group-item">
        <div class="media-left">
          <a href="javascript:void(0);" class="avatar-list-img" title="profile-link">
          <img alt="40x40" data-src="holder.js/40x40" class="img-responsive" src="themes/images/profile-3.png" data-holder-rendered="true">
        </a>
        </div>
        <div class="media-body media-middle">
          <h3 class="list-group-item-heading">Nick Doe</h3>
          <span class="list-group-item-text">I've used your component.</span>
        </div>
        <div class="media-right post">
          <span class="post-time">13:40 PM</span>
        </div>
      </li>
      <li class="list-group-item">
        <div class="media-left">
          <a href="javascript:void(0);" class="avatar-list-img" title="profile-link">
          <img alt="40x40" data-src="holder.js/40x40" class="img-responsive" src="themes/images/profile-4.png" data-holder-rendered="true">
        </a>
        </div>
        <div class="media-body media-middle">
          <h3 class="list-group-item-heading">Paul Andrew</h3>
          <span class="list-group-item-text">Nice work!!</span>
        </div>
        <div class="media-right post">
          <span class="post-time">10:00 AM</span>
        </div>
      </li>
      <li class="list-group-item">
        <div class="media-left">
          <a href="javascript:void(0);" class="avatar-list-img" title="profile-link">
          <img alt="40x40" data-src="holder.js/40x40" class="img-responsive" src="themes/images/profile-2.png" data-holder-rendered="true">
        </a>
        </div>
        <div class="media-body media-middle">
          <h3 class="list-group-item-heading">Sandra Smith</h3>
          <span class="list-group-item-text">Hey! I'm thankful to you.</span>
        </div>
        <div class="media-right post">
          <span class="post-time">6 hours ago</span>
        </div>
      </li>
    </ul>
    <span class="btn-loader loader hidden">Loading...</span>
  </div>
</div>
<!-- end Recent Posts-->

<!--project progress -->
<div class="col-lg-4 col-sm-6 col-xs-12">
  <div class="pmd-card pmd-z-depth project-progress">
    <div class="pmd-card-title">
      <div class="media-left set-svg">
        <span class="service-icon img-circle bg-fill-darkblue">
      <svg x="0px" y="0px" width="33px" height="30px" viewBox="0 0 33 30" enable-background="new 0 0 33 30" xml:space="preserve">
        <g>
          <path fill="#FFFFFF" d="M9.339,16.337L9.339,16.337L9.339,16.337z"/>
          <rect x="1.824" y="21.777" fill="#FFFFFF" width="4.62" height="8.223"/>
          <rect x="8.066" y="16.332" fill="#FFFFFF" width="4.62" height="13.668"/>
          <rect x="14.309" y="10.891" fill="#FFFFFF" width="4.62" height="19.109"/>
          <rect x="20.631" y="5.445" fill="#FFFFFF" width="4.62" height="24.555"/>
          <rect x="26.556" fill="#FFFFFF" width="4.62" height="30"/>
        </g>
      </svg>
    </span>
      </div>
      <div class="media-body media-middle">
        <h2 class="pmd-card-title-text typo-fill-secondary">Activos con documentación</h2>
      </div>
    </div>
    <div class="content-section">
      <ul class="list-group pmd-card-list pmd-list todo-lists">
        <li class="list-group-item timeline project-info">Graphics changes. Need to change icons for few sections.
          <h5 class="typo-fill-secondary">Low Priority</h5>
        </li>

        <li class="list-group-item timeline project-notification">Clean html/css/js code. Remove commented code from all the files. Also, enhance the code.
          <h5 class="typo-fill-secondary">High Priority</h5>
        </li>

        <li class="list-group-item timeline  project-notification">Make website responsive. Need to check the website in devices like Mobile and Ipad.
          <h5 class="typo-fill-secondary">High Priority</h5>
        </li>
      </ul>
      <div class="blank-state-section hidden">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="70px" height="70px" viewBox="0 0 90 90" enable-background="new 0 0 90 90" xml:space="preserve">
      <g>
        <g>
          <g>
            <path fill="#CAC8C8" d="M61.364,73.637h-4.091H32.727h-4.091H6.982l9.381-9.381v-2.892V40.909
              c0-15.791,12.845-28.636,28.637-28.636c15.791,0,28.636,12.846,28.636,28.636v20.456v2.892l9.38,9.381H61.364z M45,85.909
              c-5.327,0-9.823-3.432-11.521-8.182h23.04C54.823,82.478,50.326,85.909,45,85.909L45,85.909z M89.404,74.234L77.729,62.563
              V40.909c0-16.613-12.551-30.408-28.638-32.441V4.09c0-2.258-1.832-4.091-4.09-4.091s-4.092,1.833-4.092,4.091v4.377
              C24.823,10.5,12.272,24.295,12.272,40.909v21.654L0.596,74.234c-0.581,0.589-0.757,1.465-0.442,2.229
              c0.315,0.767,1.064,1.265,1.89,1.265h27.168C31.041,84.772,37.382,90.001,45,90.001c7.618,0,13.958-5.229,15.788-12.273h27.168
              c0.825,0,1.575-0.498,1.89-1.265C90.161,75.699,89.985,74.823,89.404,74.234L89.404,74.234z"/>
          </g>
        </g>
        <line fill="#CAC8C8" stroke="#CAC8C8" stroke-width="3" stroke-miterlimit="10" x1="7.854" y1="7.834" x2="86.679" y2="86.659"/>
      </g>
    </svg>
        <h4>You Don't Have Any Notifications</h4>
      </div>
    </div>
    <span class="btn-loader loader hidden">Loading...</span>
  </div>
</div>
<!-- end project progress -->
