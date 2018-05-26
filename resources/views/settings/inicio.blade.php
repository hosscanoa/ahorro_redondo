@extends('../base')


@section('content')

<div class="registrar" data-toggle="buttons">
            <a href="">
              <button type="button" class="btn btn-registrar">REGISTRAR</button>
            </a>
            <a href="">
              <button type="button" class="btn btn-entrar" data-toggle="modal" data-target="#modalInicio">ENTRAR</button>
            </a>
            <a href="#">Recuperar contraseña</a>
            <a href="#">Como funciona?</a>
        </div>

        <div id="modalInicio" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel">
        
            
            
        
            
<style>
    .container {
background-color: orange;
width: 100%;
padding: 40px 0;
}
.registrar {
background-color: white;
height: 100%;
padding: 20px 10px;
}

.registrar .btn-registrar {
display: block;
margin: 0 auto 30px auto;
min-width: 40px;
width: 139px;
background: #00C853;
border: 2px solid #00C853;
color: white;

}	
.registrar .btn-registrar:hover {
background: rgba(45, 179, 101, 0.57);
}

.registrar .btn-entrar {
display: block;
margin: 0 auto 30px auto;
min-width: 40px;
width: 139px;
background: white;
border: 2px solid #00C853;
color: #00C853;
}	
.registrar .btn-entrar:hover {
background: #00C853;
color: white;
}

.registrar a {
display: block;
text-align: center;
margin-bottom: 5px;
}

a:hover {
    text-decoration: none;
}





.c-input{
    box-shadow: 0 1px 20px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}
.c-input:focus{
    box-shadow: 0 1px 20px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    boder: 0px;
    border-color: transparent;
}
.btn-entrar{
    width: 100%;
    box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
    background-color: #00C853;
    border: 0px;
    padding-top: 10px;
    padding-bottom: 10px;
    letter-spacing: 1px;
}
.btn-entrar:hover{
    background-color: #02cc56;
    letter-spacing: 1.5px;
}
</style>