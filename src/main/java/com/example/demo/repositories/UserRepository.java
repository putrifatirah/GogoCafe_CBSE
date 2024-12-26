package com.example.demo.repositories;

import org.springframework.data.mongodb.repository.MongoRepository;

import com.example.demo.models.User;

public interface UserRepository extends MongoRepository<User, String> {
    User findByEmail(String email); // Find a user by email
    User findByUsername(String username);

}


