<?php

namespace Hexiros\PersonTrait\Http\Controllers;

use Carbon\Carbon;
// use Illuminate\Http\Request;
use App\Models\User;
use GuzzleHttp\Psr7\Response;
use App\Http\Controllers\Controller;
use Hexiros\PersonTrait\Models\Person;
use Hexiros\PersonTrait\Http\Resources\PersonResource;
use Hexiros\PersonTrait\Http\Requests\PersonRequest as Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        return new PersonResource($user->person);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(User $user, Request $request)
    {
        $validated = $request->validated();

        $details = [
            'suffix'            => $validated['suffix'],
            'first_name'        => $validated['first_name'],
            'middle_name'       => $validated['middle_name'],
            'last_name'         => $validated['last_name'],
            'gender'            => $validated['gender'],
            'birth_date'        => isset($validated['birth_date']) ? Carbon::parse($validated['birth_date']) : null,
            'birth_place'       => $validated['birth_place'],
            'nationality'       => $validated['nationality'],
            'religion'          => $validated['religion'],
            'contact_number'    => $validated['contact_number'],
        ];

        if (empty($user->person)) {
            return new PersonResource($user->createPerson($details));
        } else {
            return new PersonResource($user->updatePerson($details));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user, Request $request, Person $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, Person $person)
    {
        return response()->json([
            'success'   =>  $user->deletePerson()
        ]);
    }
}
