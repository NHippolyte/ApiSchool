<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return response()->json([
            'status' => true,
            'message' => 'Utilisateurs récupérés avec succès',
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [

            'pseudo' => 'required|string|max:50',
            'email' => 'required|string|email|max:50|unique:users',
            'password' => [
                'required', 'confirmed',
                Password::min(8) // minimum 8 caractères   
                    ->mixedCase() // au moins 1 minuscule et une majuscule
                    ->letters()  // au moins une lettre
                    ->numbers() // au moins un chiffre
                    ->symbols() // au moins un caractère spécial parmi ! @ # $ % ^ & * ?  
            ],
            // message d'erreur pour mdp trop court (n'est pas présent par défaut)
            [
                'password.min' => 'Votre mot de passe doit faire au moins :min caractères.',
            ]
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Création de l'utilisateur
        $user = User::create([
            'pseudo' => $request['pseudo'],
            'email' => $request['email'],
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Utilisateur créé avec succès',
            'user' => $user
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json([
            'status' => true,
            'message' => 'Utilisateur récupéré avec succès',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //validateur pour les champs dela base, modify, mettre a jour user, user succes 
         // Validation
         $validator = Validator::make(
            $request->all(),
            [

            'pseudo' => 'required|string|max:50',
            'email' => 'required|string|email|max:50|unique:users',
            'password' => [
                'required', 'confirmed',
                Password::min(8) // minimum 8 caractères   
                    ->mixedCase() // au moins 1 minuscule et une majuscule
                    ->letters()  // au moins une lettre
                    ->numbers() // au moins un chiffre
                    ->symbols() // au moins un caractère spécial parmi ! @ # $ % ^ & * ?  
            ],
            // message d'erreur pour mdp trop court (n'est pas présent par défaut)
            [
                'password.min' => 'Votre mot de passe doit faire au moins :min caractères.',
            ]
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Mise à jour de l'utilisateur
        $user->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Utilisateur mis à jour avec succès',
            'user' => $user
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //supreession with syntaxe delete, renvoi rreponse confirm
        $user->delete();

        return response()->json([
            'status' => true,
            'message' => 'Utilisateur supprimé avec succès',
        ]);
    }
}
