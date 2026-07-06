<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;

class ProductPolicy
{

    public function edit(User $user, Product $product): bool
    {
        return $product->seller->user->is($user);
    }

    public function update(User $user, Product $product): bool
    {
        return $user->seller !== null && $user->seller->id === $product->seller_id;
    }
    
    public function delete(User $user, Product $product): bool
    {
        return $user->seller !== null && $user->seller->id === $product->seller_id;
    }
}
