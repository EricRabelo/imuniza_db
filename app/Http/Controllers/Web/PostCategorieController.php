<?php

namespace App\Http\Controllers\Web;

use App\Models\Postcategorie;
use App\Http\Requests\PostCategorieRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostCategorieController extends Controller
{
    private $postcategories;

    public function __construct(Postcategorie $postcategories)
    {
        $this->postcategories = $postcategories;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postcategories = $this->postcategories->all();
        return view('admin.postcategorie.index', compact('postcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.postcategorie.crud');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCategorieRequest $request)
    {
        $datas = $request->all();
        $postcategories = $this->postcategories->make($datas);
        $slug = Str::of($postcategories->categorie)->slug('-');
        $postcategories->categorie_slug = $slug;
        $postcategories->save();

        // retorna para a página index do CRUD de Exemplos com mensagem de aviso
        return redirect(route('admin.postcategorie.index'))->with('success', 'Categoria cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postcategorie = $this->postcategories->find($id);

        return json_encode($postcategorie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postcategorie = $this->postcategories->find($id);

        return view('admin.postcategorie.crud', compact('postcategorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostCategorieRequest $request, $id)
    {
        $datas = $request->all();
        $postcategories = $this->postcategories->find($id);
        $slug = Str::of($datas['categorie'])->slug('-')->__toString();
        $datas_treated = array_merge($datas, ['categorie_slug' => $slug]);
        $postcategories->update($datas_treated);

        // retorna para a página index do CRUD de Exemplos com mensagem de aviso
        return redirect(route('admin.postcategorie.index'))->with('success', 'Categoria atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postcategorie = $this->postcategories->find($id);

        // Excluindo Post e arquivo de imagem relacionado
        $posts = $postcategories->posts;
        foreach ($posts as $post) {
            Storage::delete('public/' . $post->image); //excluindo a imagem
            $post->delete(); // apagando o post
        }

        $postcategories->delete();

        return redirect(route('admin.postcategorie.index'))->with('success', 'Categoria deletada com sucesso!');
    }
}
