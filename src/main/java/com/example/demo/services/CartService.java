package com.example.demo.services;

import java.util.List;

import org.springframework.stereotype.Service;

import com.example.demo.models.Cart;
import com.example.demo.models.MenuItem;
import com.example.demo.repositories.CartRepository;
import com.example.demo.repositories.MenuItemRepository;

@Service
public class CartService {

    private final CartRepository cartRepository;
    private final MenuItemRepository menuItemRepository;

    public CartService(CartRepository cartRepository, MenuItemRepository menuItemRepository) {
        this.cartRepository = cartRepository;
        this.menuItemRepository = menuItemRepository;
    }

    // Add a menu item to the user's cart
    public void addToCart(Long menuItemId, String userId) {
        // Fetch the menu item
        MenuItem menuItem = menuItemRepository.findById(menuItemId)
                .orElseThrow(() -> new IllegalArgumentException("Invalid menu item ID"));

        // Fetch or create a cart for the user
        Cart cart = cartRepository.findByUserId(userId)
                .orElse(new Cart(userId));

        // Add the menu item to the cart
        cart.addMenuItem(menuItem);

        // Save the updated cart
        cartRepository.save(cart);
    }

    // Get all items in the user's cart
    public List<MenuItem> getCartItems(String userId) {
        // Fetch the user's cart
        Cart cart = cartRepository.findByUserId(userId)
                .orElse(new Cart(userId));

        return cart.getMenuItems();
    }

    // Remove an item from the cart
    public void removeFromCart(String menuItemId, String userId) { // Change Long to String
        // Fetch the user's cart
        Cart cart = cartRepository.findByUserId(userId)
                .orElseThrow(() -> new IllegalArgumentException("Cart not found for user: " + userId));
    
        // Remove the menu item
        cart.removeMenuItem(menuItemId); // No changes needed here
    
        // Save the updated cart
        cartRepository.save(cart);
    }
    

    // Clear the user's cart
    public void clearCart(String userId) {
        // Fetch the user's cart
        Cart cart = cartRepository.findByUserId(userId)
                .orElseThrow(() -> new IllegalArgumentException("Cart not found for user: " + userId));

        // Clear all items from the cart
        cart.clearItems();

        // Save the updated cart
        cartRepository.save(cart);
    }
}
