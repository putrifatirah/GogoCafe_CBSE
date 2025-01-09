package com.example.demo.repositories;

import java.util.List;

import org.springframework.data.mongodb.repository.MongoRepository;

import com.example.demo.models.Order;

public interface OrderRepository extends MongoRepository<Order, String> {
    List<Order> findByUserId(String userId); // Get orders by user ID
    List<Order> findByUserIdAndStatus(String userId, String status); // Get orders by user ID and specific status
    List<Order> findByUserIdAndStatusNot(String userId, String excludedStatus); // Get orders by user ID and not matching specific status
}
