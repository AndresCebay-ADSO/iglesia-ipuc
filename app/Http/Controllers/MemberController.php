<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\Members;
use App\Services\MemberService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MemberController extends Controller
{
    protected MemberService $memberService;

    public function __construct(MemberService $memberService)
    {
        $this->memberService = $memberService;
    }

    /**
     * Display a listing of members.
     */
    public function index(Request $request): View
    {
        $filters = $request->only(['search', 'age_range', 'gender', 'ministry', 'status']);
        $members = $this->memberService->getFilteredMembers($filters);

        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new member.
     */
    public function create(): View
    {
        return view('members.create');
    }

    /**
     * Store a newly created member.
     */
    public function store(StoreMemberRequest $request): RedirectResponse
    {
        try {
            $this->memberService->create($request->validated());

            return redirect()->route('members.index')
                ->with('success', 'Miembro registrado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error al registrar el miembro: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified member.
     */
    public function edit(Members $member): View
    {
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified member.
     */
    public function update(UpdateMemberRequest $request, Members $member): RedirectResponse
    {
        try {
            $this->memberService->update($member, $request->validated());

            return redirect()->route('members.index')
                ->with('success', 'Miembro actualizado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error al actualizar el miembro: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified member.
     */
    public function destroy(Members $member): RedirectResponse
    {
        try {
            $this->memberService->delete($member);

            return redirect()->route('members.index')
                ->with('success', 'Miembro eliminado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('members.index')
                ->with('error', 'Error al eliminar el miembro: ' . $e->getMessage());
        }
    }
}
