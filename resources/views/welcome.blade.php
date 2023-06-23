<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventario Plantas</title>
    <link rel="shortcut icon" href="favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a648941800.js" crossorigin="anonymous"></script>
    <style>
      body{
        background: rgb(0,172,109);
background: radial-gradient(circle, rgba(0,172,109,1) 0%, rgba(103,233,155,1) 63%, rgba(46,228,87,1) 100%);
      }
      h1{
        font-family: 'Dancing Script', cursive;
        font-size: 90px;
      }
    </style>
</head>

<body>
    
    <h1 class="text-center p-3">Mi inventario</h1>

    <!--Endpoint de creacion de planta -->
    @if (session("Exito"))
        <div class="alert alert-success">{{session("Exito")}}</div>
    @endif

    @if (session("Lo lamento"))
        <div class="alert alert-danger">{{session("Lo lamento")}}</div>
    @endif

    <script>
      //Verificacion de metodo delete
        var res=function(){
            var not=confirm('Quieres eliminar?');
            return not;
        }
    </script>
     <!--Modal para crear planta -->
  <div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Crear planta</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!--Ruta de create conectado con PlantasController -->
            <form action="{{Route('plantas.create')}}" method="post">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">ID</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="textid">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="textNombre">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nombre Cientifico</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="textCientifico">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Orden</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="textOrden">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Clase</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="textClase">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Familia</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="textFamilia">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Division</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="textDivision">
                  </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                  </div>
              </form>
        </div>
      </div>
    </div>
  </div>
  <!--Tabla de datos -->
    <div class="p-4 table-responsive">
      <div class="d-grid gap-2">
        <button class="btn btn-outline-light"  data-bs-toggle="modal" data-bs-target="#modalRegistrar" type="button">Crear Planta</button>
      </div>
    <table class="table table-striped table-dark table-bordered table-hover">
        <thead  class="bg-primary text-light">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Nombre Cientifico</th>
            <th scope="col">Orden</th>
            <th scope="col">Clase</th>
            <th scope="col">Familia</th>
            <th scope="col">Division</th>
            
            <th></th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <!--Columnas conectadas con tabla de datos-->
          @foreach ($datos as $item)
            <tr>
            <th>{{$item->ID}}</th>
            <td>{{$item->Nombre}}</td>
            <td>{{$item->NombreCientifico}}</td>
            <td>{{$item->Orden}}</td>
            <td>{{$item->Clase}}</td>
            <td>{{$item->Familia}}</td>
            <td>{{$item->Division}}</td>
            <!--Botones para editar y eliminar conectados con la tabla de datos y a su respectiva ruta -->
            <td>
                <a href="" data-bs-toggle="modal"  class="btn btn-warning btn-sm" data-bs-target="#modalEditar"> <i class="fa-solid fa-pen-to-square"></i></a>
                <a href="{{route('plantas.delete', $item->ID)}}" onclick="return res()" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
            </td>
  
  <!-- Modal para editar plantas-->
  <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Editar planta</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
              <div class="modal-body">
              <!--Ruta de update conectado con PlantasController -->
              <form action="{{route('plantas.update')}}"method="post">
                @csrf

                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">ID</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="textid" value="{{$item->ID}}" readonly>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="textNombre" value="{{$item->Nombre}}">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nombre Cientifico</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="textCientifico" value="{{$item->NombreCientifico}}">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Orden</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="textOrden" value="{{$item->Orden}}">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Clase</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="textClase" value="{{$item->Clase}}">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Familia</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="textFamilia" value="{{$item->Familia}}">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Division</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="textDivision" value="{{$item->Division}}">
                  </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      </tbody>
      </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>