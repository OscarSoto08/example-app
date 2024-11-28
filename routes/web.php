<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\Post;

Route::get('/', HomeController::class);

#La forma en como se asignan los parametros que pueden ser nulos
Route::get('/views/{nombre?}', function($nombre=null){
    return $nombre != null ? "Hola {$nombre}" : 'Hola mundo';
});


// // Route::get('/posts',[PostController::class, 'index']) -> name('post.index');

// // Route::get('/posts/create',[PostController::class, 'create']) -> name('post.create');

// // // ? Insercion de datos desde el formulario:
// // Route::post('/posts', [PostController::class,'store']) -> name('post.store');

// // Route::get('/posts/{id}', [PostController::class, 'show']) -> name('post.show');

// // Route::get('/posts/{post}/edit', [PostController::class, 'edit']) -> name('post.edit');

// // Route::put('/posts/{post}', [PostController::class,'update']) -> name('post.update');

// // Route::delete('/posts/{post}', [PostController::class,'destroy']) -> name('post.destroy');

Route::resource('post', PostController::class) -> parameters(['post'=>'post']) -> names('post');

//* En lugar de tomar en cuenta el nombre que se pasa por parametro al metodo resource de la clase route, se tiene en cuenta el parametro de names()
//* El metodo parameters hace lo mismo pero con los controladores, personaliza el nombre del parametro que se envia a través de las rutas

/*
? Importante: Route::resource solo se encarga de manejar los metodos index, create, destroy, store, show, edit, update, si hay un metodo adicional tocaría especificar su ruta por separado, ejemplo: /post/publish del metodo del controlador publish
*/

Route::get('/prueba', function(){
//* Esta es la forma 1 para crear datos
    // $post = new Post;
    // $post -> id = '1';
    // $post -> title = 'Titulo1';
    // $post -> content = 'Este es el segundo post';
    // $post -> category = '2';
    // $post -> save();
    // return $post;
//* Esta es la forma 2 para crear datos
    // $post = Post::create([
    //     'title' => 'Titulo3',
    //     'content' => 'Este es el segundo post',
    //     'category' => 'Ing. Química'
    // ]);
    // return $post;
//* Actualizar
    $post = Post::find(1);
    // $post = Post::where('title', 'Titulo1')
    //         -> first();
    $post -> category = 'DESARROLLO MOVIL';
    $post -> save();
    return $post;
//* Consultar todos los datos
    // $post = Post::all();
    // return $post;
//* Todos los que cumplan una condicion
    // $post = Post::where('id','>=',2)
    //         ->get();
    // return $post;
//* Listar todos los post
//? En caso de hacer una consulta siempre debo usar el metodo get()
//? En caso de querer un unico registro el metodo first()
//? En caso de una cantidad definida de registros el metodo take(n)
    // $post = Post::orderBy('id','desc')
    //         ->get();
    // return $post;
//* Eliminacion de registros
    // $post = Post::find(1);
    // $post -> delete();
});
