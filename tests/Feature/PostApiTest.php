<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostApiTest extends TestCase
{
    public function test_can_retrieve_posts()
    {
        $response = $this->get('/api/posts');
    
        $response->assertStatus(200) // Vérifie que la réponse a un statut HTTP de 200
                ->assertJsonStructure([ // Vérifie la structure du JSON
                    '*' => [ // Indique un tableau d'objets
                        'id',
                        'title',
                        'body',
                        // autres champs attendus
                    ],
                ]);
    }

        public function test_can_create_post()
    {
        $postData = [
            'title' => 'Un titre de test',
            'body' => 'Un contenu de test',
        ];

        $response = $this->post('/api/posts', $postData);

        $response->assertStatus(201) // Vérifie que la réponse a un statut HTTP de 201 (Created)
                ->assertJson($postData); // Vérifie que le JSON de réponse contient les données postées
    }

        public function test_can_update_post()
    {
        $post = Post::create([
            'title' => 'Titre original',
            'body' => 'Contenu original',
        ]);

        $updatedData = [
            'title' => 'Titre mis à jour',
            'body' => 'Contenu mis à jour',
        ];

        $response = $this->put("/api/posts/{$post->id}", $updatedData);

        $response->assertStatus(200) // Vérifie que la réponse a un statut HTTP de 200
                ->assertJson($updatedData); // Vérifie que le JSON de réponse contient les données mises à jour
    }

        public function test_can_delete_post()
    {
        $post = Post::create([
            'title' => 'Titre à supprimer',
            'body' => 'Contenu à supprimer',
        ]);

        $response = $this->delete("/api/posts/{$post->id}");

        $response->assertStatus(204); // Vérifie que la réponse a un statut HTTP de 204 (No Content)

        $this->assertDeleted($post); // Vérifie que le post a bien été supprimé de la base de données
    }
}
  