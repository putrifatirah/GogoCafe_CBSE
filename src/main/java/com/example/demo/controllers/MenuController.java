package com.example.demo.controllers;

import java.util.List;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

import com.example.demo.models.MenuItem;
import com.example.demo.services.MenuService;

@Controller
public class MenuController {
    private final MenuService menuService;

    public MenuController(MenuService menuService) {
        this.menuService = menuService;
    }

    @GetMapping("/menu")
    public String getMenuPage(Model model) {
        // Fetch all menu items
        List<MenuItem> menuItems = menuService.getAllMenuItems();

        // Pass the list to the template
        model.addAttribute("menuItems", menuItems);

        return "menu"; // Corresponds to menu.html
    }
}
