package com.example.demo.controllers;

import java.util.List;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;

import com.example.demo.models.MenuItem;
import com.example.demo.models.User;
import com.example.demo.services.MenuService;

import jakarta.servlet.http.HttpSession;

@Controller
public class MenuController {
    private final MenuService menuService;

    public MenuController(MenuService menuService) {
        this.menuService = menuService;
    }

    @GetMapping("/menu")
    public String getMenuPage(Model model, HttpSession session) {
        // Check if the user is logged in
        User user = (User) session.getAttribute("loggedInUser");

        // Pass logged-in user details to the view
        model.addAttribute("user", user);

        // Fetch all menu items
        List<MenuItem> menuItems = menuService.getAllMenuItems();

        // Pass the list of menu items to the template
        model.addAttribute("menuItems", menuItems);

        return "menu"; // Corresponds to menu.html
    }

    @GetMapping("/menu/search")
    public String searchMenuItems(@RequestParam("query") String query, Model model) {
        // Filter menu items based on the query
        List<MenuItem> filteredMenuItems = menuService.searchMenuItems(query);
        model.addAttribute("menuItems", filteredMenuItems);
        return "menu"; // Return the same menu page with filtered results
    }
}
