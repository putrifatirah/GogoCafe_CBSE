package com.example.demo.repositories;

import java.util.List;

import org.springframework.data.mongodb.repository.MongoRepository;

import com.example.demo.models.MenuItem;

public interface MenuItemRepository extends MongoRepository<MenuItem, Long> {
    // Find menu item by name
    MenuItem findByItemName(String itemName);

    // Find menu items by category (custom query)
    List<MenuItem> findByCategoryContainingIgnoreCase(String category);

    // Search by name or ingredients (optional)
    List<MenuItem> findByItemNameContainingIgnoreCaseOrItemIngredientsContainingIgnoreCase(String itemName, String itemIngredients);

    // Find menu items where availability is true
    List<MenuItem> findByAvailability(boolean availability);
}
