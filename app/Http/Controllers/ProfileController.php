<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProfileEditAjaxFormRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use Torann\GeoIP\Facades\GeoIP;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{

    private $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();

            return $next($request);
        });

        $this->user = auth()->user();
    }


    /**
     * Muestra el perfil del usuario.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.perfil');

    }


    /** Función que devuelve la vista de cuenta de forma asíncrona.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function perfilCuenta()
    {
        return view('users.datosPerfil.cuenta', [
            'user' => $this->user,
        ]);
    }


    /** Función que devuelve la vista de datos personales de forma asíncrona.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function perfilDatosPersonales()
    {
        return view('users.datosPerfil.datosPersonales', [
            'user' => $this->user,
        ]);
    }


    /** Función que devuelve la vista de localización de forma asíncrona.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function perfilLocalizacion()
    {
        $data = GeoIP::getLocation($this->user->ip);

        return view('users.datosPerfil.localizacion', [
            'user' => $this->user,
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
        return view('users.edit', ['user' => $this->user]);
    }


    /** Editamos los datos del perfil, dependiendo de la ruta de donde provengan los datos, guardaremos esos datos en la
     * base de datos.
     * @param UpdateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request)
    {
        $path = $request->path();

        if (strpos($path, 'cuenta')) {
            $data = array_filter($request->all());

            $this->user->fill($data);
        }

        if (strpos($path, 'password')) {

            if (!Hash::check($request->get('current_password'), $this->user->password)) {
                return redirect()->back()->with('error', 'La contraseña actual no es correcta');
            }

            if (strcmp($request->get('current_password'), $request->get('password')) == 0) {
                return redirect()->back()->with('error', 'La nueva contraseña debe ser diferente de la antigua.');
            }

            $this->user->password = bcrypt($request->get('password'));
        }

        if (strpos($path, 'datos-personales')) {

            $data = array_filter($request->all());

            $this->user->fill($data);
        }

        if (strpos($path, 'avatar')) {
            if ($avatar = $request->file('avatar')) {
                $routeParts = explode('/', $this->user->avatar);
                Storage::disk('public')->delete('image/' . end($routeParts));

                $url = $avatar->store('image', 'public');
            } else {
                $url = $this->user->avatar;
            }
            $this->user->fill([
                'avatar' => $url,
            ]);
        }

        $this->user->ip = $request->ip();

        $this->user->save();

        return redirect()
            ->back()
            ->with('exito', 'Datos actualizados');
    }
}
