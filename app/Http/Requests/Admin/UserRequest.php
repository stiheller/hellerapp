<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $user = $this->route('user');
       
        if($user ==''){
            return[
                'name' => 'required|min:3|max:255',
                'username' => ['required', 'min:6', 'max:8', 'unique:users,username'],
                'email' => ['required','email','unique:users,email',],
                'sector_id' => 'required',
                'activo' => 'required',
                'changepassword' => 'required',
                'roles' => 'required',
                'image' => 'required|mimes:jpg, jpeg, png|max:2048'
    
            ];
        }else{
            return[
                'name' => 'required|min:3|max:255',
                'username' => ['required', 'min:6', 'max:8', 'unique:users,username,'.$user->id],
                'email' => ['required','email','unique:users,email,' . $user->id],
                'sector_id' => 'required',
                'activo' => 'required',
                'changepassword' => 'required',
                'roles' => 'required',
                'image' => 'sometimes|mimes:jpg, jpeg, png|max:2048'
    
            ];
        }
        
        
    }
}
