package com.example.demo.repositories;

import com.example.demo.models.MenuItem;
import org.springframework.data.mongodb.repository.MongoRepository;

public interface MenuItemRepository extends MongoRepository<MenuItem, String> {
    // Custom query methods (optional)
    MenuItem findByItemName(String itemName); // Example: Find menu item by name
}
