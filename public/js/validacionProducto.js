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
/******/ 	return __webpack_require__(__webpack_require__.s = 64);
/******/ })
/************************************************************************/
/******/ ({

/***/ 64:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(65);


/***/ }),

/***/ 65:
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
    axios.post('/producto/validar', formData).then(function (response) {
        $(target).parent().next(".spinner").removeClass("loader");
        switch (target.id) {
            case "titulo":
                gestionarErrores(target, response.data.titulo);
                break;
            case "precio":
                gestionarErrores(target, response.data.precio);
                break;
            case "categoria":
                gestionarErrores(target, response.data.categoria);
                break;
            case "tipo_envio":
                gestionarErrores(target, response.data.tipo_envio);
                break;
            case "negociacion_precio":
                gestionarErrores(target, response.data.negociacion_precio);
                break;
            case "intercambio_producto":
                gestionarErrores(target, response.data.intercambio_producto);
                break;
            case "destacado":
                gestionarErrores(target, response.data.destacado);
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
    $("#titulo,#precio,#categoria,#tipo_envio,#negociacion_precio,#intercambio_producto,#destacado,#descripcion").on('change', function (e) {
        validateTarget(e.target);
    });

    $("#botonCreacionProducto").click(function (e) {
        e.preventDefault();
        var enviarFormulario = true;
        var formData = new FormData();
        formData.append('titulo', $("#titulo").val());
        formData.append('precio', $("#precio").val());
        formData.append('categoria', $("#categoria").val());
        formData.append('tipo_envio', $("#tipo_envio").val());
        formData.append('negociacion_precio', $("#negociacion_precio").val());
        formData.append('intercambio_producto', $("#intercambio_producto").val());
        formData.append('destacado', $("#destacado").val());
        formData.append('descripcion', $("#descripcion").val());

        axios.post('/producto/validar', formData).then(function (response) {
            if (gestionarErrores("#titulo", response.data.titulo)) {
                enviarFormulario = false;
            }

            if (gestionarErrores("#precio", response.data.precio)) {
                enviarFormulario = false;
            }

            if (gestionarErrores("#categoria", response.data.categoria)) {
                enviarFormulario = false;
            }

            if (gestionarErrores("#tipo_envio", response.data.tipo_envio)) {
                enviarFormulario = false;
            }

            if (gestionarErrores("#negociacion_producto", response.data.negociacion_producto)) {
                enviarFormulario = false;
            }

            if (gestionarErrores("#intercambio_producto", response.data.intercambio_producto)) {
                enviarFormulario = false;
            }

            if (gestionarErrores("#destacado", response.data.destacado)) {
                enviarFormulario = false;
            }

            if (gestionarErrores("#descripcion", response.data.descripcion)) {
                enviarFormulario = false;
            }

            if (enviarFormulario === true) {
                $("#formularioCreacionProducto").submit();
            }
        });
    });
});

/***/ })

/******/ });