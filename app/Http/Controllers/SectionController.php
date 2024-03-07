<?php

namespace App\Http\Controllers;
use App\Interface\SectionRepositoryInterface;
use App\Models\section;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class SectionController extends Controller
{
    private $Sections;

    public function __construct(SectionRepositoryInterface $Sections)
    {
        $this->Sections = $Sections;
    }

    public function index()
    {
        return $this->Sections->index();
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'section_name' => 'required|unique:sections|max:255',
        ],[
            'section_name.required' =>'يرجي ادخال اسم القسم',
            'section_name.unique' =>'اسم القسم مسجل مسبقا',
        ]);

      return $this->Sections->store($request);
    }

    public function show(section $section)
    {
        //
    }

    public function edit(section $section)
    {
        //
    }

    public function update(Request $request, section $section)
    {
        $id = $request->id;

        $this->validate($request, [
            'section_name' => 'required|max:255|unique:sections,section_name,'.$id,
            'description' => 'required',
        ],[
            'section_name.required' =>'يرجي ادخال اسم القسم',
            'section_name.unique' =>'اسم القسم مسجل مسبقا',
            'description.required' =>'يرجي ادخال البيان',
        ]);

       return $this->Sections->update($request  , $section);
    }

    public function destroy(Request $request)
    {
        return $this->Sections->destroy($request);
    }
}
