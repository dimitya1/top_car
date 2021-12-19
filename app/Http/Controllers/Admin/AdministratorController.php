<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Administrator\StoreAdministratorRequest;
use App\Http\Requests\Admin\Administrator\UpdateAdministratorRequest;
use App\Models\User;
use App\Services\AdministratorService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param AdministratorService $administratorService
     * @return View
     */
    public function index(AdministratorService $administratorService): View
    {
        $administrators = $administratorService->getAllWithoutCurrent();

        return view('pages.admin.administrators.index', ['administrators' => $administrators]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('pages.admin.administrators.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAdministratorRequest $request
     * @param AdministratorService $administratorService
     * @return RedirectResponse
     */
    public function store(StoreAdministratorRequest $request, AdministratorService $administratorService): RedirectResponse
    {
        $administratorService->store($request->all());

        toast()->success('Новий запис успішно створено')->push();
        
        return redirect()->route('admin.administrators.index');
    }

    /**
     * @param User $administrator
     * @return void
     */
    public function show(User $administrator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $administrator
     * @return View
     */
    public function edit(User $administrator): View
    {
        return view('pages.admin.administrators.edit', ['admin' => $administrator]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param User $administrator
     * @param UpdateAdministratorRequest $request
     * @param AdministratorService $administratorService
     * @return RedirectResponse
     */
    public function update(User $administrator,
                           UpdateAdministratorRequest $request,
                           AdministratorService $administratorService): RedirectResponse
    {
        $administratorService->update($administrator, $request->all());

        toast()->success('Дані успішно оновлено')->push();
        
        return redirect()->route('admin.administrators.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $administrator
     * @param AdministratorService $administratorService
     * @return RedirectResponse
     */
    public function destroy(User $administrator, AdministratorService $administratorService): RedirectResponse
    {
        $administratorService->destroy($administrator);
    
        toast()->success('Запис усішно видалено')->push();
        
        return redirect()->route('admin.administrators.index');
    }
}
