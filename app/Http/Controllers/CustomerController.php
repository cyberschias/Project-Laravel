<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public function index($id = null) {
        if ($id == null){
            return Customer::orderBy('id', 'asc')->get();
        } else {
            return $this->show($id);
        }
    }

    public function store(Request $request) {
        $customer = new Customer;
        $customer->firstname = $request->input('firstname');
        $customer->lastname = $request->input('lastname');
        $customer->email = $request->input('email');
        $customer->birthday = $request->input('birthday');
        $customer->telephone = $request->input('telephone');
        $customer->cellphone = $request->input('cellphone');
        $customer->password = $request->input('password');
        $customer->ip = $request->input('ip');
        $customer->save();
        return 'Registro de Cliente foi criado com sucesso com ID:' . $customer->id;
    }
    public function show($id) {
        return Customer::find($id);
    }
    public function update(Request $request, $id) {
        $customer = Customer::find($id);
        $customer->firstname = $request->input('firstname');
        $customer->lastname = $request->input('lastname');
        $customer->email = $request->input('email');
        $customer->birthday = $request->input('birthday');
        $customer->telephone = $request->input('telephone');
        $customer->cellphone = $request->input('cellphone');
        $customer->password = $request->input('password');
        $customer->ip = $request->input('ip');
        $customer->save();
        return 'Registro de Cliente foi atualizado com sucesso com ID:' . $customer->id;
    }
    public function destroy($id) {
        $customer = Customer::find($id)->delete();
        return 'Registro de Cliente  excluído com êxito';
    }
}
