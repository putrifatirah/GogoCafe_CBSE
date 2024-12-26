package com.example.demo.services;

import com.example.demo.models.MenuItem;
import com.example.demo.repositories.MenuItemRepository;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class MenuService {
    private final MenuItemRepository menuItemRepository;

    public MenuService(MenuItemRepository menuRepository) {
        this.menuItemRepository = menuRepository;
    }

    public List<MenuItem> getAllMenuItems() {
        return menuItemRepository.findAll(); // Fetch all menu items
    }
}