<?php 
namespace App\Services\Interfaces;

interface JobServiceInterface
{
    public function index($request):object;
    public function store($request):bool;
    public function update($request,object $job):bool;
    public function status(object $job,string $status):bool;
}


?>