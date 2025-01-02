package com.example.demo.repositories;

import java.util.Optional;

import org.springframework.data.mongodb.repository.MongoRepository;

import com.example.demo.models.Cart;

public interface CartRepository extends MongoRepository<Cart, String> {
    // Find a cart by user ID
    Optional<Cart> findByUserId(String userId);
}
