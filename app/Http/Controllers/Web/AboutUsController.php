<?php

namespace App\Http\Controllers\Web;

use App\Models\About;
use App\Http\Requests\AboutUsRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    private $abouts;

    public function __construct(About $abouts)
    {
        $this->abouts = $abouts;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = $this->abouts->find($id);

        return view('admin.aboutus.crud', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AboutUsRequest $request, $id)
    {
        $datas = $request->all();
        $about = $this->abouts->find($id);

        //Verificando se o arquivo de imagem é valido
        if ($request->hasFile('image')) {
            Storage::delete('public/' . $about->image); //excluindo a imagem
            $datas['image'] = $request->file('image')->store('abouts', 'public');
        }

        $about->update($datas);

        // retorna para a página index do CRUD de projetos com mensagem de aviso
        return redirect(route('admin.home'))->with('success', 'Sobre Nós atualizado com sucesso!');
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
