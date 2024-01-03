Bienvenido a mi aplicacion

@auth
    <h1>Usuario autenticado</h1>
    <p>{{Auth::user()->id}}</p>
    <p>{{Auth::user()->nombre}}</p>
    <p>{{Auth::user()->email}}</p>
@endauth

@guest

    <p>Hola Visitante</p>
@endguest
