package com.example.demo.controllers;

import java.util.List;

import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;

import com.example.demo.models.MenuItem;
import com.example.demo.models.User;
import com.example.demo.services.CartService;

import jakarta.servlet.http.HttpSession;

public class CartController {
    
    private final CartService cartService;

    public CartController(CartService cartService) {
        this.cartService = cartService;
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
