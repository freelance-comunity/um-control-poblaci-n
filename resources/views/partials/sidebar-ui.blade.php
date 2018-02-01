<li class="uk-nav-header">
  Principal
</li>
<li><a href="{{url('home')}}">Inicio</a></li>
<li class="uk-nav-header">
  Planteles
</li>
<li><a href="{{route('tuxtla')}}">Tuxtla</a></li>
<li><a href="{{route('tapachula')}}">Tapachula</a></li>
<li><a href="{{route('cancun')}}">Cancun</a></li>
@role('director')
<li class="uk-nav-header">
  Sistema
</li>
<li><a href="{{url('population/population')}}">Población Estudiantil</a></li>
@endrole
@role('admin')
<li class="uk-nav-header">
  Sistema
</li>
<li><a href="{{url('admin/campus')}}">Planteles</a></li>
<li><a href="{{url('population/population')}}">Población Estudiantil</a></li>
<li><a href="{{url('users')}}">Usuarios</a></li>
<li><a href="{{url('roles')}}">Roles</a></li>
@endrole
