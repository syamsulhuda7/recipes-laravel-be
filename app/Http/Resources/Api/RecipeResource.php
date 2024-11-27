<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecipeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'url_file' => $this->url_file,
            'url_video' => $this->url_video,
            'thumbnail' => $this->thumbnail,
            'price' => $this->price,
            'about' => $this->about,
            'category' => new CategoryResource($this->whenLoaded('category')),
            'recipe_ingredients' => RecipeIngredientResource::collection($this->whenLoaded('recipeIngredients')),
            'photos' => RecipePhotoResource::collection($this->whenLoaded('recipePhotos')),
            'tutorials' => RecipeTutorialResource::collection($this->whenLoaded('recipeTutorials')),
            'author' => new RecipeAuthorResource($this->whenLoaded('recipeAuthor')),
        ];
    }
}
