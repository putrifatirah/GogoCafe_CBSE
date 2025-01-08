package com.example.demo.repositories;

import java.util.List;

import org.springframework.data.mongodb.repository.MongoRepository;

import com.example.demo.models.Order;

public interface OrderRepository extends MongoRepository<Order, String> {
    // Custom query methods (optional)
    List<Order> findByUserId(String userId);
    List<Order> findByUserIdAndStatus(String userId, String status);
}