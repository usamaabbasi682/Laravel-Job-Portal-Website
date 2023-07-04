<?php 
namespace App\Services\Interfaces;

interface CompanyServiceInterface
{
    public function index($request):object;
    public function store($request):bool;
    public function update($request,object $company):bool;
    public function uploadFile($request,$model,string $fileName,string $collectionName):void;
}


?>