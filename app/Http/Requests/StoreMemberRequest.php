<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Http\Requests\StoreMemberRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;


class StoreMemberRequest extends FormRequest
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


    public function store(StoreMemberRequest $request)
{
$password = str_random(6);
$data = $request->all();
$data['password'] = bcrypt($password);
// bypass verifikasi
$data['is_verified'] = 1;
$member = User::create($data);
// set role
$memberRole = Role::where('name', 'member')->first();
$member->attachRole($memberRole);
// kirim email
Mail::send('auth.emails.invite', compact('member', 'password'), function ($m) use ($member) {
$m->to($member->email, $member->name)->subject('Anda telah didaftarkan di Larapus!');
});
Session::flash("flash_notification", [
"level"
=> "success","message" => "Berhasil menyimpan member dengan email " .
"<strong>" . $data['email'] . "</strong>" .
" dan password <strong>" . $password . "</strong>."
]);
return redirect()->route('members.index');
}   

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255','email' => 'required|email|max:255|unique:users',

        ];
    }
}
