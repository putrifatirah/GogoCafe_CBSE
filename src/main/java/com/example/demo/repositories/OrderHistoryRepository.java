package com.example.demo.repositories;

import com.example.demo.models.OrderHistory;
import org.springframework.data.mongodb.repository.MongoRepository;

public interface OrderHistoryRepository extends MongoRepository<OrderHistory, String> {
    // Custom query methods (optional)
}