package com.example.demo.controllers;

import java.util.List;
import java.util.stream.Collectors;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;

import com.example.demo.models.MenuItem;
import com.example.demo.models.User;
import com.example.demo.services.CartService;
import com.example.demo.services.MenuService;

import jakarta.servlet.http.HttpSession;

@Controller
@RequestMapping("/menu")
public class MenuController {

    private final MenuService menuService;
    private final CartService cartService;

    public MenuController(MenuService menuService, CartService cartService) {
        this.menuService = menuService;
        this.cartService = cartService;
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

    // Add an item to the cart
    @PostMapping("/add-to-cart")
    @ResponseBody
    public String addToCart(@RequestParam("menuId") Long menuId, HttpSession session) {
        // Check if the user is logged in
        User user = (User) session.getAttribute("loggedInUser");

        if (user == null) {
            return "Please log in to add items to the cart.";
        }

        // Add the item to the user's cart
        cartService.addToCart(menuId.toString(), user.getId());
        return "Item successfully added to the cart!";
    }

    // View the cart page
    @GetMapping("/cart")
    public String viewCart(Model model, HttpSession session) {
        // Check if the user is logged in
        User user = (User) session.getAttribute("loggedInUser");

        if (user == null) {
            return "redirect:/login"; // Redirect to login page if not logged in
        }

        // Fetch the user's cart items
        List<MenuItem> cartItems = cartService.getCartItems(user.getId());
        model.addAttribute("cartItems", cartItems);

        return "cart"; // Corresponds to cart.html
    }
}
