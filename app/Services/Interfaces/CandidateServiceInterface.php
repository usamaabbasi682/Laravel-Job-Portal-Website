<?php 
namespace App\Services\Interfaces;

interface CandidateServiceInterface
{
    public function index($request):object;
    public function store($request):bool;
    public function update($request,object $candidate):bool;
    public function uploadFile($request,$model,string $fileName,string $collectionName):void;
}


?>