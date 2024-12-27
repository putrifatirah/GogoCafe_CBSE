package com.example.demo.services;

import java.util.List;
import java.util.stream.Collectors;

import org.springframework.stereotype.Service;

import com.example.demo.models.MenuItem;
import com.example.demo.repositories.MenuItemRepository;

@Service
public class MenuService {
    private final MenuItemRepository menuItemRepository;

    public MenuService(MenuItemRepository menuRepository) {
        this.menuItemRepository = menuRepository;
    }

    public List<MenuItem> getAllMenuItems() {
        return menuItemRepository.findAll(); // Fetch all menu items
    }

    // Search menu items by itemName, itemIngredients, or category
    public List<MenuItem> searchMenuItems(String query) {
        return menuItemRepository.findAll().stream()
                .filter(menuItem -> 
                    menuItem.getItemName().toLowerCase().contains(query.toLowerCase()) ||
                    menuItem.getItemIngredients().toLowerCase().contains(query.toLowerCase()) ||
                    menuItem.getCategory().toLowerCase().contains(query.toLowerCase())
                )
                .collect(Collectors.toList());
    }
}