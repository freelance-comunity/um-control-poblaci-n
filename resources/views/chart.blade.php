@extends('layouts.ui') @section('content') @section('title') Reporte General @endsection @section('title-section') Reporte
General @endsection
<div class="uk-container uk-container-large">
  <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-4@xl">
    <div>
      <div class="uk-card uk-card-default uk-card-body">
        <span class="statistics-text">Alumnos activos</span>
        <br />
        <span class="statistics-number">
          {{$actives->count()}}
          <span class="uk-label uk-label-success">
            <span class="ion-arrow-up-c"></span>
          </span>
        </span>
      </div>
    </div>
    <div>
      <div class="uk-card uk-card-default uk-card-body">
        <span class="statistics-text">Alumnos con baja</span>
        <br />
        <span class="statistics-number">
          {{$lows->count()}}
          <span class="uk-label uk-label-danger">
            <span class="ion-arrow-down-c"></span>
          </span>
        </span>
      </div>
    </div>
    <div>
      <div class="uk-card uk-card-default uk-card-body">
        <span class="statistics-text">Egresados</span>
        <br />
        <span class="statistics-number">
          {{$graduates->count()}}
          <span class="uk-label uk-label-primary">
            <span class="ion-arrow-up-c"></span>
          </span>
        </span>
      </div>
    </div>
    <div>
      <div class="uk-card uk-card-small uk-card-hover uk-light uk-card-body uk-card-secondary">
        <span class="statistics-text">Consultar por fecha</span>
        <br />
        <span class="statistics-number">
          {!! Form::open(['url' => 'populationDate', 'class' => 'form-horizontal']) !!}
          <div class="uk-margin">
            <div class="uk-position-relative">
              <label class="uk-form-label" for="form-stacked-select">Fecha inicio</label>
              <input type="date" name="start" required>
            </div>
            <div class="uk-position-relative">
              <label class="uk-form-label" for="form-stacked-select">Fecha fin</label>
              <input type="date" name="end" required>
            </div>
          </div>
          <div class="uk-margin">
            {!! Form::submit('Consultar', ['class' => 'uk-button uk-button-primary uk-width-1-1 uk-button-large']) !!}
          </div>
          {!! Form::close() !!}
        </span>
        </span>
      </div>
    </div>
  </div>
  <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-2@l">
    <div>
      <div class="uk-card uk-card-default">
        <div class="uk-card-header">
          Población por estatus
        </div>
        <div class="uk-card-body">
          {!! $chart2->html() !!}
        </div>
      </div>
    </div>
    <div>
      <div class="uk-card uk-card-default">
        <div class="uk-card-header">
          Población por modalidad
        </div>
        <div class="uk-card-body">
          {!! $chart3->html() !!}
        </div>
      </div>
    </div>
    <div>
      <div class="uk-card uk-card-default">
        <div class="uk-card-header">
          Población por planteles
        </div>
        <div class="uk-card-body">
          {!! $chart4->html() !!}
        </div>
      </div>
    </div>
    <div>
      <div class="uk-card uk-card-default">
        <div class="uk-card-header">
          Población por carrera
        </div>
        <div class="uk-card-body">
          {!! $chart5->html() !!}
        </div>
      </div>
    </div>
    <div>
      <div class="uk-card uk-card-default">
        <div class="uk-card-header">
          Población por documentos
        </div>
        <div class="uk-card-body">
          {!! $chart6->html() !!}
        </div>
      </div>
    </div>
    <div>
      <div class="uk-card uk-card-default">
        <div class="uk-card-header">
          Bajas por sistema
        </div>
        <div class="uk-card-body">
          {!! $chart7->html() !!}
        </div>
      </div>
    </div>
  </div>
</div>
{!! Charts::scripts() !!} {!! $chart2->script() !!} {!! $chart3->script() !!} {!! $chart4->script() !!} {!! $chart5->script()
!!} {!! $chart6->script() !!} {!! $chart7->script() !!} @endsection
