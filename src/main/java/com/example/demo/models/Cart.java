package com.example.demo.models;

import java.util.ArrayList;
import java.util.List;

import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.Document;

@Document(collection = "cart")
public class Cart {
    @Id
    private String cartId;
    private String userId; // The ID of the user who owns this cart
    private List<MenuItem> menuItems; // List of menu items in the cart

    public Cart() {
        this.menuItems = new ArrayList<>();
    }

    public Cart(String userId) {
        this.userId = userId;
        this.menuItems = new ArrayList<>();
    }

    // Getters and Setters
    public String getCartId() {
        return cartId;
    }

    public void setCartId(String cartId) {
        this.cartId = cartId;
    }

    public String getUserId() {
        return userId;
    }

    public void setUserId(String userId) {
        this.userId = userId;
    }

    public List<MenuItem> getMenuItems() {
        return menuItems;
    }

    public void setMenuItems(List<MenuItem> menuItems) {
        this.menuItems = menuItems;
    }

    // Add a menu item to the cart
    public void addMenuItem(MenuItem menuItem) {
        this.menuItems.add(menuItem);
    }

    // Remove a menu item from the cart by menuId
    public void removeMenuItem(String menuId) {
        this.menuItems.removeIf(menuItem -> menuItem.getMenuId().equals(menuId));
    }

    // Clear all items from the cart
    public void clearItems() {
        this.menuItems.clear();
    }

    @Override
    public String toString() {
        return "Cart{" +
                "cartId='" + cartId + '\'' +
                ", userId='" + userId + '\'' +
                ", menuItems=" + menuItems +
                '}';
    }
}
