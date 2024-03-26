<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();

        return response()->json([
            'status' => true,
            'message' => 'Commentaires récupérés avec succès',
            'comments' => $comments
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'user_id' => 'required|integer|exists:users,id',
            'content' => 'required|string'
        ]);

        // Création du commentaire
        $comment = Comment::create([
            'product_id' => $validatedData['product_id'],
            'user_id' => $validatedData['user_id'],
            'content' => $validatedData['content'],
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Commentaire créé avec succès',
            'comment' => $comment
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return response()->json([
            'status' => true,
            'message' => 'Commentaire récupéré avec succès',
            'comment' => $comment
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        // Validation
        $validatedData = $request->validate([
            'content' => 'sometimes|string',
        ]);

        // Mise à jour du commentaire
        $comment->update($validatedData);

        return response()->json([
            'status' => true,
            'message' => 'Commentaire mis à jour avec succès',
            'comment' => $comment
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response()->json([
            'status' => true,
            'message' => 'Commentaire supprimé avec succès',
        ]);
    }
}
