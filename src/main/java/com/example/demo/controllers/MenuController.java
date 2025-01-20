package com.example.demo.controllers;

import java.util.List;
import java.util.stream.Collectors;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

import com.example.demo.models.MenuItem;
import com.example.demo.models.User;
import com.example.demo.services.CartService;
import com.example.demo.services.MenuService;

import jakarta.servlet.http.HttpSession;

@Controller
@RequestMapping("/menu")
public class MenuController {

    private final MenuService menuService;

    public MenuController(MenuService menuService, CartService cartService) {
        this.menuService = menuService;
    }

    // Display the menu page
    @GetMapping
    public String getMenuPage(Model model, HttpSession session) {
        // Check if the user is logged in
        User user = (User) session.getAttribute("loggedInUser");

        // Fetch menu items
        List<MenuItem> menuItems;
        if (user != null) {
            // Filter only available items for logged-in users
            menuItems = menuService.getAllMenuItems().stream()
                    .filter(MenuItem::isAvailability)
                    .collect(Collectors.toList());
        } else {
            // Show all items for guests
            menuItems = menuService.getAllMenuItems();
        }

        // Pass menu items and user details to the view
        model.addAttribute("menuItems", menuItems);
        model.addAttribute("user", user);

        return "menu"; // Corresponds to menu.html
    }

    // Search for menu items
    @GetMapping("/search")
    public String searchMenuItems(@RequestParam("query") String query, Model model, HttpSession session) {
        // Check if the user is logged in
        User user = (User) session.getAttribute("loggedInUser");

        // Filter menu items based on the query and availability
        List<MenuItem> filteredMenuItems;
        if (user != null) {
            // Logged-in users see only available items
            filteredMenuItems = menuService.searchAvailableMenuItems(query);
        } else {
            // Non-logged-in users see all matching items
            filteredMenuItems = menuService.searchMenuItems(query);
        }

        model.addAttribute("menuItems", filteredMenuItems);

        // Pass logged-in user details (if any) to the view
        model.addAttribute("user", user);

        return "menu"; // Return the same menu page with filtered results
    }
}
