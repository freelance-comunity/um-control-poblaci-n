@extends('layouts.ui') @section('content') @section('title') Carreras Cancún @endsection @section('title-section') Carreras
Cancún @endsection

<div class="uk-container uk-container-large">
    {{--  <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-2@l">
        <div>
            <div class="uk-card uk-card-default">
                <div class="uk-card-header">
                    Selecciona
                </div>
                <div class="uk-card-body">
                    {!! Form::open(['url' => 'filterCancun', 'class' => 'class="uk-grid-small" uk-grid']) !!}
                    <div class="uk-width-1-2@s">
                        <select name="carrera" class="uk-select">
                            <option value="1">INGENIERIA MECANICA AUTOMOTRIZ</option>
                            <option value="2">DERECHO</option>
                            <option value="3">ADMINISTRACION DE EMPRESAS</option>
                            <option value="4">TRABAJO SOCIAL</option>
                            <option value="5">CONTADURIA PUBLICA</option>
                        </select>
                    </div>
                    <div class="uk-width-1-2@s">
                        <select name="estatus" class="uk-select">
                            <option value="A">ACTIVOS</option>
                            <option value="B">BAJAS</option>
                            <option value="E">EGRESADOS</option>
                        </select>
                    </div>
                    <div class="uk-margin">
                        {!! Form::submit('Consultar', ['class' => 'uk-button uk-button-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>  --}}
    <div uk-grid class="uk-child-width-1-1@s uk-child-width-5-2@l">
        <div>
            <div class="uk-card uk-card-default">
                <div class="uk-card-header">
                    Población por carrera
                    <br>
                     {!! Form::open(['url' => 'filterCancun', 'class' => 'class="uk-grid-small" uk-grid']) !!}
                    <div class="uk-width-1-2@s">
                        <select name="carrera" class="uk-select">
                            <option value="1">INGENIERIA MECANICA AUTOMOTRIZ</option>
                            <option value="2">DERECHO</option>
                            <option value="3">ADMINISTRACION DE EMPRESAS</option>
                            <option value="4">TRABAJO SOCIAL</option>
                            <option value="5">CONTADURIA PUBLICA</option>
                        </select>
                    </div>
                    <div class="uk-width-1-2@s">
                        <select name="estatus" class="uk-select">
                            <option value="A">ACTIVOS</option>
                            <option value="B">BAJAS</option>
                            <option value="E">EGRESADOS</option>
                        </select>
                    </div>
                    <div class="uk-margin">
                        {!! Form::submit('Consultar', ['class' => 'uk-button uk-button-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="uk-card-body">
                    {!! $chart5->html() !!}
                </div>
            </div>
        </div>
    </div>
</div>
{!! Charts::scripts() !!} {!! $chart5->script() !!} @endsection