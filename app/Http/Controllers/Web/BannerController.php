<?php

namespace App\Http\Controllers\Web;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\BannerRequest;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{

    private $banners;

    public function __construct(Banner $banners)
    {
        $this->banners = $banners;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = $this->banners->all();
        return view('admin.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.crud');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $datas = $request->all();

        $datas['image'] = $request->file('image')->store('banners', 'public');

        $this->banners->create($datas);

        // retorna para a página index do CRUD de Banners com mensagem de aviso
        return redirect(route('admin.banner.index'))->with('success', 'Banner cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner = $this->banners->find($id);

        return json_encode($banner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = $this->banners->find($id);

        return view('admin.banner.crud', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, $id)
    {
        $datas = $request->all();
        $banner = $this->banners->find($id);

        //Verificando se o arquivo de imagem é valido
        if ($request->hasFile('image')) {
            Storage::delete('public/' . $banner->image); //excluindo o banner
            $datas['image'] = $request->file('image')->store('banners', 'public');
        }


        $banner->update($datas);

        // retorna para a página index do CRUD de Banners com mensagem de aviso
        return redirect(route('admin.banner.index'))->with('success', 'Banner atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = $this->banners->find($id);
        Storage::delete('public/' . $banner->image); //excluindo a imagem
        $banner->delete();

        return redirect(route('admin.banner.index'))->with('success', 'Banner deletado com sucesso!');
    }


    /**
     * Muda o status do banner
     * Faz a troca de status entre o atual e o que será ativado
     */
    public function statusToggleBanner($id)
    {
        $this->banners->statusToggle($id);

        return redirect(route('admin.banner.index'))->with('success', 'Status atualizado com succeso!');
    }

    /**
     * Desativa o status do banner
     */
    public function setFalseBanner($id)
    {
        $this->banners->setFalseStatus($id);

        return redirect(route('admin.banner.index'))->with('success', 'Banner atualizado com succeso!');
    }
}
