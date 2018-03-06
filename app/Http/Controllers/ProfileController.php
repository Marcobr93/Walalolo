<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProfileEditAjaxFormRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Torann\GeoIP\Facades\GeoIP;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.perfil');

    }

    public function perfilCuenta()
    {
        $user = Auth::user();

        return view('users.datosPerfil.cuenta', [
            'user' => $user,
        ]);

    }


    public function perfilDatosPersonales()
    {
        $user = Auth::user();

        return view('users.datosPerfil.datosPersonales', [
            'user' => $user,
        ]);

    }


    public function perfilLocalizacion()
    {
        $user = Auth::user();

        $data = GeoIP::getLocation($user->ip);


        return view('users.datosPerfil.localizacion', [
            'user' => $user,
            'data' => $data
        ]);

    }

    public function editProfile()
    {
        return view('users.edit');
    }



    /** Validacion por Ajax con FormRquest
     * @param CreateProfileEditAjaxFormRequest $request
     * @return array
     */
    protected function validacionAjax(CreateProfileEditAjaxFormRequest $request)
    {
        //Obtenermos todos los valores y devolvemos un array vacio
        return array();
    }


    /** Muestra la vista de edición del perfil
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        $user = Auth::user();

        return view('users.edit', ['user' => $user]);
    }


    /** Editamos los datos del perfil, dependiendo de la ruta de donde provengan los datos, guardaremos esos datos en la
     * base de datos.
     * @param UpdateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request)
    {
        $path = $request->path();
        $user = Auth::user();


        if (strpos($path, 'cuenta')) {
            $data = array_filter($request->all());

            $user = User::findOrFail(Auth::user()->id);

            $user->fill($data);
        } elseif (strpos($path, 'password')) {

            if (!Hash::check($request->get('current_password'), $user->password)) {
                return redirect()->back()->with('error', 'La contraseña actual no es correcta');
            }

            if (strcmp($request->get('current_password'), $request->get('password')) == 0) {
                return redirect()->back()->with('error', 'La nueva contraseña debe ser diferente de la antigua.');
            }

            $user->password = bcrypt($request->get('password'));
        } elseif (strpos($path, 'datos-personales')) {

            $data = array_filter($request->all());

            $user = User::findOrFail(Auth::user()->id);

            $user->fill($data);
        } elseif (strpos($path, 'avatar')) {

            $avatar = $request->file('avatar');

            $url = $avatar->store('image', 'public');

            $user = User::findOrFail(Auth::user()->id);

            $user->avatar = $url;
        }

        $user->ip = $request->ip();

        $user->save();

        return redirect()
            ->back()
            ->with('exito', 'Datos actualizados');
    }



    /** Devuelve la vista de prueba, donde realizo las pruebas en el proyecto.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function prueba()
    {
        return view('prueba');
    }
}
