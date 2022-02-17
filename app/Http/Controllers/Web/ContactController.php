<?php

namespace App\Http\Controllers\Web;

use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contacts;

    public function __construct(Contact $contacts)
    {
        $this->contacts = $contacts;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        return json_encode($contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = $this->contacts->find(1);

        return view('admin.contact.crud', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, $id)
    {
        $datas = $request->all();
        $contact = $this->contacts->find(1);

        $phone = preg_replace('/[^0-9]/', '', $datas['phone']);
        $whatsapp = preg_replace('/[^0-9]/', '', $datas['whatsapp']);

        $datas['phone'] = '+' . $phone;
        $datas['whatsapp'] = '+' . $whatsapp;

        //Verificando se o arquivo de imagem é valido
        if ($request->hasFile('image')) {
            Storage::delete('public/' . $contact->image); //excluindo a imagem
            $datas['image'] = $request->file('image')->store('contacts', 'public');
        }

        $contact->update($datas);

        // retorna para a página index do CRUD de projetos com mensagem de aviso
        return redirect(route('admin.home'))->with('success', 'Contato atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
