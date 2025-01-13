package com.example.demo.repositories;

import com.example.demo.models.Promotion;
import org.springframework.data.mongodb.repository.MongoRepository;

import java.util.List;

public interface PromotionRepository extends MongoRepository<Promotion, String> {
    List<Promotion> findByIsActiveTrue();
}
