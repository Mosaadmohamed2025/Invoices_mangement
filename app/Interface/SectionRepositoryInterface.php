<?php


namespace App\Interface;
use Illuminate\Database\Eloquent\Model;


interface SectionRepositoryInterface
{
    public function index();

    public function store($request);

    public function update($request ,$section);

    public function destroy($request);
}
