package com.example.demo.services;

import java.util.List;
import java.util.stream.Collectors;

import org.springframework.stereotype.Service;

import com.example.demo.models.MenuItem;
import com.example.demo.repositories.MenuItemRepository;

@Service
public class MenuService {
    private final MenuItemRepository menuItemRepository;

    public MenuService(MenuItemRepository menuItemRepository) {
        this.menuItemRepository = menuItemRepository;
    }

    // Fetch all menu items
    public List<MenuItem> getAllMenuItems() {
        return menuItemRepository.findAll();
    }

    // Fetch available menu items (availability == true)
    public List<MenuItem> getAvailableMenuItems() {
        return menuItemRepository.findAll().stream()
                .filter(MenuItem::isAvailability) // Assuming `isAvailability` is a boolean getter
                .collect(Collectors.toList());
    }

    // Search menu items by name, ingredients, or category
    public List<MenuItem> searchMenuItems(String query) {
        return menuItemRepository.findAll().stream()
                .filter(menuItem -> 
                    menuItem.getItemName().toLowerCase().contains(query.toLowerCase()) ||
                    menuItem.getItemIngredients().toLowerCase().contains(query.toLowerCase()) ||
                    menuItem.getCategory().toLowerCase().contains(query.toLowerCase())
                )
                .collect(Collectors.toList());
    }

    // Search available menu items by name, ingredients, or category
    public List<MenuItem> searchAvailableMenuItems(String query) {
        return menuItemRepository.findAll().stream()
                .filter(menuItem -> menuItem.isAvailability() && 
                    (menuItem.getItemName().toLowerCase().contains(query.toLowerCase()) ||
                    menuItem.getItemIngredients().toLowerCase().contains(query.toLowerCase()) ||
                    menuItem.getCategory().toLowerCase().contains(query.toLowerCase()))
                )
                .collect(Collectors.toList());
    }

    // Find a specific menu item by its ID
    public MenuItem getMenuItemById(String menuId) {
        return menuItemRepository.findById(menuId)
                .orElseThrow(() -> new IllegalArgumentException("Menu item not found with ID: " + menuId));
    }
}
