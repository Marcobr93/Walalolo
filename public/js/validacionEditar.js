/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 62);
/******/ })
/************************************************************************/
/******/ ({

/***/ 62:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(63);


/***/ }),

/***/ 63:
/***/ (function(module, exports, __webpack_require__) {

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

function gestionarErrores(input, errores) {
    var noEnviarFormulario = false;
    input = $(input);
    if ((typeof errores === "undefined" ? "undefined" : _typeof(errores)) !== ( true ? "undefined" : _typeof(undefined))) {
        input.removeClass("is-invalid");
        input.addClass("is-invalid");
        input.nextAll(".invalid-feedback").remove();
        var _iteratorNormalCompletion = true;
        var _didIteratorError = false;
        var _iteratorError = undefined;

        try {
            for (var _iterator = errores[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
                var error = _step.value;

                input.after("<div class=\"invalid-feedback\">\n                <strong> " + error + " </strong>\n            </div>");
            }
        } catch (err) {
            _didIteratorError = true;
            _iteratorError = err;
        } finally {
            try {
                if (!_iteratorNormalCompletion && _iterator.return) {
                    _iterator.return();
                }
            } finally {
                if (_didIteratorError) {
                    throw _iteratorError;
                }
            }
        }

        noEnviarFormulario = true;
    } else {
        input.removeClass("is-invalid");
        input.addClass("is-valid");
        input.nextAll(".invalid-feedback").remove();
    }
    return noEnviarFormulario;
}

function validateTarget(target) {
    var formData = new FormData();
    formData.append(target.id, target.value);
    $(target).parent().next(".spinner").addClass("loader");
    axios.post('/editar/validar', formData).then(function (response) {
        $(target).parent().next(".spinner").removeClass("loader");
        switch (target.id) {
            case "nombre_usuario":
                gestionarErrores(target, response.data.nombre_usuario);
                break;
            case "email":
                gestionarErrores(target, response.data.email);
                break;
            case "current_password":
                gestionarErrores(target, response.data.current_password);
                break;
            case "password":
                gestionarErrores(target, response.data.password);
                break;
            case "name":
                gestionarErrores(target, response.data.name);
                break;
            case "apellido":
                gestionarErrores(target, response.data.apellido);
                break;
            case "dni":
                gestionarErrores(target, response.data.dni);
                break;
            case "num_telefono":
                gestionarErrores(target, response.data.num_telefono);
                break;
            case "direccion":
                gestionarErrores(target, response.data.direccion);
                break;
            case "poblacion":
                gestionarErrores(target, response.data.poblacion);
                break;
            case "fecha_nac":
                gestionarErrores(target, response.data.fecha_nac);
                break;
            case "descripcion":
                gestionarErrores(target, response.data.descripcion);
                break;
        }
    }).catch(function (error) {
        console.log(error);
    });
}

$(function () {
    $("#nombre_usuario,#email,#current_password,#password,#name,#apellido,#dni,#num_telefono,#direccion,#poblacion,#fecha_nac,#descripcion").on('change', function (e) {
        validateTarget(e.target);
    });

    $("#botonEditar").click(function (e) {
        e.preventDefault();
        var enviarFormulario = true;
        var formData = new FormData();
        formData.append('nombre_usuario', $("#nombre_usuario").val());
        formData.append('email', $("#email").val());
        formData.append('current_password', $("#current_password").val());
        formData.append('password', $("#password").val());
        formData.append('name', $("#name").val());
        formData.append('apellido', $("#apellido").val());
        formData.append('dni', $("#dni").val());
        formData.append('num_telefono', $("#num_telefono").val());
        formData.append('direccion', $("#direccion").val());
        formData.append('poblacion', $("#poblacion").val());
        formData.append('fecha_nac', $("#fecha_nac").val());
        formData.append('descripcion', $("#descripcion").val());

        axios.post('/editar/validar', formData).then(function (response) {
            if (gestionarErrores("#nombre_usuario", response.data.nombre_usuario)) {
                enviarFormulario = false;
            }

            if (gestionarErrores("#email", response.data.email)) {
                enviarFormulario = false;
            }

            if (gestionarErrores("#current_password", response.data.current_password)) {
                enviarFormulario = false;
            }

            if (gestionarErrores("#password", response.data.password)) {
                enviarFormulario = false;
            }

            if (gestionarErrores("#name", response.data.name)) {
                enviarFormulario = false;
            }

            if (gestionarErrores("#apellido", response.data.apellido)) {
                enviarFormulario = false;
            }

            if (gestionarErrores("#dni", response.data.dni)) {
                enviarFormulario = false;
            }

            if (gestionarErrores("#num_telefono", response.data.num_telefono)) {
                enviarFormulario = false;
            }

            if (gestionarErrores("#direccion", response.data.direccion)) {
                enviarFormulario = false;
            }

            if (gestionarErrores("#poblacion", response.data.poblacion)) {
                enviarFormulario = false;
            }

            if (gestionarErrores("#fecha_nac", response.data.fecha_nac)) {
                enviarFormulario = false;
            }

            if (gestionarErrores("#descripcion", response.data.descripcion)) {
                enviarFormulario = false;
            }

            if (enviarFormulario === true) {
                $("#formularioEditar").submit();
            }
        });
    });
});

/***/ })

/******/ });