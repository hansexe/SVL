<?php

namespace sisVentas\Http\Requests;

use sisVentas\Http\Requests\Request;

class CategoriaFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
         /* autorizar el request*/
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

        /* nombres de objetos del formulario html*/

            'nombre'=>'required|max:50',
            'descripcion'=>'max:256'

        ];
    }
}
