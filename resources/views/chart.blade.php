@extends('layouts.ui')
@section('content')
  @section('title')
Panel de inicio
  @endsection
<div class="uk-container uk-container-large">
  <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-4@xl">
    <div>
      <div class="uk-card uk-card-default uk-card-body">
        <span class="statistics-text">Alumnos Activos</span><br />
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
        <span class="statistics-text">Alumnos con baja</span><br />
        <span class="statistics-number">
                                  {{$lows->count()}}
                                  <span class="uk-label uk-label-danger">
                                      <span class="ion-arrow-down-c"></span>
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
          Población por licenciaturas
        </div>
        <div class="uk-card-body">
          {!! $chart4->html() !!}
        </div>
      </div>
    </div>
  </div>
</div>
{!! Charts::scripts() !!} {!! $chart2->script() !!} {!! $chart3->script() !!} {!! $chart4->script() !!} @endsection
