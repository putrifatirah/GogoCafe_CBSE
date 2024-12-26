package com.example.demo.repositories;

import com.example.demo.models.Order;
import org.springframework.data.mongodb.repository.MongoRepository;

public interface OrderRepository extends MongoRepository<Order, String> {
    // Custom query methods (optional)
}