<?php

namespace sisVentas\Http\Requests;

use sisVentas\Http\Requests\Request;

class ArticuloFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
          /* nombres de atributos del formulario html*/

            'idcategoria'=>'required',
            'codigo'=>'required|max:50',
            'nombre'=>'required|max:100',
            'stock'=>'required|numeric',
            'descripcion'=>'required|max:512',
            'imagen'=>'mimes:jpeg,bmp,png'

        ];
    }
}
